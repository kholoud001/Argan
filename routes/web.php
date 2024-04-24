<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordLinkController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\WishlistController;
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

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');


/*
|--------------------------------------------------------------------------
| login Page
|--------------------------------------------------------------------------
*/
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::get('/register', [RegisterController::class, 'show'])->name('register');



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

/*
|--------------------------------------------------------------------------
|                                Forgot password
|                                 enter & send email
|--------------------------------------------------------------------------
*/

// Route for showing the form to enter the email
Route::get('/forgot-password', [ForgotPasswordLinkController::class, 'create'])
    ->name('password.request')->middleware('guest');
// Route for handling form submission
Route::post('/forgot-password', [ForgotPasswordLinkController::class, 'store'])
    ->name('password.email')->middleware('guest');
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
Route::group([], function () {

    Route::middleware('role:admin')->group(function () {


//dashboard
    Route::get('/dashboard',[TrackController::class,'countUser'])->name('dashboard');
////////////////////////             Users Management             //////////////////////////////
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

////////////////////////            Categories Management               //////////////////////////////
    Route::get('/admin/categories', [CategoryController::class, 'show'])->name('categories.show');
//add category
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
//update category
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
//delete category
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


////////////////////////            Products Management               //////////////////////////////
    Route::get('/admin/products', [ProductController::class, 'show'])->name('products.show');
//add product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//update product
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
//delete product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
//restore post
    Route::put('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');


////////////////////////            Blogs Management               //////////////////////////////
    Route::get('/admin/posts', [BlogController::class, 'show'])->name('posts.show');
//add product
    Route::post('/posts', [BlogController::class, 'store'])->name('posts.store');
//delete post
    Route::delete('/posts/{id}', [BlogController::class, 'destroy'])->name('posts.destroy');
//restore post
    Route::put('/posts/{id}/restore', [BlogController::class, 'restore'])->name('posts.restore');

////////////////////////            Orders Management               //////////////////////////////
    Route::get('/admin/orders', [TrackController::class, 'index'])->name('orders.show');
//approve
    Route::post('/orders/{id}/approve', [TrackController::class, 'approve'])->name('orders.approve');
//archive
    Route::delete('/orders/{id}/archive', [TrackController::class, 'archive'])->name('orders.archive');

});
});
/*
|--------------------------------------------------------------------------
| user Pages
|--------------------------------------------------------------------------
*/
 /*
//|--------------------------------------------------------------------------
//| Home Page
//|--------------------------------------------------------------------------
//*/
///
/// Show recent products in Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
////////////////////////////////       Products          ///////////////////////////////////////////////////

//product details page and reviews
Route::get('/products/{id}', [HomeController::class, 'getProductDetails'])->name('product.details');

////////////////////////////////       Blogs          ///////////////////////////////////////////////////

//Blog details page
Route::get('/blogs/{id}',[HomeController::class,'getBlogDetails'])->name('blog.details');





////////////////////////////////       Contact Page          ///////////////////////////////////////////////////
Route::get('/contact',[HomeController::class,'contactview'])->name('contact.view');
Route::post('/contact   ', [HomeController::class, 'contact'])->name('contact.send');

//get products collection and sort
Route::get('/products-collection',[HomeController::class,'ProductCatalogue'])->name('products.collection');

//Route::get('/products-sort', [HomeController::class, 'sort'])->name('products.sort');

Route::get('/products-search', [HomeController::class, 'search'])->name('search');

//|--------------------------------------------------------------------------
//| Blog Collection
//|--------------------------------------------------------------------------
//*/
///
Route::get('blog-collection',[HomeController::class, 'BlogCatalogue'])->name('blog');
Route::get('/blog-search', [HomeController::class, 'searchBlog'])->name('blog.search');



//|--------------------------------------------------------------------------
//| About us Page
//|--------------------------------------------------------------------------
//*/
Route::get('/About-us',function (){
    return view ('aboutus');
})->name('about.us');



////////////////////////////////       Orders          ///////////////////////////////////////////////////
///
/// I need to be connected
//Route::post('/product/{id}/addToCart', [OrderController::class, 'addToCart'])->name('product.addToCart');

Route::group([], function () {
    Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/wishlist/view', [WishlistController::class, 'index'])->name('wishlist.view');
    Route::get('/checkout/view', [CartController::class, 'checkoutview'])->name('get.checkout');
    Route::get('/account', [AccountController::class, 'index'])->name('account.view');
});
