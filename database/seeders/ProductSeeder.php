<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'LaraStarter Pro — Laravel Boilerplate',
                'slug' => 'larastarter-pro-laravel-boilerplate',
                'sku' => 'LSP-001',
                'short_description' => 'Boilerplate Laravel 11 siap pakai dengan autentikasi, admin panel, multi-role, dan komponen UI premium. Hemat ratusan jam development.',
                'description' => '<h2>LaraStarter Pro</h2><p>LaraStarter Pro adalah starter kit Laravel 11 yang komprehensif dan siap produksi. Dirancang untuk developer yang ingin memulai proyek baru tanpa membuang waktu untuk setup dasar.</p><h3>Fitur Utama</h3><ul><li>Autentikasi lengkap (login, register, forgot password, email verification)</li><li>Admin panel dengan Filament v3</li><li>Multi-role & permission system (Spatie)</li><li>UI komponen dengan Tailwind CSS + Alpine.js</li><li>CRUD generator bawaan</li><li>API-ready dengan Laravel Sanctum</li><li>Dark mode support</li><li>Dokumentasi lengkap</li></ul>',
                'category' => 'Starter Kit',
                'stack' => 'Laravel 11, Filament v3, Tailwind CSS, Alpine.js, MySQL',
                'price' => 299000,
                'discount_percentage' => 20,
                'is_active' => true,
                'preview_url' => 'https://demo.larastarter.akhritech.com',
                'download_path' => 'products/larastarter-pro.zip',
                'delivery_type' => 'file',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1587620962725-abab7fe55159?w=1200&q=80',
                    'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=1200&q=80',
                    'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?w=1200&q=80',
                    'https://images.unsplash.com/photo-1542831371-29b0f74f9713?w=1200&q=80',
                ],
                'sales_count' => 47,
            ],
            [
                'name' => 'TailAdmin UI Kit — Komponen Dashboard Tailwind',
                'slug' => 'tailadmin-ui-kit-komponen-dashboard-tailwind',
                'sku' => 'TAU-002',
                'short_description' => 'Koleksi 80+ komponen UI dashboard siap pakai berbasis Tailwind CSS. Tabel, chart, form, modal, sidebar, dan banyak lagi.',
                'description' => '<h2>TailAdmin UI Kit</h2><p>Koleksi komponen UI premium untuk membangun dashboard admin yang indah dan fungsional. Semua komponen dibangun dengan Tailwind CSS murni dan kompatibel dengan framework apapun.</p><h3>Yang Termasuk</h3><ul><li>80+ komponen UI siap pakai</li><li>15 template halaman dashboard</li><li>Komponen chart & grafik (Chart.js)</li><li>Sistem grid dan layout fleksibel</li><li>Dark & light mode</li><li>Responsive design untuk semua perangkat</li><li>Update lifetime gratis</li></ul>',
                'category' => 'UI Kit',
                'stack' => 'Tailwind CSS, Alpine.js, Chart.js, HTML5',
                'price' => 199000,
                'discount_percentage' => 15,
                'is_active' => true,
                'preview_url' => 'https://demo.tailadmin.akhritech.com',
                'download_path' => 'products/tailadmin-ui-kit.zip',
                'delivery_type' => 'file',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80',
                    'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=1200&q=80',
                    'https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=1200&q=80',
                ],
                'sales_count' => 83,
            ],
            [
                'name' => 'InvoiceGen — Template Invoice & Quotation',
                'slug' => 'invoicegen-template-invoice-quotation',
                'sku' => 'IGN-003',
                'short_description' => 'Template invoice, quotation, dan kuitansi profesional siap cetak. Format PDF, HTML, dan Word. Cocok untuk freelancer dan UKM.',
                'description' => '<h2>InvoiceGen Template Pack</h2><p>Paket template dokumen bisnis profesional yang mencakup invoice, quotation, kuitansi, dan purchase order. Tersedia dalam berbagai format yang mudah diedit.</p><h3>Isi Paket</h3><ul><li>10 desain invoice modern & klasik</li><li>5 template quotation/penawaran harga</li><li>3 template kuitansi pembayaran</li><li>2 template purchase order</li><li>Format: PDF, HTML, DOCX</li><li>Mudah dikustomisasi sesuai branding perusahaan</li><li>Panduan penggunaan PDF</li></ul>',
                'category' => 'Template',
                'stack' => 'HTML, CSS, PDF, DOCX',
                'price' => 79000,
                'discount_percentage' => 0,
                'is_active' => true,
                'preview_url' => null,
                'download_path' => 'products/invoicegen-pack.zip',
                'delivery_type' => 'file',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1200&q=80',
                    'https://images.unsplash.com/photo-1586282391129-76a6df230234?w=1200&q=80',
                    'https://images.unsplash.com/photo-1568234928966-359c35dd8327?w=1200&q=80',
                ],
                'sales_count' => 124,
            ],
            [
                'name' => 'NextShop — E-Commerce Starter Next.js',
                'slug' => 'nextshop-ecommerce-starter-nextjs',
                'sku' => 'NSP-004',
                'short_description' => 'Starter kit e-commerce modern berbasis Next.js 14 + TypeScript. Fitur cart, checkout, product management, dan integrasi payment gateway Midtrans.',
                'description' => '<h2>NextShop E-Commerce Starter</h2><p>Template e-commerce production-ready yang dibangun dengan teknologi modern. Cocok untuk toko online skala kecil hingga menengah yang membutuhkan performa tinggi dan SEO optimal.</p><h3>Fitur Lengkap</h3><ul><li>Next.js 14 App Router + TypeScript</li><li>Autentikasi dengan NextAuth.js</li><li>Manajemen produk, kategori, dan inventori</li><li>Keranjang belanja & wishlist</li><li>Checkout flow lengkap</li><li>Integrasi Midtrans (QRIS, VA, kartu kredit)</li><li>Dashboard admin sederhana</li><li>SEO-friendly dengan metadata dinamis</li></ul>',
                'category' => 'Starter Kit',
                'stack' => 'Next.js 14, TypeScript, Tailwind CSS, Prisma, PostgreSQL, Midtrans',
                'price' => 499000,
                'discount_percentage' => 25,
                'is_active' => true,
                'preview_url' => 'https://demo.nextshop.akhritech.com',
                'download_path' => 'products/nextshop-starter.zip',
                'delivery_type' => 'github_repo',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=1200&q=80',
                    'https://images.unsplash.com/photo-1557821552-17105176677c?w=1200&q=80',
                    'https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=1200&q=80',
                    'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1200&q=80',
                    'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=1200&q=80',
                ],
                'sales_count' => 31,
            ],
            [
                'name' => 'BlogPress — Template Blog Minimalis',
                'slug' => 'blogpress-template-blog-minimalis',
                'sku' => 'BPR-005',
                'short_description' => 'Template blog minimalis dan elegan berbasis HTML/CSS murni. Desain bersih, loading super cepat, SEO-friendly, dan mudah dikustomisasi.',
                'description' => '<h2>BlogPress Template</h2><p>Template blog dengan desain minimalis yang mengutamakan keterbacaan konten dan kecepatan loading. Sempurna untuk personal blog, jurnal teknologi, atau website artikel.</p><h3>Keunggulan</h3><ul><li>Desain typographic yang bersih dan modern</li><li>Google Fonts terintegrasi (Inter + Merriweather)</li><li>Dark mode otomatis via media query</li><li>Syntax highlighting untuk blog teknologi</li><li>Reading progress bar</li><li>Table of contents otomatis</li><li>Lighthouse score 95+</li><li>Dokumentasi lengkap & mudah dikustomisasi</li></ul>',
                'category' => 'Template',
                'stack' => 'HTML5, CSS3, Vanilla JavaScript',
                'price' => 99000,
                'discount_percentage' => 10,
                'is_active' => true,
                'preview_url' => 'https://demo.blogpress.akhritech.com',
                'download_path' => 'products/blogpress-template.zip',
                'delivery_type' => 'file',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=1200&q=80',
                    'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&q=80',
                    'https://images.unsplash.com/photo-1526378800651-c32d170fe6f8?w=1200&q=80',
                ],
                'sales_count' => 67,
            ],
            [
                'name' => 'APIForge — REST API Boilerplate Node.js',
                'slug' => 'apiforge-rest-api-boilerplate-nodejs',
                'sku' => 'AFG-006',
                'short_description' => 'Boilerplate REST API production-ready dengan Node.js, Express, JWT auth, rate limiting, logging, dan dokumentasi Swagger otomatis.',
                'description' => '<h2>APIForge REST API Boilerplate</h2><p>Starter kit API backend yang sudah mencakup semua kebutuhan dasar untuk API production. Dibangun dengan best practice security dan scalability in mind.</p><h3>Fitur yang Disertakan</h3><ul><li>Express.js + TypeScript</li><li>JWT Authentication & Refresh Token</li><li>Role-based authorization middleware</li><li>Input validation dengan Zod</li><li>Rate limiting & helmet security headers</li><li>Winston logging dengan log rotation</li><li>Swagger/OpenAPI dokumentasi otomatis</li><li>Unit & integration testing dengan Jest</li><li>Docker compose ready</li><li>CI/CD workflow template (GitHub Actions)</li></ul>',
                'category' => 'Starter Kit',
                'stack' => 'Node.js, Express, TypeScript, PostgreSQL, Redis, Docker',
                'price' => 349000,
                'discount_percentage' => 0,
                'is_active' => true,
                'preview_url' => 'https://docs.apiforge.akhritech.com',
                'download_path' => 'products/apiforge-boilerplate.zip',
                'delivery_type' => 'github_repo',
                'thumbnail_image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&q=80',
                'images' => [
                    'https://images.unsplash.com/photo-1629654297299-c8506221ca97?w=1200&q=80',
                    'https://images.unsplash.com/photo-1610986603166-f78428624e76?w=1200&q=80',
                    'https://images.unsplash.com/photo-1593720213428-28a5b9e94613?w=1200&q=80',
                ],
                'sales_count' => 22,
            ],
        ];

        foreach ($products as $data) {
            $data['id'] = (string) Uuid::uuid4();
            Product::create($data);
        }
    }
}
