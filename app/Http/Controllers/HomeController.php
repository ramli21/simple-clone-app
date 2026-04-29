<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\ServiceItem;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Mail\InqueryForwarderMailer;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::first();
        return view('content.akhritech-landing', compact('company'));
    }

    public function productSabilsys()
    {
        return view('products.sabilsys');
    }

    public function serviceDetail($slug)
    {
        $company = CompanyProfile::first();
        $service = ServiceItem::where('slug', $slug)->firstOrFail();

        return view('service-detail', compact('company', 'service'));
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

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }

    public function themes()
    {
        $company = CompanyProfile::first();
        $template_filters = [
            ['name' => 'Bisnis', 'data-filter' => '.filter-bisnis'],
            // ['name' => 'Textile', 'data-filter' => '.filter-textile'],
            // ['name' => 'Photograph', 'data-filter' => '.filter-photograph'],
            // ['name' => 'Coffee Shop', 'data-filter' => '.filter-coffee-shop'],
            ['name' => 'Travel', 'data-filter' => '.filter-education'],
            // ['name' => 'Travel', 'data-filter' => '.filter-education'],
        ];
        $templates = [
            [
                'type' => 'Bisnis',
                'code' => 'BS004',
                'name' => 'Arsha',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'Template ini cocok untuk memperkenalkan bisnis anda kepada calon client dan memnjadikan bisnis anda terlihat profesional.',
                'img' => 'https://themewagon.com/wp-content/uploads/2021/06/arsha-1-1200x736.png',
                'preview_url' => 'https://themewagon.github.io/arsha/',
                'download_url' => 'https://themewagon.com/themes/free-bootstrap-5-html-5-business-website-template-arsha/',
            ],
            [
                'type' => 'Coffee Shop',
                'code' => 'CS001',
                'name' => 'Lounge',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'This Website is for personal and professional resumes of web developers, graphic designers, creative personals, photographers, and other similar professions or organizations. .',
                'img' => 'https://themewagon.com/wp-content/uploads/2025/06/Lounge-1200x736.webp',
                'preview_url' => 'https://themewagon.github.io/Lounge/',
                'download_url' => 'https://themewagon.com/themes/lounge/',
            ],
            [
                'type' => 'Bisnis',
                'code' => 'BS007',
                'name' => 'Salone ',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'Salone is a template with a meticulous design for exclusive salon businesses. The theme has a meticulous design that is suitable for other businesses and corporations.',
                'img' => 'https://themewagon.com/wp-content/uploads/2025/08/Salone-1200x736.webp',
                'preview_url' => 'https://themewagon.github.io/Salone/',
                'download_url' => 'https://themewagon.com/themes/salone/',
            ],
            [
                'type' => 'Bisnis',
                'code' => 'BS008',
                'name' => 'Furnics',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'Furnics website template is built using Bootstrap 5, HTML5 & CSS3. Its single-page design is ornamented with user-friendly UI components.',
                'img' => 'https://themewagon.com/wp-content/uploads/2023/07/furncis.png',
                'preview_url' => 'https://themewagon.github.io/furnics/',
                'download_url' => 'https://themewagon.com/themes/furnics/',
            ],
            [
                'type' => 'Coffee Shop',
                'code' => 'CS002',
                'name' => 'Koppee',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'Koppee is a template for coffee shop websites. The business & corporate template is ideal for restaurants or other food-related businesses, too.',
                'img' => 'https://themewagon.com/wp-content/uploads/2025/04/Koppee.webp',
                'preview_url' => 'https://themewagon.github.io/Koppee/',
                'download_url' => 'https://themewagon.com/themes/koppee/',
            ],
            [
                'type' => 'Coffee Shop',
                'code' => 'CS003',
                'name' => 'Coffee - Simple Yet Compelling',
                'filter-class' => 'filter-bisnis',
                'snippet' => 'Here is another versatile, simple, and polished one page coffee shop Bootstrap template.',
                'img' => 'https://themewagon.com/wp-content/uploads/2018/07/Coffee-free-coffee-shop-bootstrap-template-1.jpg',
                'preview_url' => 'https://themewagon.github.io/coffee/',
                'download_url' => 'https://themewagon.com/themes/free-coffee-shop-bootstrap-template-coffee/',
            ],
            [
                'type' => 'Education',
                'code' => 'ED001',
                'name' => 'BabyCare',
                'filter-class' => 'filter-education',
                'snippet' => 'BabyCare is a template for daycare center websites. The theme has a simple and gorgeous design reflecting the services and activities of a daycare center.',
                'img' => 'https://themewagon.com/wp-content/uploads/2024/09/BabyCare.webp',
                'preview_url' => 'https://themewagon.github.io/BabyCare/',
                'download_url' => 'https://themewagon.com/themes/babycare/',
            ],
            [
                'type' => 'Education',
                'code' => 'ED002',
                'name' => 'eLearning',
                'filter-class' => 'filter-education',
                'snippet' => 'eLearning is a one-page educational website template with a minimal design. It is a theme with an intuitive layout that ensures user engagement on the site.',
                'img' => 'https://themewagon.com/wp-content/uploads/2025/05/E-learning-1200x736.webp',
                'preview_url' => 'https://themewagon.github.io/E-learning/',
                'download_url' => 'https://themewagon.com/themes/e-learning/',
            ],
            [
                'type' => 'Education',
                'code' => 'ED003',
                'name' => 'Drivin',
                'filter-class' => 'filter-education',
                'snippet' => 'Drivin is a template for driving school websites that incorporates all of the necessary features in a clean and modern design.',
                'img' => 'https://themewagon.com/wp-content/uploads/2022/05/screencapture-technext-github-io-drivin-2022-05-17-09_33_46-1.png',
                'preview_url' => 'https://themewagon.github.io/drivin/',
                'download_url' => 'https://themewagon.com/themes/drivin-free-bootstrap-5-driving-school-website-template/',
            ],
        ];
        return view('home.themes', compact('company', 'template_filters', 'templates'));
    }
}

