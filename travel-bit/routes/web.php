<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeasonController as S;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\HotelController as H;
use App\Http\Controllers\HomeController as HM;
use App\Http\Controllers\BookingController as B;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::get('/', [HM::class, 'homeList'])->name('home')->middleware('gate:home');
Route::put('/book/{hotel}', [HM::class, 'book'])->name('book')->middleware('gate:users');

Route::prefix('season')->name('s_')->group(function () {
    Route::get('/', [S::class, 'index'])->name('index')->middleware('gate:users');
    Route::get('/create', [S::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [S::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{season}', [S::class, 'show'])->name('show')->middleware('gate:users');
    Route::delete('/delete/{season}', [S::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{season}', [S::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{season}', [S::class, 'update'])->name('update')->middleware('gate:admin');
    Route::delete('/delete_countries/{season}', [S::class, 'destroyAll'])->name('delete_countries')->middleware('gate:admin');
});

Route::prefix('country')->name('c_')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('gate:users');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{country}', [C::class, 'show'])->name('show')->middleware('gate:users');
    Route::delete('/delete/{country}', [C::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{country}', [C::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{country}', [C::class, 'update'])->name('update')->middleware('gate:admin');
    Route::delete('/delete_hotels/{country}', [C::class, 'destroyAll'])->name('delete_hotels')->middleware('gate:admin');
});
Route::prefix('hotel')->name('h_')->group(function () {
    Route::get('/', [H::class, 'index'])->name('index')->middleware('gate:users');
    Route::get('/create', [H::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [H::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{hotel}', [H::class, 'show'])->name('show')->middleware('gate:users');
    Route::delete('/delete/{hotel}', [H::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{hotel}', [H::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{hotel}', [H::class, 'update'])->name('update')->middleware('gate:admin');
});
Route::prefix('booking')->name('b_')->group(function () {
    Route::get('/', [B::class, 'index'])->name('index')->middleware('gate:users');
    Route::put('/{booking}', [B::class, 'update'])->name('edit')->middleware('gate:admin');
});
