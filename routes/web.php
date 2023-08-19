<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Utility Routes
 */
Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->type . '.dashboard');
})->middleware('auth')->name('dashboard');



/**
 * Authentication Routes
 */
Route::name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', App\Http\Controllers\Auth\AuthenticationController::class)->name('login');
        Route::get('/sign-up', App\Http\Controllers\Auth\RegistrationController::class)->name('register');
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('auth.login');
    })->middleware('auth')->name('logout');
});



/**
 * Host Routes
 */
Route::name('host.')->middleware('auth')->prefix('/host')->group(function () {
    Route::get('/dashboard', App\Http\Controllers\Host\Dashboard\DashboardController::class)->name('dashboard');
    Route::get('/settings', App\Http\Controllers\Host\Settings\SettingsController::class)->name('settings');

    // Rentals
    Route::name('rentals.')->prefix('/rentals')->group(function () {
        Route::get('/', App\Http\Controllers\Host\Rentals\HostRentalsIndexController::class)->name('index');
        Route::get('/{slug}', App\Http\Controllers\Host\Rentals\HostRentalsSingleController::class)->name('single');
    });

    // 
    Route::view('/test', 'test.blade.php')->name('test');
});

Route::view('/blank', 'blank');
