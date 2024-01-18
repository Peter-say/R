<?php

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
Route::prefix('property')->as('property.')->group(function () {
    Route::get('listing', [PropertyController::class, 'listing'])->name('listing');
    Route::get('details', [PropertyController::class, 'details'])->name('details');
});
