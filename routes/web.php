<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class ,'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/all-products', [PageController::class ,'allProducts'])->name('all-products');
Route::get('/flash-sale', [PageController::class ,'flashSale'])->name('flash-sale');
Route::get('/trade-in', [PageController::class ,'tradeIn'])->name('trade-in');
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

Route::get('register', [AuthController::class, 'registerView'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');


