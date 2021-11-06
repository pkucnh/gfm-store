
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\home\CartController;

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryBlogController;
use App\Http\Controllers\admin\childCateController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\CommentController;


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

// /*===========================================PHẦN QUẢN TRỊ DASHBOARD===================================================*/

// /*--------------------Chức năng đăng nhập--------------------*/
Route::group(['prefix'=>'admin','middleware'=>'CheckLogedIn'],function(){
    Route::get('/login',[AuthController::class, 'index']);
    Route::post('/login',[AuthController::class,'login']);
});

/*--------------------Chức năng thoát--------------------*/
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['prefix'=>'admin','middleware'=>['CheckLogedOut','role:Admin|Writer|Editer|Publisher']], function(){
    /*--------------------Trang chủ quản trị--------------------*/
    Route::get('home', function () {
        return view('admin.dashboard.dashboard');
    }); 

    /*--------------------Quản lý nhân viên--------------------*/
    Route::resource('/members',MemberController::class);
    
    /*--------------------Quản lý vai trò--------------------*/
    Route::get('role/{id}', [RoleController::class, 'getRole'])->middleware('permission:cap vai tro');
    Route::post('role/{id}', [RoleController::class, 'postRole'])->middleware('permission:cap vai tro');
    Route::post('create-role/', [RoleController::class, 'createRole'])->middleware('permission:cap vai tro');
    
    /*--------------------Quản lý quyền--------------------*/
    Route::get('permission/{id}', [RoleController::class, 'getPermission'])->middleware('permission:cap quyen');
    Route::post('permission/{id}', [RoleController::class, 'postPermission'])->middleware('permission:cap quyen');
    Route::post('create-permission/', [RoleController::class, 'createPermission'])->middleware('permission:cap quyen');

    /*--------------------Quản lý danh mục--------------------*/
    Route::resource('/category',App\Http\Controllers\admin\CategoryController::class);
    // Route::get('category/delete', 'App\Http\Controllers\admin\CategoryController@delete');
    // Route::post('category/delete', 'App\Http\Controllers\admin\CategoryController@delete')->name('delete');

    /*--------------------Quản lý danh mục con--------------------*/
    Route::resource('/child-category',App\Http\Controllers\admin\childCateController::class);
    Route::post('/select-category', [childCateController::class, 'select_category']);

    /*--------------------Quản lý sản phẩm--------------------*/
    Route::resource('/product',App\Http\Controllers\admin\ProductController::class);

    /*--------------------Quản lý mã giảm giá--------------------*/
    Route::resource('/coupon',App\Http\Controllers\admin\CouponController::class);

    /*--------------------Quản lý danh mục bài viết--------------------*/
    Route::resource('/category_blog',App\Http\Controllers\admin\CategoryBlogController::class);

    /*--------------------Quản lý bài viết--------------------*/
    Route::resource('/blog',App\Http\Controllers\admin\BlogController::class);

    /*--------------------Quản lý bình luận--------------------*/
    Route::get('comment', [CommentController::class, 'getComment']);
    Route::get('comment/{id}/detail', [CommentController::class, 'detailComment']);
    Route::post('comment/delete', [CommentController::class, 'delComment']);

});
/*===========================================KẾT THÚC PHẦN QUẢN TRỊ DASHBOARD============================================*/
/*=======================================================================================================================*/
/*=======================================================================================================================*/

/*==================================================PHẦN NGƯỜI DÙNG======================================================*/
// Trang chủ
Route::get('/', 'App\Http\Controllers\home\HomeController@index');
// Chi tiết sản phẩm
Route::get('/product-detail/{slug}/{id}', 'App\Http\Controllers\home\HomeController@detail');
// Gửi đánh giá
Route::post('/send-comment', 'App\Http\Controllers\home\HomeController@insert_rating');
Route::post('/load-comment', 'App\Http\Controllers\home\HomeController@LoadComment');

Route::get('/by-category/{slug}/{id}', 'App\Http\Controllers\home\HomeController@ByCategory');

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

// dang nhập khách hàng
Route::get('/login', 'App\Http\Controllers\home\LoginController@LoginUser')->middleware('checkLogin');
Route::get('/logout', 'App\Http\Controllers\home\LoginController@LogoutUser');

Route::post('/register', 'App\Http\Controllers\home\LoginController@register');

Route::post('/check-login-user', 'App\Http\Controllers\home\LoginController@CheckLoginUser');

// THích sản phẩm
Route::post('/like-product', 'App\Http\Controllers\home\HomeController@LikeProduct');
// lấy lại mật khẩu
Route::get('/forgot-password', 'App\Http\Controllers\home\LoginController@ForgotPassword');
// liên he
Route::get('/contact', 'App\Http\Controllers\home\HomeController@Contact');
// blog
Route::get('/blogs/{slug}/{id}', 'App\Http\Controllers\home\BlogController@Blogs');

Route::get('/blog-detail/{slug}/{id}', 'App\Http\Controllers\home\BlogController@BlogDetail');

/*===============================================KẾT THÚC PHẦN NGƯỜI DÙNG================================================*/
/*=======================================================================================================================*/
/*=======================================================================================================================*/