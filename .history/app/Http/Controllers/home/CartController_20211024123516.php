<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Gallrey;
use App\Models\Rating;
use App\Models\City;
use App\Models\District;
use App\Models\Village;
use Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddCart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id']){
                    $is_avaiable++;
                    $cart[$key] = [
                    'session_id' => $val['session_id'],
                    'product_name' => $val['product_name'],
                    'product_id' => $val['product_id'],
                    'product_image' => $val['product_image'],
                    'product_price' => $val['product_price'],
                    'product_amount' => $val['product_amount']+ $data['cart_product_amount'],
                    ];
                    Session::put('cart',$cart);
                }
            }
            if($is_avaiable == 0){
                $cart[] = [
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'], 
                    'product_name' => $data['cart_product_name'], 
                    'product_image' => $data['cart_product_image'], 
                    'product_price' => $data['cart_product_price'], 
                    'product_amount' => $data['cart_product_amount'], 
                ];
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'], 
                'product_name' => $data['cart_product_name'], 
                'product_image' => $data['cart_product_image'], 
                'product_price' => $data['cart_product_price'], 
                'product_amount' => $data['cart_product_amount'], 
            ];
            Session::put('cart',$cart);
        }
        Session::save();
    }

    public function UpdateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                       $cart[$session]['product_amount'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật giỏ hàng thành công' );
        }
    }

    public function DeleteCart($session_id)
    {
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
        }
        return redirect()->back()->with('mass','Xóa giỏ hàng thành công' );
    }

    public function ShowCart(){

        $category = Category::where('status','=',1)->get();
        $data = [
            'category' => $category,
        ];
        return view('home.page.show_cart',$data);
    }

    public function CheckCoupon(Request $request)
    {
        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        // if(Session('customer_id')){
        //     $coupon = Voucher::where('coupon_code',$data['coupon'])->where('couppn_status',0)->where('date_end','>',$today)->where('amount','>',0)->where('used','LIKE','%'.Session::get('customer_id').'%')->first();
        //         if($coupon){
        //             return redirect()->back()->with('cous','Mã giảm giá đã được sử dụng hoặc hết hạn');
        //         }else{
        //             $coupon_login = Voucher::where('code',$data['coupon'])->where('amount','>',0)->where('status',1)->where('date_end','>=',$today)->first();
        //             if($coupon_login){
        //                 $count_coupon = $coupon_login->count();
        //                 if($count_coupon>0){
        //                     $coupon_session = Session::get('coupon');
        //                     if($coupon_session==true){
        //                         $id_avaiable = 0;
        //                         if($id_avaiable==0){
        //                             $cou[] = [
        //                                 'coupon_code' => $coupon_login->code,
        //                                 'coupon_number' => $coupon_login->number,
        //                                 'coupon_condition' => $coupon_login->conditions,
        //                             ];
        //                             Session::put('coupon',$cou);    
        //                         }
        //                     }else{
        //                         $cou[] = [
        //                             'coupon_code' => $coupon_login->code,
        //                             'coupon_number' => $coupon_login->number,
        //                             'coupon_condition' => $coupon_login->conditions,
        //                         ];
        //                         Session::put('coupon',$cou);
        //                     }
        //                     Session::save();
        //                     return Redirect()->back()->with('cou','Áp dụng mã giảm giá thành công');
        //                 }
        //             }else{
        //                 return Redirect()->back()->with('cous','Mã giảm giá đã được sử dụng hoặc hết hạn');
        //             }
        //         }
            
        // }else{
                // chưa đăng nhâp
            $coupon = Coupon::where('coupon_code',$data['code'])->where('coupon_status',1)->where('date_end','>',$today)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $id_avaiable = 0;
                        if($id_avaiable==0){
                            $cou[] = [
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_number' => $coupon->coupon_value,
                                'coupon_condition' => $coupon->coupon_condition,
                            ];
                            Session::put('coupon',$cou);    
                        }
                    }else{
                        $cou[] = [
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_number' => $coupon->coupon_value,
                            'coupon_condition' => $coupon->coupon_condition,
                        ];
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return Redirect()->back()->with('cou','Áp dụng mã giảm thành công');
                }
            }else{
                return Redirect()->back()->with('cous','Mã giảm giá không hợp lệ');
            }
        // }

    }

      //Delete Coupon
    public function DeleteCoupon(Request $request)
    {
        Session::forget('coupon');
        return Redirect()->back();
    }

    public function CheckOut(Request $request){
        $citys = City::orderby('id','ASC')->get();
        $category = Category::where('status','=',1)->get();
        $data = [
            'category' => $category,
            'citys' => $citys,

        ];
        return view('home.page.checkout',$data);
    }

    public function SelectDeliveryHome(Request $request)
    {
        $data = $request->all();
        // if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $selectdistrict = District::where('city_id',$data['ma_id'])->orderby('id','ASC')->get();
                $output .= '<option>--- District ---</option>';
                foreach($selectdistrict as $key => $district){
                    $output .= "<option value='$district->id'>$district->name</option>";
                }
            }else{                 
                $selectvillage = Village::where('district_id', $data['ma_id'])->orderBy('id', 'ASC')->get();
                $output .= '<option>--- Village ---</option>';
                foreach($selectvillage as $key => $village){
                    $output .= "<option value='$village->id'>$village->name</option>";
                }
            }
            return $output;
        // }
    }

    
}
