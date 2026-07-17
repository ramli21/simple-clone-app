<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\CompanyProfile;
use Opcodes\LogViewer\Facades\LogViewer;

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

        // Authorize LogViewer access
        LogViewer::auth(function ($request) {
            $username = env('LOG_USERNAME');
            $password = env('LOG_PASSWORD');

            // In local environment, allow access if credentials are not configured
            if (app()->environment('local') && empty($username)) {
                return true;
            }

            // In production or other environments, block if credentials are empty
            if (empty($username) || empty($password)) {
                return false;
            }

            // Authenticate using HTTP Basic Authentication
            if ($request->getUser() === $username && $request->getPassword() === $password) {
                return true;
            }

            // Trigger browser Basic Auth dialog
            header('WWW-Authenticate: Basic realm="Log Viewer"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Unauthorized access to Log Viewer.';
            exit;
        });
    }
}

