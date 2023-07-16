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
        Route::get('/login', App\Http\Controllers\Pages\Auth\AuthenticationController::class)->name('login');
        Route::get('/sign-up', App\Http\Controllers\Pages\Auth\RegistrationController::class)->name('register');
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('auth.login');
    })->middleware('auth')->name('logout');
});



/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->group(function () {
    Route::get('/dashboard', App\Http\Controllers\Pages\Host\HostDashboardController::class)->name('dashboard');
    Route::get('/reservations', App\Http\Controllers\Pages\Host\HostReservationsController::class)->name('reservations');
    Route::get('/test', App\Http\Controllers\Pages\Host\HostDashboardController::class)->name('test');
});
