<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SitdownController;
use App\Http\Controllers\SeetController;
use App\Http\Controllers\TestEmployeeCsvController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TestPagenationController;
use App\Http\Controllers\TestGitHubController;

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
Route::get('/seets', [SeetController::class, 'index'])->name('seets.index')/*->middleware('auth')*/;

// 座席登録の更新
Route::get('/seets/{id}/edit', [SeetController::class, 'edit'])->name('seets.edit')/*->middleware('auth')*/;
// Route::get('/seets/{id}', [SeetController::class, 'update'])->name('seets.update')->middleware('auth');
Route::patch('/seets/{id}', [SeetController::class, 'update_status'])->name('seets.update_status')/*->middleware('auth')*/;

//座席_着席者の入れ替え deleteする為、getメソッドでデータを取得する。
Route::get('/seets/delete/{id}', [SeetController::class, 'update_chakuseki'])->name('seets.update_chakuseki');
Route::patch('/seets/delete/{id}', [SeetController::class, 'update_chakuseki'])->name('seets.update_chakuseki');

Route::get('/seets/test', [App\Http\Controllers\SeatTestController::class, 'doTestService'])/*->middleware('auth')*/;


Route::get('/seats/map', [App\Http\Controllers\TestMapController::class, 'showMap'])/*->middleware('auth')*/;

// js学習用
Route::get('/seets/seat-chart', function () {
    return view('seat-chart');
});

// 【テスト】EmpoyeeDataListの作成
Route::get('/seets/employee', [TestEmployeeCsvController::class, 'testEmployeeDataList'])/*->middleware('auth')*/;
// 【テスト】test-pagenation
Route::get('/pagenation', [TestPagenationController::class, 'testPagenation'])/*->middleware('auth')*/;

// 社員一覧ページ
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')/*->middleware('auth')*/;

// 社員詳細ページ
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show')/*->middleware('auth')*/;

// sidebar学習用
Route::get('/sidebar', function () {
    return view('test-sidebar');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/testtest', function () {
    return view('testtest');
});
