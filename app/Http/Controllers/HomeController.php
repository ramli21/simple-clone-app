<?php

namespace App\Http\Controllers;

use App\Mail\InqueryForwarderMailer;
use App\Models\CompanyProfile;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();

        $packages = [
            [
                'name' => 'Landing Page',
                'highlight' => false,
                'tagline' => 'Paket Terlaris',
                'timeline' => '1-2 Minggu',
                'description' => 'Sebuah halaman web yang dirancang untuk memperkenalkan produk atau layanan tertentu, dengan fokus pada konversi pengunjung menjadi pelanggan.',
                'price' => 'Rp 950.000',
                'discount' => '15%',
                'discounted_price' => 'Rp 800.000',
                'domains' => ['.web.id', '.biz.id', '.my.id'],
                'features' => [
                    'Desain responsif yang menarik',
                    '1 Halaman / Landing Page',
                    'Contact Form',
                    'Free Hosting',
                    'Free Domain (pilihan terbatas) 1 tahun pertama',
                    'SSL Certificate',
                    'Konten yang disesuaikan dengan kebutuhan bisnis',
                    'Integrasi dengan media sosial',
                    'Optimasi SEO dasar',
                    'Dukungan teknis selama 1 bulan',
                    'Jaminan lifetime support untuk perbaikan bug dan masalah teknis terkait hosting',
                ],
            ],
            [
                'name' => 'Company Profile',
                'highlight' => true,
                'tagline' => 'Terpopuler',
                'timeline' => '2-4 Minggu',
                'description' => 'Sebuah situs web yang memberikan informasi lengkap tentang perusahaan, termasuk sejarah, visi, misi, produk atau layanan, dan kontak.',
                'price' => 'Rp 2.150.000',
                'discount' => '30%',
                'discounted_price' => 'Rp 1.500.000',
                'domains' => ['.com', '.id', '.web.id', '.biz.id', '.my.id'],
                'features' => [
                    'Desain profesional yang mencerminkan identitas perusahaan',
                    'Konten yang disusun secara strategis untuk menarik klien potensial',
                    '5 Halaman (Home, About, Services, Blog, Contact)',
                    'Responsive & Modern Design',
                    'Blog/News Section',
                    'Contact Form & Inquiry System',
                    'Admin Panel Dasar',
                    'Free Hosting Premium',
                    'Free Domain (pilihan terbatas) 1 tahun pertama',
                    'SSL Certificate + Email Hosting',
                    'Optimasi SEO untuk meningkatkan visibilitas online',
                    'Dukungan teknis selama 3 bulan',
                    'Jaminan lifetime support untuk perbaikan bug dan masalah teknis terkait hosting',
                ],
            ],
        ];

        $portfolios = Portfolio::where('published', true)->latest()->get();
        $products = Product::where('is_active', true)->latest()->take(3)->get();

        return view('pages.landingpage', compact('company', 'packages', 'portfolios', 'products'));
    }

    public function inquiry(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'min:3', // Minimal 3 karakter agar tidak terlalu pendek (misal: "A")
                'max:20', // Batas maksimal yang wajar untuk subjek
                function ($attribute, $value, $fail) {
                    if ($value != strip_tags($value)) {
                        $fail('Nama tidak boleh mengandung HTML.');
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'min:3', // Minimal 3 karakter agar tidak terlalu pendek (misal: "A")
                'max:30', // Batas maksimal yang wajar untuk subjek
                function ($attribute, $value, $fail) {
                    if ($value != strip_tags($value)) {
                        $fail('Email tidak boleh mengandung HTML.');
                    }
                },
            ],
            'whatsapp_number' => 'required|string|max:16',
            'subject' => [
                'required',
                'string',
                'min:3', // Minimal 3 karakter agar tidak terlalu pendek (misal: "A")
                'max:100', // Batas maksimal yang wajar untuk subjek
                function ($attribute, $value, $fail) {
                    if ($value != strip_tags($value)) {
                        $fail('Subjek tidak boleh mengandung HTML.');
                    }
                },
            ],
            'message' => [
                'required',
                'string',
                'max:1000',
                function ($attribute, $value, $fail) {
                    if ($value != strip_tags($value)) {
                        $fail('Pesan tidak boleh mengandung tag HTML atau link.');
                    }
                },
            ],
        ]);

        $company = CompanyProfile::first();

        $inquiry = Inquiry::create($validated);

        if (env('APP_ENV') == 'production' && $company->email) {
            Mail::to($company->email)->send(new InqueryForwarderMailer($inquiry));
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.',
        ], 200);
    }
}
