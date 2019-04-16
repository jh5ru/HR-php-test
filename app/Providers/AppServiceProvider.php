<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('/vendor/pagination/bootstrap-4');
        View::share('current',$this->app->request->getRequestUri());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
