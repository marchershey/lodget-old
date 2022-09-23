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
Route::name('host.')->prefix('/host')->middleware('auth')->group(function () {
    Route::redirect('/', '/host/dashboard');
    Route::get('/dashboard', App\Http\Controllers\Pages\Host\HostDashboardController::class)->name('dashboard');
});
