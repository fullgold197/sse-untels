<?php

namespace App\Providers;

use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Log;

Use Illuminate\Support\Facades\URL;
use Laravel\Fortify\Fortify;

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
       /*  $this->app['request']->server->set('HTTPS', 'on'); */
        //Sirve para convertir http en https
        if (config('app.env') === 'production') {
            $this->app['request']->server->set('HTTPS', 'on');
            \URL::forceScheme('https');
        }

        \Gate::define('admin', function ($user) {
            if (Auth::user()->role_as == 2) {
                return false;
            }
            else{
                return true;
            }

        });








    }
}
