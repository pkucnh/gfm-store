<form>
                                    @csrf
                                    <input type="hidden" value="{{$row->id}}" class="cart_product_id_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->Name}}" class="cart_product_name_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->img}}" class="cart_product_image_{{$row->id}}" >
                                    <input type="hidden" value="{{$row->Price}}" class="cart_product_price_{{$row->id}}" >
                                    <input type="hidden" value="1" class="cart_product_amount_{{$row->id}}" >
                                    <img src="{{asset('product/images')}}/{{$row->img}}" alt="" />
                                    <a href="{{url('detail-product')}}/{{$row->Slug}}/{{$row->id}}">{{$row->Name}}</a>
                                    <h6>{{number_format($row->Price),' '}} vnđ</h6><br>

                                    {{-- @if (Session('customer_id'))
                                    <button type="button" class="btn btn-default add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    @else
                                    <a href="{{url('dang-nhap')}}" class="btn-default add-to-cart buttoncart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    @endif --}}
                                  
                                </form> 

                                <a >
                                                        <button type="button" class=" add-to-cart" name="add-cart" data-id = "{{$row->id}}"><i class="fa fa-shopping-cart"></i></button>
                                                    </a>


                                                    $output .= "<option value='$district->ID'>$district->Name</option>";


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
