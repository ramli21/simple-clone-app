<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\ServiceItemController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductPublicController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [\App\Http\Controllers\ProductPublicController::class, 'show'])->name('products.show');
Route::get('/products/{slug}/checkout', [\App\Http\Controllers\ProductPublicController::class, 'checkout'])->name('products.checkout.form');
Route::post('/products/checkout', [\App\Http\Controllers\ProductPublicController::class, 'processCheckout'])->name('products.checkout.process');
Route::get('/products/{product_slug}/payment', [\App\Http\Controllers\ProductPublicController::class, 'payment'])->name('products.payment');
Route::get('/products/checkout-success/{payment_id}/{token}', [\App\Http\Controllers\ProductPublicController::class, 'checkoutSuccess'])->name('products.checkout-success');

// Customer portal download (1-time link by unique code)
Route::get('/download', [\App\Http\Controllers\ProductDownloadController::class, 'showForm'])->name('download.form');
Route::post('/download/resolve', [\App\Http\Controllers\ProductDownloadController::class, 'resolve'])->name('download.resolve');
Route::get('/download/{token}', [\App\Http\Controllers\ProductDownloadController::class, 'download'])->name('download.one-time');

Route::view('/terms-of-service', 'pages.terms')->name('terms-of-service');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');
Route::view('/saas/sabilsys', 'products.sabilsys')->name('saas.sabilsys');
Route::post('/inquiry', [HomeController::class, 'inquiry'])->name('inquiry.store');
Route::get('/blogs', [PublicBlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [PublicBlogController::class, 'show'])->name('blogs.show');

Route::post('/products/confirm-payment', [\App\Http\Controllers\ProductPublicController::class, 'confirmPayment'])
    ->name('products.confirm-payment');
Route::post('/products/claim-free', [\App\Http\Controllers\ProductPublicController::class, 'claimFree'])
    ->name('products.claim-free');

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'index'])->name('index');
        Route::post('/{payment}/approve', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'approve'])->name('approve');
        Route::post('/{payment}/reject', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'reject'])->name('reject');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('blogs', BlogController::class);
    Route::post('blogs/upload', [BlogController::class, 'upload'])->name('blogs.upload');

    Route::resource('itineraries', ItineraryController::class)->only(['update', 'edit']);
    Route::resource('inquiries', InquiryController::class)->only(['index', 'show', 'destroy', 'update']);
    Route::resource('service-items', ServiceItemController::class);

    Route::resource('users', UserController::class);
    Route::get('users/{user}/reset-password', [UserController::class, 'resetPasswordForm'])->name('users.reset-password.form');
    Route::post('users/{user}/reset-password', [UserController::class, 'resetPassword'])->name('users.reset-password');

    Route::get('/service-items/{serviceItem}/itineraries/create', [ItineraryController::class, 'create'])->name('itineraries.create');
    Route::post('/service-items/{serviceItem}/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store');

    Route::resource('company-profiles', CompanyProfileController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class);

    Route::resource('products', \App\Http\Controllers\Admin\ProductAdminController::class);
});

// Sitemap
Route::get('/sitemap.xml', function () {
    // Fokus: halaman depan, products (SabilSys), dan blogs
    $blogs = Blog::published()->latest()->get();

    $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

    $pages = [
        ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['loc' => url('/products/sabilsys'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['loc' => url('/blogs'), 'priority' => '0.9', 'changefreq' => 'weekly'],

        // Jika route ini memang digunakan di production Anda
        // ['loc' => url('/akhritech-landing'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ];

    foreach ($pages as $page) {
        $sitemap .= ' <url>'."\n";
        $sitemap .= '  <loc>'.$page['loc'].'</loc>'."\n";
        $sitemap .= '  <lastmod>'.now()->toIso8601String().'</lastmod>'."\n";
        $sitemap .= '  <changefreq>'.$page['changefreq'].'</changefreq>'."\n";
        $sitemap .= '  <priority>'.$page['priority'].'</priority>'."\n";
        $sitemap .= ' </url>'."\n";
    }

    // Blog detail: selalu sinkron dengan data yang published
    foreach ($blogs as $blog) {
        $sitemap .= ' <url>'."\n";
        $sitemap .= '  <loc>'.url('/blogs/'.$blog->slug).'</loc>'."\n";
        $sitemap .= '  <lastmod>'.($blog->updated_at?->toIso8601String() ?? now()->toIso8601String()).'</lastmod>'."\n";
        $sitemap .= '  <changefreq>monthly</changefreq>'."\n";
        $sitemap .= '  <priority>0.7</priority>'."\n";
        $sitemap .= ' </url>'."\n";
    }

    $sitemap .= '</urlset>';

    // Hapus buffer output yang tidak diinginkan (whitespace/BOM/echo dari file lain)
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    // Hapus BOM UTF-8 bila ada
    $sitemap = ltrim($sitemap, "\xEF\xBB\xBF");

    return response($sitemap, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
});
