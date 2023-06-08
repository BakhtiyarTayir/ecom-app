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
    Route::get('/', [App\Http\Controllers\Admin\IndexController::class, '__invoke'])->name('admin.index');
    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function(){
        Route::get('/', [App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
    });
    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CreateController::class, '__invoke'])->name('admin.category.create');
    });
});
