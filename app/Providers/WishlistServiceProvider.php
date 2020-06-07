<?php

namespace App\Providers;

use App\DatabaseStorage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Darryldecode\Cart\Cart;
use App\User;

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
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DatabaseStorage();
            $events = $app['events'];
            $instanceName = 'wishlist';

            $userId = Auth::id();
            $user = User::findOrfail($userId);
//if wishlist id exist, use it as teh session key.
            if($wishlist_id = $user->wishlist_id){
               $session_key = $wishlist_id;
            }else{
//                create and save a new key
                $new_wishlist_id = uniqid() . $userId;
//             update the new wishlist id in the wishlist_id resource
                $user->update(['wishlist_id'=>$new_wishlist_id]);
                $session_key = $new_wishlist_id;
            }

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }


}
