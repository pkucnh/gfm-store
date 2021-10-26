<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryBlogController;

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

// Route::get('/', function () {
//     return view('home.index.index');
// });

// Route::resource('/',App\Http\Controllers\home\HomeController::class);

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
});
// Trang chủ
Route::get('/', 'App\Http\Controllers\home\HomeController@index');
// Chi tiết sản phẩm
Route::get('/product-detail/{slug}/{id}', 'App\Http\Controllers\home\HomeController@detail');
// Gửi đánh giá
Route::post('/send-comment', 'App\Http\Controllers\home\HomeController@insert_rating');
Route::post('/load-comment', 'App\Http\Controllers\home\HomeController@LoadComment');


Route::resource('/category',App\Http\Controllers\admin\CategoryController::class);
Route::resource('/product',App\Http\Controllers\admin\ProductController::class);
Route::resource('/coupon',App\Http\Controllers\admin\CouponController::class);
Route::resource('/blog',App\Http\Controllers\admin\BlogController::class);
Route::resource('/category_blog',App\Http\Controllers\admin\CategoryBlogController::class);
