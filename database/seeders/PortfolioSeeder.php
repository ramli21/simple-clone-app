<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $portfolios = [
            [
                'name' => 'SabilSys — Sistem Manajemen Travel Umroh & Haji',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1200&q=80',
                'link' => 'https://sabilsys.akhritech.com',
                'story' => 'SabilSys adalah sistem manajemen perjalanan haji dan umroh berbasis web yang dibangun khusus untuk agen travel di Indonesia. Sistem ini mencakup manajemen jamaah, manifest keberangkatan, invoicing otomatis, dan laporan keuangan terintegrasi. Dibangun dengan arsitektur multi-tenant agar setiap travel dapat memiliki subdomain dan branding sendiri.',
                'highlights' => [
                    'Multi-tenant architecture dengan subdomain unik per klien',
                    'Manajemen jamaah & manifest keberangkatan',
                    'Invoicing otomatis & tracking pembayaran cicilan',
                    'Dashboard laporan keuangan real-time',
                    'Landing page promosi terintegrasi untuk setiap agen',
                ],
                'published' => true,
            ],
            [
                'name' => 'Akhritech Company Profile Website',
                'category' => 'Company Profile',
                'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=1200&q=80',
                'link' => 'https://akhritech.com',
                'story' => 'Website company profile modern untuk Akhritech yang menampilkan layanan, portofolio, dan produk digital. Dibangun dengan Laravel dan Tailwind CSS, dilengkapi SEO on-page yang optimal, animasi interaktif AOS, blog terintegrasi, dan contact form berbasis API. Dirancang untuk memberikan kesan profesional dan meningkatkan konversi leads.',
                'highlights' => [
                    'Desain modern dengan Tailwind CSS & animasi AOS',
                    'Blog terintegrasi dengan SEO schema markup',
                    'Contact form API-based dengan validasi ketat',
                    'Google Analytics & GTM terintegrasi',
                    'Core Web Vitals dioptimalkan untuk performa tinggi',
                ],
                'published' => true,
            ],
            [
                'name' => 'Dashboard Analitik E-Commerce',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&q=80',
                'link' => null,
                'story' => 'Dashboard analitik komprehensif untuk platform e-commerce skala menengah. Menampilkan visualisasi data penjualan, tren produk, dan perilaku pelanggan secara real-time menggunakan Chart.js. Sistem ini membantu tim manajemen dalam pengambilan keputusan bisnis berbasis data dengan fitur export laporan ke PDF dan Excel.',
                'highlights' => [
                    'Visualisasi data real-time dengan Chart.js',
                    'Filter laporan berdasarkan periode & kategori produk',
                    'Export laporan ke PDF dan Excel',
                    'Notifikasi stok menipis otomatis',
                    'Role-based access control (Admin, Manager, Viewer)',
                ],
                'published' => true,
            ],
            [
                'name' => 'Sistem Informasi Manajemen Klinik',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&q=80',
                'link' => null,
                'story' => 'Aplikasi manajemen klinik berbasis web untuk membantu dokter dan staff dalam mengelola rekam medis pasien, jadwal dokter, antrian, dan tagihan secara efisien. Dibangun dengan keamanan data pasien sebagai prioritas utama, sesuai dengan standar kerahasiaan informasi kesehatan.',
                'highlights' => [
                    'Rekam medis elektronik pasien',
                    'Sistem antrian digital dengan notifikasi SMS',
                    'Manajemen jadwal dokter & appointment booking',
                    'Modul billing & invoice kunjungan',
                    'Laporan statistik kunjungan bulanan',
                ],
                'published' => true,
            ],
            [
                'name' => 'Platform LMS untuk Lembaga Pendidikan',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=1200&q=80',
                'link' => null,
                'story' => 'Learning Management System (LMS) yang dibangun untuk lembaga kursus online. Platform ini menyediakan fitur manajemen kelas, upload materi, kuis interaktif, sertifikat otomatis, dan dashboard progres belajar siswa. Mendukung video streaming terintegrasi dan forum diskusi per kelas.',
                'highlights' => [
                    'Manajemen kelas & materi pembelajaran',
                    'Kuis interaktif dengan penilaian otomatis',
                    'Sertifikat kelulusan otomatis',
                    'Progress tracking siswa per kelas',
                    'Integrasi payment gateway untuk pembayaran kursus',
                ],
                'published' => true,
            ],
            [
                'name' => 'Website Landing Page Properti',
                'category' => 'Landing Page',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1200&q=80',
                'link' => null,
                'story' => 'Landing page perumahan modern dengan desain premium untuk proyek properti residensial di Jakarta Selatan. Menampilkan galeri unit, denah lokasi interaktif, kalkulator KPR, dan form inquiry terintegrasi WhatsApp. Dioptimalkan untuk Google Ads landing page dengan konversi tinggi.',
                'highlights' => [
                    'Desain premium dengan animasi scroll parallax',
                    'Galeri foto & virtual tour 360°',
                    'Kalkulator KPR interaktif',
                    'Form inquiry langsung ke WhatsApp',
                    'Optimasi Google Ads & konversi landing page',
                ],
                'published' => true,
            ],
            [
                'name' => 'Aplikasi Point of Sale (POS) Restoran',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&q=80',
                'link' => null,
                'story' => 'Sistem POS berbasis web untuk jaringan restoran dengan multiple cabang. Mengelola menu, pesanan, pembayaran, dan laporan penjualan harian secara terpusat. Dilengkapi dengan printer thermal receipt dan integrasi mesin EDC untuk kemudahan transaksi.',
                'highlights' => [
                    'Manajemen menu digital dengan harga dinamis',
                    'Sistem order & kitchen display system (KDS)',
                    'Multi-payment: tunai, QRIS, kartu debit/kredit',
                    'Laporan penjualan per cabang & periode',
                    'Manajemen stok bahan baku real-time',
                ],
                'published' => true,
            ],
            [
                'name' => 'Marketplace Freelancer Lokal',
                'category' => 'Web Application',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&q=80',
                'link' => null,
                'story' => 'Platform marketplace yang menghubungkan freelancer lokal dengan klien bisnis dari seluruh Indonesia. Mendukung pencarian freelancer berdasarkan keahlian, sistem escrow pembayaran, review & rating, dan manajemen proyek terintegrasi. Dibangun dengan filosofi "local first" untuk mendukung ekosistem digital Indonesia.',
                'highlights' => [
                    'Profil freelancer dengan portfolio & skill tags',
                    'Sistem bid & negosiasi proyek',
                    'Escrow payment untuk keamanan transaksi',
                    'Review & rating sistem dua arah',
                    'Notifikasi real-time via email & push notification',
                ],
                'published' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            $portfolio['id'] = (string) Uuid::uuid4();
            Portfolio::create($portfolio);
        }
    }
}
