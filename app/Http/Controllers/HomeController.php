<?php

namespace App\Http\Controllers;

use App\Mail\InqueryForwarderMailer;
use App\Models\CompanyProfile;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\Product;
use App\Services\FonnteWhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        $packages = $this->getPackages();
        $company = CompanyProfile::first();



        $portfolios = Portfolio::where('published', true)->latest()->get();
        $products = Product::where('is_active', true)->latest()->take(3)->get();

        return view('pages.landingpage', compact('company', 'packages', 'portfolios', 'products'));
    }

    public function inquiry(Request $request, FonnteWhatsAppService $whatsapp)
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
                'email',
                'max:255',
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
        $whatsapp->notifyNewInquiry($inquiry);

        $adminEmail = config('services.inquiry.admin_email') ?: $company?->email;
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new InqueryForwarderMailer($inquiry));
        } else {
            Log::warning('Inquiry email notification skipped because no admin email is configured.', [
                'inquiry_id' => $inquiry->id,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.',
        ], 200);
    }

    public function jasaBuatWebsite()
    {
        $company = CompanyProfile::first();
        $packages = $this->getPackages();
        $portfolios = Portfolio::where('published', true)->latest()->get();

        return view('pages.services.jasa-buat-website', compact('company', 'packages', 'portfolios'));
    }

    public function contact()
    {
        $company = CompanyProfile::first();
        return view('pages.contact', compact('company'));
    }

    private function getPackages()
    {
        return [
            [
                'name' => 'Landing Page',
                'highlight' => false,
                'tagline' => 'Paket Terlaris',
                'timeline' => '1-2 Minggu',
                'description' => 'Sebuah halaman web yang dirancang untuk memperkenalkan produk atau layanan tertentu, dengan fokus pada konversi pengunjung menjadi pelanggan.',
                'price' => 'Rp 2.500.000',
                'discount' => '20%',
                'discounted_price' => 'Rp 2.000.000',
                'domains' => ['.com', '.id'],
                'features' => [
                    'Desain Eksklusif & Responsif (Tampilan Sempurna di HP & Laptop)',
                    '1 Halaman High-Converting Landing Page (Fokus Penjualan / Leads)',
                    'Struktur Copywriting Penjualan & Layout Persuasif',
                    'Integrasi Tombol WhatsApp Direct & Formulir Kontak',
                    'Gratis Domain .com / .id (1 Tahun Pertama)',
                    'Gratis Hosting Cepat & Akses SSL (HTTPS Security)',
                    'Optimasi Kecepatan Loading & SEO Dasar (Mudah Ditemukan di Google)',
                    'Integrasi Piksel & Media Sosial (Instagram, TikTok, FB)',
                    'Garansi Teknis & Pemeliharaan Bug selama 1 Bulan',
                ],
            ],
            [
                'name' => 'Company Profile',
                'highlight' => true,
                'tagline' => 'Terpopuler',
                'timeline' => '2-4 Minggu',
                'description' => 'Sebuah situs web yang memberikan informasi lengkap tentang perusahaan, termasuk sejarah, visi, misi, produk atau layanan, dan kontak.',
                'price' => 'Rp 5.000.000',
                'discount' => '30%',
                'discounted_price' => 'Rp 3.500.000',
                'domains' => ['.com', '.id', '.co.id', '.net', '.org'],
                'features' => [
                    'Desain Premium & Eksklusif (Disesuaikan Branding Perusahaan)',
                    'Hingga 5-7 Halaman Utama (Home, About, Products/Services, Gallery/Clients, Blog, Contact)',
                    'Struktur Konten Strategis untuk Meningkatkan Kredibilitas & Kepercayaan Klien B2B',
                    'Integrasi Katalog Produk / Portofolio Proyek (Downloadable PDF Brochure)',
                    'Formulir Penawaran Harga / Inquiry System & WhatsApp Business Direct',
                    'Gratis Domain .com / .co.id / .id / dan lainnya (1 Tahun Pertama)',
                    'Gratis Hosting Premium Cepat + SSL (HTTPS Security) + Email Bisnis Custom (nama@perusahaan.com)',
                    'Optimasi SEO Lokal & Kecepatan Loading (Siap Tampil di Google Search)',
                    'Sistem Manajemen Konten / Admin Panel (Mudah Edit Teks & Upload Berita Mandiri)',
                    'Garansi Teknis & Pemeliharaan Bug selama 3 Bulan',
                ],
            ],
        ];
    }
}
