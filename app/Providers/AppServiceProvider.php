<?php

namespace App\Providers;

use App\Models\Kontak;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        View::composer('*', function ($view) {
            $kontak = Kontak::first(); // Ambil data kontak
            $view->with('kontak', $kontak); // Kirim data kontak ke semua view
        });
    }
}
