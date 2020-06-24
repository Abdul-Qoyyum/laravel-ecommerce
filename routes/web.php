<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/webhook','TransactionController@hook')->name('transaction.hook');

//Wishlist  and cart routes
Route::middleware(['auth','verified'])->group(function (){

    Route::get('cart/checkout','CartCheckoutController@checkout')->name('cart.checkout');

    Route::get('cart/clear','CartController@clear')->name('cart.clear');

    Route::resource('cart','CartController');

    Route::get('wishlist/clear','WishlistController@clearWishlist')->name('wishlist.clear');

    Route::get('wishlist/cart/{id}','WishlistController@addToCart')->name('wishlist.cart');

    Route::resource('wishlist','WishlistController');

    Route::get('/checkout/success/{session_id}','CartCheckoutController@success')->name('checkout.success');

    Route::get('/checkout/cancel','CartCheckoutController@cancel')->name('checkout.cancel');

});


//Admin routes
Route::middleware(['auth','verified','staff'])->prefix('admin')->group(function(){

    Route::get('/','AdminHomeController@index');

    Route::resource('profile','AdminProfileController');

    Route::resource('products','AdminProductsController');

    Route::resource('categories', 'AdminCategoriesController');

});
