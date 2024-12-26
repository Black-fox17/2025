<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('signup_post');

Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('signin_post');

Route::get('/profile',function(){
    return view('profile-create');
})->name('profile');
Route::get('/profile/{user}', [App\Http\Controllers\MainController::class, 'index'])->name('profile.show');

Route::get('/products', [ProductController::class, 'showProducts']);

Route::get('/product-page', function () {
    return view('product-page'); 
})->name('product-page');
