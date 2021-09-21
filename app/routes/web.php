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

Route::get('/auth', [\App\Http\Controllers\AuthController::class, 'index'])->name('index.auth');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index.home');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('index.cart');

Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('index.checkout');

Route::get('/products/{slug}', [\App\Http\Controllers\ProductController::class, 'index'])->name('index.product');

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('index.shop');

Route::get('/contact', [\App\Http\Controllers\StaticPageController::class, 'contact'])->name('index.contact');

Route::get('/about', [\App\Http\Controllers\StaticPageController::class, 'about'])->name('index.about');