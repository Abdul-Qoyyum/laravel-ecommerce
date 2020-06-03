<?php

namespace App\Providers;

use App\DatabaseStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class WishlistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DatabaseStorage();
            $events = $app['events'];
            $instanceName = 'wishlist';
            $session_key = Auth::user()->id;
            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }


}
