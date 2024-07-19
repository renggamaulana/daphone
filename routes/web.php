<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TradeInController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class ,'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class ,'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
});
Route::get('/flash-sale', [PageController::class ,'flashSale'])->name('flash-sale');

Route::prefix('trade-in')->group(function() {
    Route::get('/', [TradeInController::class ,'index'])->name('trade-in');
    Route::get('confirm', [TradeInController::class, 'confirm'])->name('trade-in.confirm');
    Route::get('confirmed', [TradeInController::class, 'confirmed'])->name('trade-in.confirmed');
});

Route::get('/sell-phone', [PageController::class ,'sellPhone'])->name('sell-phone');
Route::get('/cart', [PageController::class ,'cart'])->name('cart');

Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::prefix('account')->group(function() {
        Route::prefix('profile')->group(function() {
            Route::get('/', [AccountController::class, 'profile'])->name('profile');
            Route::post('upadate', [AccountController::class, 'updateProfile'])->name('update-profile');
        });
        Route::prefix('security')->group(function(){
            Route::get('/', [AccountController::class, 'security'])->name('security');
            Route::post('change-password', [AccountController::class, 'changePassword'])->name('change-password');
        });
        Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
        Route::get('/address', [AccountController::class, 'address'])->name('address');
    });
});

Route::prefix('checkout')->group(function(){
    Route::get('cart', [CheckoutController::class, 'cart'])->name('checkout.cart');
    Route::post('{product}/add-to-cart', [CheckoutController::class, 'addToCart'])->name('checkout.add-to-cart');
    Route::delete('cart/{cart}', [CheckoutController::class, 'deleteCart'])->name('checkout.delete-cart');
    Route::get('shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
});

Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('products');
});

Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');


