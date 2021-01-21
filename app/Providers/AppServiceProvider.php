<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * As specified in the official laravel documentation
         * in order for MySQL to create indexes for the migrations
         * more info can be found on the following link:
         * https://laravel.com/docs/7.x/migrations#creating-indexes
         */
        Schema::defaultStringLength(191);
    }
}
