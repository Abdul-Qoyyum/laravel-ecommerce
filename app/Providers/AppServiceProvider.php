<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Schema\Builder;

use Cart;

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
        Builder::defaultStringLength(191);
        view()->composer('includes.navbar',function ($view){
            $count = Auth::check() ? Cart::session(Auth::id())->getContent()->count() : 0;
            $view->with('count', $count);
        });
    }
}
