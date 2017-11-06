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

        /* See notes for 'Index Lengths & MySQL / MariaDB' at the link at:
         * laravel.com/docs/5.5/migrations#creating-indexes
         * in reference to the line below
         */
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
