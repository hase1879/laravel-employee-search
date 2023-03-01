<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SitdownController;
use App\Http\Controllers\SeetController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 座席
Route::get('/seets', [SeetController::class, 'index'])->name('seets.index')->middleware('auth');

// 座席登録の更新
Route::get('/seets/{id}/edit', [SeetController::class, 'edit'])->name('seets.edit')->middleware('auth');
// Route::get('/seets/{id}', [SeetController::class, 'update'])->name('seets.update')->middleware('auth');
Route::patch('/seets/{id}', [SeetController::class, 'update_status'])->name('seets.update_status')->middleware('auth');


Route::get('/seets/test', [App\Http\Controllers\SeatTestController::class, 'doTestService'])->middleware('auth');


Route::get('/seats/map', [App\Http\Controllers\TestMapController::class, 'showMap'])->middleware('auth');

// js学習用
Route::get('/seets/seat-chart', function () {
    return view('seat-chart');
});
