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

//cart routes
Route::middleware(['auth','verified'])->group(function (){

    Route::get('cart/clear','CartController@clear')->name('cart.clear');

    Route::resource('cart','CartController');

});

//Wishlist routes
Route::middleware(['auth','verified'])->group(function (){

    Route::get('wishlist/clear','WishlistController@clearWishlist')->name('wishlist.clear');

    Route::get('wishlist/cart/{id}','WishlistController@addToCart')->name('wishlist.cart');

    Route::resource('wishlist','WishlistController');

});

//Admin routes
Route::middleware(['auth','verified','staff'])->prefix('admin')->group(function(){

    Route::get('/','AdminHomeController@index');

    Route::resource('profile','AdminProfileController');

    Route::resource('products','AdminProductsController');

    Route::resource('categories', 'AdminCategoriesController');

});
