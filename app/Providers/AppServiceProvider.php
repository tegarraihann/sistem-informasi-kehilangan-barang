<?php

namespace App\Providers;

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

        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
        app('router')->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);

    if (env('APP_ENV') !== 'local') {
        URL::forceScheme('https');
        }
    }
}