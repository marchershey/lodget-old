<?php

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

Route::name('auth.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Pages\Auth\AuthenticationController::class, 'view'])->name('login');
    Route::get('/sign-up', [App\Http\Controllers\Pages\Auth\RegistrationController::class, 'view'])->name('register');
});


Route::middleware('auth')->group(function () {
    Route::view('/', 'pages.frontend.frontend-index');
});
