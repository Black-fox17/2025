<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('signup_post');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/signin', function () {
    return view('signin'); // Matches resources/views/signin.blade.php
})->name('signin');

Route::get('/welcome', function () {
    return view('welcome'); // Matches resources/views/home.blade.php
})->name('welcome');
