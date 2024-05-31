<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/places/data', [DataController::class, 'places'])->name('places.data'); // DATA TABLE CONTROLLER
Route::get('/places/api', [DataController::class, 'index'])->name('places.api'); // DATA TABLE CONTROLLER

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [MapController::class, 'index'])->name('dashboard');
    Route::get('/home', [MapController::class, 'index'])->name('home');
    Route::resource('places', PlaceController::class);
    Route::get('/simulasi', [HomeController::class, 'cari'])->name('simulasi');
});