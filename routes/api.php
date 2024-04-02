<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\RegisterController;
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
});
