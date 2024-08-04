<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellPhoneController;
use App\Http\Controllers\TradeInController;
use Illuminate\Support\Facades\Route;



Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/', [PageController::class ,'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class ,'index'])->name('products.index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('products.show');
});
Route::get('/flash-sale', [PageController::class ,'flashSale'])->name('flash-sale');

Route::prefix('trade-in')->group(function() {
    Route::get('/', [TradeInController::class ,'index'])->name('trade-in');
    Route::get('confirm', [TradeInController::class, 'confirm'])->name('trade-in.confirm');
    Route::get('confirmed', [TradeInController::class, 'confirmed'])->name('trade-in.confirmed');
});

Route::prefix('sell-phone')->group(function() {
    Route::get('/', [SellPhoneController::class, 'index'])->name('sell-phone');
    Route::get('confirm', [SellPhoneController::class, 'confirm'])->name('sell-phone.confirm');
    Route::get('confirmed', [SellPhoneController::class, 'confirmed'])->name('sell-phone.confirmed');
});

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

    Route::prefix('checkout')->group(function(){
        Route::get('guest', [CheckoutController::class, 'guest'])->name('checkout.guest');
        Route::get('account', [CheckoutController::class, 'account'])->name('checkout.account');
        Route::post('store-cart-data', [CheckoutController::class, 'storeCartData'])->name('checkout.storeCartData');
        Route::get('cart', [CheckoutController::class, 'cart'])->name('checkout.cart');
        Route::post('{product}/add-to-cart', [CheckoutController::class, 'addToCart'])->name('checkout.add-to-cart');
        Route::delete('cart/{cart}', [CheckoutController::class, 'deleteCart'])->name('checkout.delete-cart');
        Route::post('{product}/buy-now', [CheckoutController::class, 'buyNow'])->name('checkout.buy-now');
        Route::get('shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
        Route::get('payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
        Route::get('confirm-payment', [CheckoutController::class, 'confirmPayment'])->name('checkout.confirm-payment');
    });
});
Route::post('submit-payment', [CheckoutController::class, 'submitPayment']);



