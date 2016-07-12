<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Paginator\EPresenter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, env('LOCALE', 'en'));
        Carbon::setLocale(env('LOCALE', 'en'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Paginator::presenter(function ($paginator) {
            return new EPresenter($paginator);
        });
    }
}
