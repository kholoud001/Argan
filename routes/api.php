<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
|
|
*/
Route::namespace('Api')->group(function (){

    Route::prefix('auth')->group(function (){
        Route::post('login', [LoginController::class, 'login']);
       // Route::post('register', [RegisterController::class, 'store']);
        Route::post('/register', [RegisterController::class, 'store']);

    });
});

Route::group([
    'middleware'=> 'auth:api'
],function (){
    Route::post('logout',[LogoutController::class,'logout']);
////////////////////////////////       Orders          ///////////////////////////////////////////////////
    Route::post('/product/{id}/addToCart', [CartController::class, 'addToCart'])->name('product.addToCart');
    //display my cart items
    Route::get('/cart/items', [CartController::class, 'getCartItems']);
    //delete cart item
    Route::delete('/cart/items/{id}', [CartController::class,'removeCartItem'])->name('api.cart.items.remove');
    //update quantity
    Route::patch('/cart/items/{id}', [CartController::class, 'updateCartItemQuantity'])->name('api.cart.items.updateQuantity');
    //checkout
    Route::post('/checkout', [CartController::class, 'checkout'])->name('api.checkout');



////////////////////////////////       Wishlists          ///////////////////////////////////////////////////

    Route::post('/wishlist/{productId}/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::get('/wishlist/items', [WishlistController::class, 'getWishlistItems']);
    Route::delete('/wishlist/items/{id}', [WishlistController::class, 'removeWishlistItem'])->name('api.wishlist.items.remove');



});
