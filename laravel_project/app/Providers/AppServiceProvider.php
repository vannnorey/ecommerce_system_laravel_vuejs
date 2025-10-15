<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayWayService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PayWayService::class, function ($app) {
            return new PayWayService();
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
