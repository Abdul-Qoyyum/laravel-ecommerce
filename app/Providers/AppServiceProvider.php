<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Schema\Builder;

use App\Category;

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
            $cartTotal = Auth::check() ? Cart::session(Auth::id())->getContent()->count() : 0;
            $wishlistTotal = Auth::check() ? app('wishlist')->getContent()->count() : 0;
            $categories = Category::all();
            $view->with(['cartTotal' =>$cartTotal,'wishlistTotal'=>$wishlistTotal,'categories'=>$categories]);
        });


    }


}
