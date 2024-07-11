<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class ,'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/all-products', [PageController::class ,'allProducts'])->name('all-products');
Route::get('/flash-sale', [PageController::class ,'flashSale'])->name('flash-sale');
Route::get('/trade-in', [PageController::class ,'tradeIn'])->name('trade-in');
Route::get('/cart', [PageController::class ,'cart'])->name('cart');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');


