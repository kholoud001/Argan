<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\GoogleController;
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

/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');
/*
|--------------------------------------------------------------------------
| login Page
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'show'])->name('login');


//Google login
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleController::class, 'callbackGoogle']);
// Facebook
// Route for redirecting to Facebook for authentication
Route::get('auth/facebook', [FacebookController::class, 'redirect'])->name('facebook.redirect');
// Route for handling Facebook callback after authentication
Route::get('auth/facebook/callback', [FacebookController::class, 'callbackFacebook'])->name('facebook.callback');

/*
|--------------------------------------------------------------------------
| register Page
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'show']);

/*
|--------------------------------------------------------------------------
|                                Forgot password
|                                 enter & send email
|--------------------------------------------------------------------------
*/

// Route for showing the form to enter the email
Route::get('/forgot-password', [ForgotPasswordLinkController::class, 'create'])
    ->name('password.request');
// Route for handling form submission
Route::post('/forgot-password', [ForgotPasswordLinkController::class, 'store'])
    ->name('password.email');
//success page
Route::get('/check-your-inbox', [ForgotPasswordLinkController::class, 'show'])
    ->name('success');
/*
|--------------------------------------------------------------------------
|                                Forgot password
|                                 reset password
|--------------------------------------------------------------------------
*/
// Display the password reset form
Route::get('/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
// Process the password reset form submission
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])
    ->name('password.update');

/*
|--------------------------------------------------------------------------
| Admin Pages
|--------------------------------------------------------------------------
*/

//should the admin be authentified
Route::get('/dashboard', function () {
    return view('Admin.index');
})->name('dashboard');

//users table (and trashed)
Route::get('/admin/users', [UserController::class, 'show'])->name('users.show');
//add user
Route::post('/admin/add/users', [UserController::class, 'store'])->name('users.store');
//Add user form
Route::post('/users-add', [UserController::class, 'addForm'])->name('form');
//delete user
Route::delete('/admin/delete/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// restore
Route::put('/admin/users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');





