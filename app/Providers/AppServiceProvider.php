<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\CompanyProfile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // View Composer untuk menyediakan data company ke semua view
        View::composer(['layouts.app', 'home', 'service-detail'], function ($view) {
            // Gunakan cache agar tidak query database di setiap request
            $company = cache()->remember('company_profile', 3600, function () {
                return CompanyProfile::first();
            });
            $view->with('company', $company);
        });
    }
}

