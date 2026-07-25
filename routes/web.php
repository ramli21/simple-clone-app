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
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductPublicController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [\App\Http\Controllers\ProductPublicController::class, 'show'])->name('products.show');
Route::get('/products/{slug}/checkout', [\App\Http\Controllers\ProductPublicController::class, 'checkout'])->name('products.checkout.form');
Route::post('/products/checkout', [\App\Http\Controllers\ProductPublicController::class, 'processCheckout'])->name('products.checkout.process');
Route::get('/payment/{payment_id}', [\App\Http\Controllers\ProductPublicController::class, 'paymentPage'])->name('products.payment');
Route::get('/payment/{payment_id}/status', [\App\Http\Controllers\ProductPublicController::class, 'checkPaymentStatus'])->name('products.payment.status');
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

Route::get('/client-portal/{token}', [\App\Http\Controllers\ClientPortalController::class, 'show'])->name('client-portal.show');
Route::post('/client-portal/{token}/save-draft', [\App\Http\Controllers\ClientPortalController::class, 'saveDraft'])->name('client-portal.save-draft');
Route::post('/client-portal/{token}/submit', [\App\Http\Controllers\ClientPortalController::class, 'submit'])->name('client-portal.submit');
Route::post('/client-portal/{token}/upload', [\App\Http\Controllers\ClientPortalController::class, 'uploadFile'])->name('client-portal.upload');

Auth::routes();

Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('payments')->name('payments.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'index'])->name('index');
        Route::post('/{payment}/approve', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'approve'])->name('approve');
        Route::post('/{payment}/reject', [\App\Http\Controllers\Admin\PaymentAdminController::class, 'reject'])->name('reject');
    });

    Route::prefix('client-briefs')->name('client-briefs.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'store'])->name('store');
        Route::get('/{id}', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'show'])->name('show');
        Route::post('/{id}/status', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'updateStatus'])->name('update-status');
        Route::get('/{id}/download-zip', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'downloadZip'])->name('download-zip');
        Route::get('/{id}/export-pdf', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'exportPdf'])->name('export-pdf');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\ClientBriefAdminController::class, 'destroy'])->name('destroy');
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

    Route::resource('bank-accounts', \App\Http\Controllers\Admin\BankAccountController::class);
});

// Sitemap — dinamis: otomatis menyertakan produk aktif & blog yang dipublish
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
