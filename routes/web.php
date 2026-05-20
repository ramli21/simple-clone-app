<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Models\Blog;
use App\Models\ServiceItem;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/templates', [HomeController::class, 'themes'])->name('home.templates');

Route::get('/products/sabilsys', [HomeController::class, 'productSabilsys'])->name('home.products.sabilsys');

Route::get('/ex/travel', [HomeController::class, 'travelHome']);
Route::get('/service/{slug}', [HomeController::class, 'serviceDetail'])->name('service.detail');

Route::post('/inquiry', [HomeController::class, 'inquiry'])->name('inquiry.store');
Route::get('/blogs', [PublicBlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{slug}', [PublicBlogController::class, 'show'])->name('blogs.show');

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {
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
});


// Sitemap
Route::get('/sitemap.xml', function() {
    $blogs = Blog::published()->get();
    $services = ServiceItem::where('status', 'active')->get();
    
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>\n';
$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    // Static Pages
    $pages = [
    ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['loc' => url('/templates'), 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => url('/ex/travel'), 'priority' => '0.6', 'changefreq' => 'monthly'],
    ['loc' => url('/blogs'), 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => url('/akhritech-landing'), 'priority' => '0.9', 'changefreq' => 'weekly'],
    ];

    foreach ($pages as $page) {
    $sitemap .= ' <url>' . "\n";
        $sitemap .= ' <loc>' . $page['loc'] . '</loc>' . "\n";
        $sitemap .= ' <lastmod>' . now()->toIso8601String() . '</lastmod>' . "\n";
        $sitemap .= ' <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
        $sitemap .= ' <priority>' . $page['priority'] . '</priority>' . "\n";
        $sitemap .= ' </url>' . "\n";
    }

    // Blog Posts
    foreach ($blogs as $blog) {
    $sitemap .= ' <url>' . "\n";
        $sitemap .= ' <loc>' . url('/blogs/' . $blog->slug) . '</loc>' . "\n";
        $sitemap .= ' <lastmod>' . $blog->updated_at->toIso8601String() . '</lastmod>' . "\n";
        $sitemap .= ' <changefreq>monthly</changefreq>' . "\n";
        $sitemap .= ' <priority>0.7</priority>' . "\n";
        $sitemap .= ' </url>' . "\n";
    }

    // Service Pages
    foreach ($services as $service) {
    $sitemap .= ' <url>' . "\n";
        $sitemap .= ' <loc>' . url('/service/' . $service->slug) . '</loc>' . "\n";
        $sitemap .= ' <lastmod>' . $service->updated_at->toIso8601String() . '</lastmod>' . "\n";
        $sitemap .= ' <changefreq>monthly</changefreq>' . "\n";
        $sitemap .= ' <priority>0.8</priority>' . "\n";
        $sitemap .= ' </url>' . "\n";
    }

    $sitemap .= '</urlset>';

return response($sitemap, 200, ['Content-Type' => 'application/xml' ]);
});

