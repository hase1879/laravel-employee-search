<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeetController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;


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
    return view('top');
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

// 座席
Route::get('/seets', [SeetController::class, 'index'])->name('seets.index')->middleware(['auth', 'verified']);

// 座席登録の更新
Route::get('/seets/{id}/edit', [SeetController::class, 'edit'])->name('seets.edit')->middleware(['auth', 'verified']);
Route::patch('/seets/{id}', [SeetController::class, 'update_status'])->name('seets.update_status')->middleware(['auth', 'verified']);

//座席_着席者の入れ替え deleteする為、getメソッドでデータを取得する。
Route::get('/seets/delete/{id}', [SeetController::class, 'update_chakuseki'])->name('seets.update_chakuseki');
Route::patch('/seets/delete/{id}', [SeetController::class, 'update_chakuseki'])->name('seets.update_chakuseki');

Route::get('/seets/test', [App\Http\Controllers\SeatTestController::class, 'doTestService'])->middleware(['auth', 'verified']);

Route::get('/seats/map', [App\Http\Controllers\TestMapController::class, 'showMap'])->middleware(['auth', 'verified']);

// 社員一覧ページ
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware(['auth', 'verified']);

// 社員詳細ページ
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show')->middleware(['auth', 'verified']);

// マイページ
Route::controller(UserController::class)->group(function(){
    Route::get('users/mypage', 'mypage')->name('mypage')->middleware(['auth', 'verified']);
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit')->middleware(['auth', 'verified']);
    Route::put('users/mypage', 'update')->name('mypage.update')->middleware(['auth', 'verified']);
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password')->middleware(['auth', 'verified']);
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password')->middleware(['auth', 'verified']);
});

