<?php

use App\Mail\EmailVerificationMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/**
 * Authentication Routes
 */
Route::get('/auth', App\Http\Controllers\Pages\Auth\AuthenticationController::class)->name('auth')->middleware('guest');
Route::get('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect()->route('auth');
})->name('logout')->middleware('auth');

/**
 * Frontend Routes
 */
Route::get('/', function () {
    return 'frontend';
})->name('frontend.index');

/**
 * Dashboard Routes
 */
Route::redirect('/dashboard', '/host')->name('dashboard');


/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->middleware('auth')->group(function () {
    // Redirect /host to /host/dashboard
    Route::redirect('/', '/host/dashboard');

    // Host setup routes
    Route::name('setup.')->prefix('/setup')->group(function () {
        Route::get('/property', App\Http\Controllers\Pages\Host\Setup\HostSetupPropertyController::class)->name('property');
    });

    // Host routes that require active property selected
    Route::middleware('property')->group(function () {
        Route::get('/dashboard', App\Http\Controllers\Pages\Host\HostDashboardController::class)->name('dashboard');
    });
});
