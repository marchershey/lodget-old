<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Auth Routes
 */
Route::name('auth.')->prefix('/auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', [App\Http\Controllers\Auth\RegistrationController::class, 'view'])->name('register');
        Route::post('/register/submit', [App\Http\Controllers\Auth\RegistrationController::class, 'submit'])->name('register.submit');
        Route::get('/signin', [App\Http\Controllers\Auth\AuthenticationController::class, 'view'])->name('login');
        Route::post('/signin/submit', [App\Http\Controllers\Auth\AuthenticationController::class, 'submit'])->name('login.submit');
        // Reset Password
    });
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('auth.login');
    })->name('logout')->middleware('auth');
});


/**
 * Frontend Routes
 */
Route::name('frontend.')->prefix('/')->group(function () {
    Route::view('/', 'pages.frontend.index')->name('index');
    // Properties
    // Reservations
});

/**
 * Guest Routes
 */
Route::name('guest.')->prefix('/guest')->group(function () {
    Route::view('/dashboard', 'pages.guest.dashboard')->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Pages\Guest\UserProfileController::class, 'view'])->name('profile');
    Route::post('/profile/submit-profile', [App\Http\Controllers\Pages\Guest\UserProfileController::class, 'submitProfile'])->name('profile.submit-profile');
    Route::post('/profile/submit-password', [App\Http\Controllers\Pages\Guest\UserProfileController::class, 'submitPassword'])->name('profile.submit-password');
    // Reservations
    // Messages
    // Profile
    // Notifications
});


/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->group(function () {
    // Dashboard
    Route::view('/dashboard', 'pages.host.dashboard')->name('dashboard');
    // Properties
    // Reservations
    // Guests
    // Settings

});

/**
 * Util Routes
 */

// Login & sign up redirect
Route::redirect('/login', '/auth/signin')->name('login');
Route::redirect('/signup', '/auth/register')->name('register');
// Dashboard redirect - redirects user to the correct dashboard
Route::get('/dashboard', function () {
    return redirect()->route(auth()->user()->type . '.dashboard');
})->middleware('auth')->name('dashboard');

/*******************************************************************/

// Route::get('/', function () {
//     return redirect()->route('auth.login');
// });

Route::get('/email', function () {
    return new \App\Mail\WelcomeUserMail();
});

Route::get('/test', function () {
    // return view('mail.auth.new-registration');
    Illuminate\Support\Facades\Mail::to('marclewishershey@gmail.com')->queue(new \App\Mail\WelcomeUserMail());
});
