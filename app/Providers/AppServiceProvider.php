<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        var_dump('333');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        var_dump('22');
    }
}
