<?php

use Illuminate\Support\Facades\Route;

/**
 * Auth Routes
 */
Route::name('auth.')->prefix('/auth')->group(function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegistrationController::class, 'view'])->name('register');
    Route::post('/register/submit', [App\Http\Controllers\Auth\RegistrationController::class, 'submit'])->name('register.submit');
    // Route::view('/login', 'pages.auth.login')->name('login');
    // Register
    // Reset Password
});

/**
 * Frontend Routes
 */
Route::name('frontend.')->prefix('/')->group(function () {
    // Index
    // Properties
    // Reservations
});

/**
 * Guest Routes
 */
Route::name('guest.')->prefix('/portal')->group(function () {
    // Dashboard
    // Reservations
    // Messages
    // Settings
});


/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->group(function () {
    // Dashboard
    // Properties
    // Reservations
    // Guests
    // Settings

});

Route::redirect('/', 'auth/login');
