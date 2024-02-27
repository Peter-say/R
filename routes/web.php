<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Property\PropertyController as DashboardPropertyController;
use App\Http\Controllers\Dashboard\User\ProfileController;
use App\Http\Controllers\Dashboard\User\UpdatePasswordController;
use App\Http\Controllers\Dashboard\Users\IndexController as UsersIndexController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Web\AgentController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\PropertyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::prefix('web')->as('web.')->group(function () {
    Route::get('about', [IndexController::class, 'about'])->name('about');
    Route::get('contact', [IndexController::class, 'contact'])->name('contact');
});

Route::prefix('blog')->as('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('details', [BlogController::class, 'details'])->name('details');
});

Route::prefix('property')->as('property.')->group(function () {
    Route::get('listing', [PropertyController::class, 'listing'])->name('listing');
    Route::get('{id}/details', [PropertyController::class, 'details'])->name('details');
});

Auth::routes();
Route::prefix('dashboard')->as('dashboard.')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');

        Route::resource( 'property', DashboardPropertyController::class);
    

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::put('/{id}/update', [ProfileController::class, 'update'])->name('update');
        Route::get('change-password', [UpdatePasswordController::class, 'changePassword'])->name('change-password');
        Route::post('update-password', [UpdatePasswordController::class, 'updatePassword'])->name('update-password');
    
    });


    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('orders');

        Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlists');
    });


    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', [UsersIndexController::class, 'index']);
    });
});
Route::prefix('agent')->as('agent.')->group(function () {
    Route::get('listing', [AgentController::class, 'listing'])->name('listing');
});