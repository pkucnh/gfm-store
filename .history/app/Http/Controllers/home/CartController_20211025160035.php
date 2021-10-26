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
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
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
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $selectdistrict = District::where('city_id',$data['ma_id'])->orderby('id','ASC')->get();
                $output .= '<option>Chọn quận huyện</option>';
                foreach($selectdistrict as $key => $district){
                    // $output .= '<option value=">'.$district->id.'">'.$district->name.'</option>';
                      // Viet cach duoi cho de truyen bien
                    $output .= "<option value='$district->id'>$district->name</option>";
                }
            }else{                 
                $selectvillage = Village::where('district_id', $data['ma_id'])->orderBy('id', 'ASC')->get();
                $output .= '<option>Chọn xã phường</option>';
                foreach($selectvillage as $key => $village){
                    $output .= "<option value='$village->id'>$village->name</option>";
                }
            }
            return $output;
        }
    }

    public function CalculateFee(Request $request)
    {
        $data = $request->all();
        if($data['city_id']){
            $feeship = Feeship::where('city_id',$data['city_id'])->where('district_id',$data['district_id'])->where('village_id',$data['village_id'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship > 0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->Fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee','25000');
                    Session::save();
                }
            }

       
        }
    }

    public function DeleteFee(Request $request)
    {
        Session::forget('fee');
        return Redirect()->back();
    }

    public function ConfirmOrder(Request $request)
    {
        $data = $request->all();
        // get coupon
        // if($data['order_coupon']!='Không có mã giảm giá'){
        //     $coupon = Coupon::where('code',$data['order_coupon'])->first();
        //     $coupon->used = $coupon->used.','.Session::get('customer_id');
        //     $coupon->Amount = $coupon->amount - 1;
        //     $coupon_mail = $coupon->code;
        //     $coupon->save();
        // }
        // else{
        //     $coupon_mail = 'không có sử dụng';
        // }

        $shipping = new Shipping();
        // $name = $data['last_name'] + $data['first_name'];;
        $shipping->name = $data['name'];
        $shipping->phone = $data['phone'];
        $shipping->email = $data['email'];
        $shipping->address = $data['address'];
        $shipping->notes = $data['note'];
        // $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
  
        // $shipping_id = $shipping->id;
        // $order_code = substr(md5(microtime()),rand(0,26),5);

        // $order = new Order; 
        // $order->customer_id = Session::get('customer_id');
        // $order->customer_id = 1;
        // $order->shipping_id = $shipping_id;
        // $order->status= 0;
        // date_default_timezone_set('Asia/Ho_Chi_Minh');
        // $order->created_at= now();
        // $order->order_code = $order_code;
        // $order->save();

        // if(Session::get('cart')==true){
        //     foreach(Session::get('cart') as $key => $cart){
        //         $order_detail = new OrderDetail;

        //         $order_detail->order_code = $order_code;
        //         $order_detail->product_id = $cart['product_id'];
        //         $order_detail->product_name = $cart['product_name'];
        //         $order_detail->product_price = $cart['product_price'];
        //         $order_detail->product_quanlity = $cart['product_amount'];
        //         $order_detail->product_feeship= $data['order_feeship'];
        //         $order_detail->product_coupon = $data['order_coupon'];
        //         $order_detail->save();
        //     }
        // } 
        //Send mail confirm
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $title_mail = "Đơn hàng xác nhận ngày".''.$now;

        // $customer = User::find(Session::get('customer_id'));
        // $data['email'][] = $customer->email;

        // if(Session::get('cart')==true){
        //     foreach(Session::get('cart') as $key => $cart_mail){
        //         $cart_array[] = [
        //             'product_name' => $cart_mail['product_name'],
        //             'product_price' => $cart_mail['product_price'],
        //             'product_amount' => $cart_mail['product_amount']
        //         ];
        //     }
        // }
   
        // if(Session::get('fee')==true){
        //     $fee = Session::get('fee').'k';
        // }else{
        //     $fee = '25k';
        // }
        // $shipping_array = [
        //     'fee' =>  $fee,
        //     'customer_name' => $customer->name,
        //     'shipping_name'=> $data['name'],
        //     'shipping_phone' => $data['phone'],
        //     'shipping_email' => $data['email'],
        //     'shipping_address' =>  $data['adress'],
        //     'shipping_note' => $data['note'],
        //     'shipping_method' => $data['shipping_method']
        // ];
        // $ordercode_mail = [
        //     'coupon_code'=> $coupon_mail,
        //     'order_code' => $order_code,
        // ];

        // \Mail::send('mail.mail_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
        //     $message->to($data['email'])->subject($title_mail);
        //     $message->from($data['email'],$title_mail);
        // });

        // Session::forget('coupon');
        // Session::forget('fee');
        // Session::forget('cart');
    }

}
