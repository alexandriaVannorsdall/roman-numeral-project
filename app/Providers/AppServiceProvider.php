<?php

namespace App\Providers;

use App\Services\RomanNumeralConverterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RomanNumeralConverterService::class, function ($app) {
            return new RomanNumeralConverterService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
