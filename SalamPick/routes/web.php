<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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
    
// Route::get('/payment', function () {
//     return view('buy');
// })->name('buy');

Route::get("/payment",[HomeController::class,'index']) -> name('buy');