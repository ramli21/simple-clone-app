<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceItemController;
use App\Http\Controllers\ItineraryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InquiryController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/ex/travel', [HomeController::class, 'travelHome']);
Route::get('/service/{slug}', [HomeController::class, 'serviceDetail'])->name('service.detail');

Route::post('/inquiry', [HomeController::class, 'inquiry'])->name('inquiry.store');

Auth::routes();
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('itineraries', ItineraryController::class)->only(['update', 'edit']);
        Route::resource('inquiries', InquiryController::class)->only(['index', 'show', 'destroy', 'update']);
        Route::resource('service-items', ServiceItemController::class);
        Route::get('/service-items/{serviceItem}/itineraries/create', [ItineraryController::class, 'create'])->name('itineraries.create');
        Route::post('/service-items/{serviceItem}/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store');
        // Route::post('/service-items/itineraries/{itineraries}', [ItineraryController::class, 'store'])->name('itineraries.store');

        Route::resource('company-profiles', CompanyProfileController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    });

