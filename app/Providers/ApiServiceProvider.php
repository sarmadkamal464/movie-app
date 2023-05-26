<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\GetApi;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GetApi::class, function ($app) {
            return new GetApi(
                config('services.tmdb.endpoint'),
                config('services.tmdb.api')
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
