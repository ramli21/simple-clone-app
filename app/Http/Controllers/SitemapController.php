<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap.xml
     * Otomatis menyertakan semua produk aktif dan blog yang sudah dipublish.
     */
    public function index(): Response
    {
        // Ambil semua produk yang aktif
        $products = Product::where('is_active', true)
            ->orderBy('updated_at', 'desc')
            ->get(['slug', 'updated_at']);

        // Ambil semua blog yang sudah dipublish
        $blogs = Blog::published()
            ->latest('updated_at')
            ->get(['slug', 'updated_at', 'published_at']);

        // Halaman statis
        $staticPages = [
            [
                'loc' => url('/'),
                'priority' => '1.0',
                'changefreq' => 'weekly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/products'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/blogs'),
                'priority' => '0.9',
                'changefreq' => 'weekly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc'        => url('/saas/akhrishop'),
                'priority'   => '0.9',
                'changefreq' => 'weekly',
                'lastmod'    => now()->toIso8601String(),
            ],
            [
                'loc'        => url('/terms-of-service'),
                'priority'   => '0.3',
                'loc' => url('/terms-of-service'),
                'priority' => '0.3',
                'changefreq' => 'yearly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/privacy-policy'),
                'priority' => '0.3',
                'changefreq' => 'yearly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/jasa-buat-website'),
                'priority' => '0.4',
                'changefreq' => 'yearly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/contact'),
                'priority' => '0.8',
                'changefreq' => 'yearly',
                'lastmod' => now()->toIso8601String(),
            ],
            [
                'loc' => url('/saas/sabilsys'),
                'priority' => '0.7',
                'changefreq' => 'yearly',
                'lastmod' => now()->toIso8601String(),
            ],
        ];

        $content = view('sitemap', compact('staticPages', 'products', 'blogs'))->render();

        // Bersihkan BOM dan whitespace sebelum deklarasi XML
        $content = ltrim($content, "\xEF\xBB\xBF \n\r\t");

        return response($content, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}

