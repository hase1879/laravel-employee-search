<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\SeatController;

// 不要かも？
// use Illuminate\Support\Facades\Route;


// Todo:エラー解消すること
Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('seets', SeatController::class);
    $router->post('seets/import', [SeatController::class, 'csvImport']);

    // ルーティングの設定
    $router->resource('users', UserController::class);

    // CSVインポート
    $router->post('users/import', [UserController::class, 'csvImport']);

});
