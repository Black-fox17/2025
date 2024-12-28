<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


Auth::routes();

Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('signup_post');

Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('signin_post');

Route::get('/', function(){
    return view('main');
}) -> name('main');
Route::get("/product/{id}",[ProductController::class,'getProduct'])-> name('product.show');

Route::get("/fashion-products",[ProductController::class,'showProducts']) -> name("products");
    
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get("/payment",[HomeController::class,'index']) -> name('buy');