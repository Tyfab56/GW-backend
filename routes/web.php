<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LanguageController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
});
// Routes pour la gestion des langues
Route::middleware(['auth'])->group(function () {
    Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
    Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('/languages/{language}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::put('/languages/{language}', [LanguageController::class, 'update'])->name('languages.update');
    Route::delete('/languages/{language}', [LanguageController::class, 'destroy'])->name('languages.destroy');
});
