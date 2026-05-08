<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BloodSearchController;


use App\Http\Controllers\ChatbotController;

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
Route::get('/ai', function() {
    return view('ai-recommend');
});

Route::get('/search',    [BloodSearchController::class, 'search'])->name('blood.search');
Route::get('/ai-recommend', [BloodSearchController::class, 'recommend'])->name('blood.recommend');
Route::post('/ai-recommend', [BloodSearchController::class, 'recommend'])->name('blood.recommend.post');

Route::prefix('chatbot')->group(function () {

    // User message পাঠাবে এখানে (POST)
    Route::post('/message', [ChatbotController::class, 'sendMessage'])
        ->name('chatbot.message');

    // Page reload এ history দেখাবে (GET)
    Route::get('/history/{sessionId}', [ChatbotController::class, 'getHistory'])
        ->name('chatbot.history');

});



use App\Http\Controllers\EmergencyController;

// Emergency Routes (Registered Users + Admin)
Route::middleware(['auth'])->prefix('emergency')->name('emergency.')->group(function () {
    Route::get('/create',           [EmergencyController::class, 'create'])->name('create');
    Route::post('/store',           [EmergencyController::class, 'store'])->name('store');
});

// Admin Only Routes
Route::middleware(['auth', 'admin'])->prefix('admin/emergency')->name('emergency.')->group(function () {
    Route::get('/',                 [EmergencyController::class, 'adminIndex'])->name('admin');
    Route::patch('/{emergency}/status', [EmergencyController::class, 'updateStatus'])->name('status');
});