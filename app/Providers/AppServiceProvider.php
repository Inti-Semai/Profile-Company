<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
            // Inject $admin ke semua view admin.
            View::composer('admin.*', function ($view) {
                $admin = null;
                if (auth('admin')->check()) {
                    $admin = auth('admin')->user();
                }
                $view->with('admin', $admin);
            });
        //
    }
}
