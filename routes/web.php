<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BloodSearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('user.login');
Route::get('/sign-up', [AuthController::class, 'signup'])->name('user.signup');
Route::post('/sign-up/store/', [AuthController::class, 'signupStore'])->name('user.signup.store');
Route::post('/login/store/', [AuthController::class, 'loginStore'])->name('user.login.store');

Route::middleware('userAccess')->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});


Route::get('/test', function(){
    return view('index');
});

Route::get('/blood-search', [BloodSearchController::class, 'search'])->name('blood.search');

Route::get('/rules', function() {
    return view('rules');
});
Route::get('/blog', function() {
    return view('blog');
});
Route::get('/about', function() {
    return view('about');
});
Route::get('/contact', function() {
    return view('contact');
});


