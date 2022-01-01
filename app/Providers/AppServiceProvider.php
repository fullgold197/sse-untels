<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Log;



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
        //
        Paginator::useBootstrap();
        
        if (config('app.env') === 'production') {
            \url('https');}



    }
}
