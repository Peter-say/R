<?php

use App\Http\Controllers\Web\AgentController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\PropertyController;
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

Route::prefix('agent')->as('agent.')->group(function () {
    Route::get('listing', [AgentController::class, 'listing'])->name('listing');
});