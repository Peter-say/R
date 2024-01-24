<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\User\ProfileController;
use App\Http\Controllers\Dashboard\Users\IndexController as UsersIndexController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\PropertyController;
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

Route::get('/', [IndexController::class, 'index']);
Route::prefix('property')->as('property.')->group(function () {
    Route::get('listing', [PropertyController::class, 'listing'])->name('listing');
    Route::get('{id}/details', [PropertyController::class, 'details'])->name('details');
});

Auth::routes();
Route::prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
    });

    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', [UsersIndexController::class, 'index']);
    });
});
