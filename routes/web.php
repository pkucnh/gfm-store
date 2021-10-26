<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
<<<<<<< HEAD
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryBlogController;
=======
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3

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
<<<<<<< HEAD
=======
Route::get('/test', function () {
    return view('welcome');
});
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
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
<<<<<<< HEAD
Route::resource('/blog',App\Http\Controllers\admin\BlogController::class);
Route::resource('/category_blog',App\Http\Controllers\admin\CategoryBlogController::class);
=======

Route::get('/login', function () {
    return view('home.page.login');
});
Route::get('/by-product', 'App\Http\Controllers\home\HomeController@ByProduct');

    // ADD-CART
    Route::post('/add-cart','App\Http\Controllers\home\CartController@AddCart');
    // DELETE-CART
    Route::match(['get','post'],'/delete-cart/{session_id}',[
        'as'=> 'cart.delete',  
        'uses'=> 'App\Http\Controllers\home\CartController@DeleteCart'
    ]);         
    // UPDATE-CART
    Route::match(['get','post'],'/update-cart',[
        'as'=> 'cart.update',  
        'uses'=> 'App\Http\Controllers\home\CartController@UpdateCart'
    ]);     
    // SHOW-CART
    Route::match(['get','post'],'/cart',[
        'as'=> 'cart.add',  
        'uses'=> 'App\Http\Controllers\home\CartController@ShowCart'
    ]);    

    Route::get('/show-cart', 'App\Http\Controllers\home\CartController@ShowCart');
    //check_coupon
    Route::post('/check-coupon', 'App\Http\Controllers\home\CartController@CheckCoupon');
    // delate coupon code
    Route::post('/delete-coupon', 'App\Http\Controllers\home\CartController@DeleteCoupon');
    Route::get('/delete-coupon', 'App\Http\Controllers\home\CartController@DeleteCoupon');

    // kiểm tra thanh toán
    Route::get('/check-out', 'App\Http\Controllers\home\CartController@CheckOut');

    // phi ship
    Route::post('/select-delivery-home', 'App\Http\Controllers\home\CartController@SelectDeliveryHome');
    Route::get('/select-delivery-home', 'App\Http\Controllers\home\CartController@SelectDeliveryHome');

    // check ship
    Route::post('/calculate-fee', 'App\Http\Controllers\home\CartController@CalculateFee');
    // xóa shipping
    Route::post('/delete-fee', 'App\Http\Controllers\home\CartController@DeleteFee');
    Route::get('/delete-fee', 'App\Http\Controllers\home\CartController@DeleteFee');
    // thanh then 
    Route::post('/confirm-order', 'App\Http\Controllers\home\CartController@ConfirmOrder');
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
