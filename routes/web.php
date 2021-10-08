<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

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
    return view('admin.dashboard.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
});

// Route::resource('/product',App\Http\Controllers\admin\ProductController::class);
Route::resource('/category',App\Http\Controllers\admin\CategoryController::class);
Route::resource('/product',App\Http\Controllers\admin\ProductController::class);
// Route::get('category/delete', 'App\Http\Controllers\admin\CategoryController@delete');
// Route::post('category/delete', 'App\Http\Controllers\admin\CategoryController@delete')->name('delete');