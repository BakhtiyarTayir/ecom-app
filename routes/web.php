<?php

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



Auth::routes();

Route::group(['namespace'=> 'Main'], function(){
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, '__invoke']);

});

Route::group(['namespace'=> 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, '__invoke']);
    });
});
