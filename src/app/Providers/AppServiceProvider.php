<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Service;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
	\Illuminate\Support\Facades\URL::forceScheme('https');
        // Share data layanan ke semua views (untuk navbar mega menu)
        View::composer('*', function ($view) {
            if (class_exists(\App\Models\Service::class)) {
                $view->with('navConstruction', \App\Models\Service::active()->construction()->orderBy('sort_order')->get());
                $view->with('navNonConstruction', \App\Models\Service::active()->nonConstruction()->orderBy('sort_order')->get());
                $view->with('footerConstruction', \App\Models\Service::active()->construction()->orderBy('sort_order')->take(5)->get());
                $view->with('footerNonConstruction', \App\Models\Service::active()->nonConstruction()->orderBy('sort_order')->take(5)->get());
                $view->with('totalServices', \App\Models\Service::active()->count()); 
            }
        });
    }
}
