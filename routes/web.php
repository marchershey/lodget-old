<?php

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    Route::get('/', [App\Http\Controllers\Pages\Frontend\Index::class, 'view'])->name('index');
    Route::get('/property/{property:slug}', [App\Http\Controllers\Pages\Frontend\PropertyController::class, 'view'])->name('property');
    Route::get('/checkout/{reservation:slug}', [App\Http\Controllers\Pages\Frontend\CheckoutController::class, 'view'])->middleware('auth')->name('checkout');
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
    // Route::view('/dashboard/reservation/{reservation:slug}', 'pages.guest.reservation')->name('reservation');
    Route::get('/dashboard/reservation/{reservation:slug}', [App\Http\Controllers\Pages\Guest\ReservationController::class, 'view'])->name('reservation');
    // Messages
    // Profile
    // Notifications
});


/**
 * Host Routes
 */
Route::name('host.')->prefix('/host')->middleware('auth')->group(function () {
    Route::view('/dashboard', 'pages.host.dashboard')->name('dashboard');
    Route::get('/properties', [App\Http\Controllers\Pages\Host\Properties::class, 'view'])->name('properties');
    Route::get('/properties/{property:slug}', [App\Http\Controllers\Pages\Host\Properties::class, 'edit'])->name('properties.edit');
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

Route::get('/teest', function () {
    \Stripe\Stripe::setApiKey('sk_test_7HbatSavw1SIlWBE7N4tuq3900J1akEjfG');

    return \Stripe\PaymentIntent::create([
        'amount' => 1099,
        'currency' => 'usd',
        'payment_method_types' => ['card'],
        'capture_method' => 'manual',
    ]);
});

Route::get('/test', function () {
    $reservation = new Reservation();
    $reservation->slug = \App\Helpers\ReservationSlugHelper::generate();
    $reservation->property_id = 1;
    $reservation->checkin = '2022-07-28';
    $reservation->checkout = '2022-07-30';
    $reservation->guests = 2;
    $reservation->save();
    return $reservation;
});
