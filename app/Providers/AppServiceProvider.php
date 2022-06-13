<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::routes(null, ['middleware' => [
            'universal',
            InitializeTenancyByDomain::class,
            InitializeTenancyBySubdomain::class,
        ]]);

        Passport::loadKeysFrom(base_path(config('passport.key_path')));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::loadKeysFrom(base_path(config('passport.key_path')));
    }
}
