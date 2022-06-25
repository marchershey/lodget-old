<?php

use Illuminate\Support\Facades\Route;

/**
 * Auth Routes
 */
Route::name('auth.')->prefix('/auth')->group(function () {
    // Login
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

Route::get('/', function () {
    return view('welcome');
});
