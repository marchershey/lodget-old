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
Route::name('dashboard')->middleware('auth')->get('/dashboard', [App\Http\Controllers\DashboardController::class, 'redirect']);

/**
 * Admin Routes
 */
Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Redirect /admin to /admin/dashboard
    Route::redirect('/', '/admin/dashboard');

    // Admin dashboard routes
    Route::get('/dashboard', App\Http\Controllers\Pages\Admin\AdminDashboardController::class)->name('dashboard');
    Route::get('/users', App\Http\Controllers\Pages\Admin\AdminUsersController::class)->name('users');
    Route::get('/settings', App\Http\Controllers\Pages\Admin\AdminSettingsController::class)->name('settings');
});

/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->middleware('auth')->group(function () {
    // Redirect /host to /host/dashboard
    Route::redirect('/', '/host/dashboard');

    // Host setup routes
    Route::name('setup.')->prefix('/setup')->group(function () {
        Route::get('/property', App\Http\Controllers\Pages\Host\Properties\AddProperty::class)->name('property');
    });

    // Host routes after setup
    Route::middleware('host.setup')->group(function () {
        // Host dashboard
        Route::get('/dashboard', App\Http\Controllers\Pages\Host\HostDashboardController::class)->name('dashboard');

        // Host properties
        Route::get('/properties/add', App\Http\Controllers\Pages\Host\Properties\AddProperty::class)->name('property');
    });
});
