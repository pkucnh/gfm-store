@include('home.layout.header')
@include('home.aside.menu')
 <!-- Checkout Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Bạn có mã giảm giá không? <a href="{{url('show-cart')}}">Nhấn vào đây</a> để nhập mã.
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Hoàn Thành Thanh Toán</h4>
                <div class="col-lg-8 col-md-6">
                    
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <div class="row" style="border: 1px solid #d7d7d7; padding: 10px; border-radius: 5px">
                                <!-- <div > -->
                                <form>
                                    @csrf
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                        <p>Tỉnh / Thành Phố<span>*</span></p>
                                            <select class="form-control choose city" name="city" id="city">
                                                <option value="">Chọn tỉnh thành phố</option>
                                                @foreach($citys as $key => $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                   
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                            <p>Quận / Huyện<span>*</span></p>
                                                <select class="form-control choose district" name="district" id="district" style="display:block;">
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                        <p>Xã / Phường<span>*</span></p>
                                            <select class="form-control village" name="village" id="village">
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                <input type="button" name="calculate_order" class="btn btn-success check_out calculate_delivery" value="Kiểm tra">
                                <!-- </div> -->
                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ<span>*</span></p>
                                        <input type="text" name="last_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="checkout__input mt-4">
                                <p>Địa chỉ cụ thể<span>*</span></p>
                                <input type="text" name="address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div> 




                            
                            <!-- <div class="row">
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Tỉnh / Thành Phố<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Quận / Huyện<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="checkout__input">
                                        <p>Xã / Phường<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ cụ thể<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div> -->
                          
                            <!-- <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                Giao hàng ở địa chỉ khác?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            <div class="checkout__input">
                                <p>Ghi chú<span>*</span></p>
                                <input type="text" placeholder="Nội dung" style="height:100px">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                               
                                @php
                                    $total = 0;
                                @endphp

                                @if(Session::get('cart'))
                                    @foreach(Session::get('cart') as $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_amount'];
                                            $total += $subtotal;
                                        @endphp

                                        <!-- {{number_format($subtotal)}} đ -->
                                    @endforeach           
                                @endif
                                
                                    <ul>
                                        <li>Giá tạm thời <span>{{number_format($total),' '}} đ</span></li>
                                        @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key =>$cou)                      
                                            <li>
                                                    @if($cou['coupon_condition']==1)
                                                    <a class="cart_quantity_delete" href="{{url('/delete-coupon/')}}"><i class="fa fa-times"></i></a>
                                                        Mã giảm giá<span> {{$cou['coupon_number']}}% / Tổng đơn hàng</span>
                                                        <p>
                                                            @php
                                                                $total_coupon = ($total*$cou['coupon_number']/100);
                                                                echo '<p><li>Giảm'.'<span>'.number_format($total_coupon).' đ</span>'.'</li></p>';
                                                            @endphp
                                                        </p>
                                                            <li>Tổng tiền sau khi giảm
                                                                @php
                                                                $total_coupon = $total- $total_coupon;  
                                                                @endphp
                                                                <span>{{ number_format($total_coupon)}} đ</span>
                                                            </li>
                                                        </p>
                                                    @elseif($cou['coupon_condition']==2)
                                                    <a class="cart_quantity_delete" href="{{url('/delete-coupon/')}}"><i class="fa fa-times"></i></a>
                                                    Mã giảm giá<span> Giảm {{number_format($cou['coupon_number'])}} đ</span> 
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'] ;
                                                        @endphp
                                                        </li>
                                                    </p>
                                                    </p>
                                                         <li>Tổng tiền sau khi giảm:
                                                <span>{{number_format($total_coupon)}} vnđ</span>
                                            </li>
                                        </p>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                            @if(Session::get('fee'))
                            <li> <a class="cart_quantity_delete" href="{{url('/delete-fee/')}}"><i class="fa fa-times"></i></a> Vận chuyển:
                                <span>{{number_format(Session::get('fee'))}} vnđ</span>
                                @php $total_after_fee = $total + Session::get('fee'); @endphp
                            </li>
                        @endif
                        <hr>
                        </p>
                        @if(Session('cart'))
                        <li>Tổng giỏ hàng:
                            <span>
                            @php
                                if(Session::get('fee') && !Session::get('coupon')){
                                    $total_after = $total_after_fee;
                                    echo  number_format($total_after);
                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                    $total_after =  $total_coupon;
                                    echo  number_format($total_after);
                                }elseif(Session::get('fee') && Session::get('coupon')){
                                    $total_after =  $total_coupon;
                                    $total_after =  $total_coupon + Session::get('fee');
                                    echo  number_format($total_after);
                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                    $total_after =  $total;
                                    echo  number_format($total_after);
                                }
                            @endphp
                            vnđ</span>
                        </li>
                        @endif
                    </p>
                        {{-- <li>Tiền sau khi giảm:<span>{{$total}}</span></li> --}}
                    </ul>
                                <!-- <div class="checkout__order__subtotal">Tổng phụ <span>165.000 đ</span></div>
                                <div class="checkout__order__total">Tổng <span>165.000 đ</span></div> -->
                               
                                <!-- <p>text</p> -->
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                       Kiểm tra thanh toán
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@include('home.layout.footer')
