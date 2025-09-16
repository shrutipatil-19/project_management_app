<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('employee-project-access', function ($user) {
            return Auth::guard('employee')->check();
        });

        Gate::define('admin-access', function ($user) {
            return Auth::guard('admin')->check(); 
        });
    }
}
