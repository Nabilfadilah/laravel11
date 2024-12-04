<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
        // dijalankan ketika aplikasi berjalan
        // untuk membatasi, keamanan
        // preventing lazy loading
        Model::preventLazyLoading();
    }
}
