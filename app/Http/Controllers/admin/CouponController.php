<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
<<<<<<< HEAD
use App\Models\Coupons;
=======
use App\Models\Coupon;
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
use App\Models\Product;
use Toastr;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $coupon = Coupons::all();
=======
        $coupon = Coupon::all();
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3

        $data = [
        'coupon' => $coupon,
        ];
        return view('admin.coupon.show',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Nhận các dự liệu từ form 
        $data = $request->all();
        // Khởi tạo 1 đối tượng mới và thêm dữ liệu vào
<<<<<<< HEAD
        $Coupon = new Coupons();
=======
        $Coupon = new Coupon();
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
        $Coupon->coupon_code = $data['code'];
        $Coupon->coupon_name = $data['name'];
        $Coupon->coupon_condition = $data['condition'];
        $Coupon->coupon_value = $data['value']; 
        $Coupon->coupon_quanlity = $data['quanlity']; 
        $Coupon->coupon_status = $data['status']; 
        $Coupon->date_start = $data['date_start']; 
        $Coupon->date_end = $data['date_end']; 
        // Lưu lên serve
        $Coupon->save();
        // Hiện thông báo khi thành công
        Toastr::success('Thêm danh mục thành công', 'Thành công');
        // quay về  trang chính
        return Redirect::to("coupon");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.coupon.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $Coupon = Coupons::find($id);
=======
        $Coupon = Coupon::find($id);
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
        $data = [
        'coupon' => $Coupon,
        ];
        return view('admin.coupon.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
<<<<<<< HEAD
        $Coupon = Coupons::find($id);
=======
        $Coupon = Coupon::find($id);
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
        $image = $request->file('img');

        if(!$image){
        $imagename = $Coupon->image;
        }else{
        $imagename = $image->getClientOriginalName(); 
        $storedPath = $image->move('admin/images/Coupon', $image->getClientOriginalName());
        }

        $Coupon->image = $imagename; 
        $Coupon->name = $data['name']; 
        $Coupon->slug = Str::slug($data['name'],"-");
        $Coupon->status = $data['status']; 

        $Coupon->save();
        Toastr::success('Cập nhật danh mục thành công', 'Thành công');
        return Redirect::to("coupon");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = $request->all();
        if(isset($_POST['checkbox'])){
            foreach($_POST['checkbox'] as $id){
<<<<<<< HEAD
                $Coupon = Coupons::find($id);
=======
                $Coupon = Coupon::find($id);
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
                $Coupon->delete();
            }
            Toastr::success('Xóa danh mục thành công', 'Thành công');
            return Redirect::to("coupon"); 
        }else{
            Toastr::error('Chọn ít nhất 1 danh mục để xóa', 'Thất bại');
            return Redirect::to("coupon"); ;;
        }
    }
}
