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
                <h4>Chi tiết thanh toán</h4>
                <form>
                                    @csrf
                <div class="col-lg-8 col-md-6">
              
                <div class="row">
                               
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                        <p>Tỉnh / Thành Phố<span>*</span></p>
                                            <select class="choose city" name="city" id="city">
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
                                            <select class="choose district" name="district" id="district">
                                                <option value="">Chọn quyện huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                        <p>Xã / Phường<span>*</span></p>
                                            <select class="village" name="village" id="village">
                                                <option value="">Chọn xã phường</option>
                                            </select>
                                        </div>
                                    </div>
                              
                            </div>
                       
                </div>
                </form>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên<span>*</span></p>
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
                                <input type="text"
                                    placeholder="Nội dung" style="height:100px">
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
                                                            <span>{{number_format($total_coupon)}} đ</span>
                                                        </li>
                                                    </p>
                                                    @endif
                                                </li>
                                            <li>Tổng <span>{{number_format($total_coupon)}} đ</span></li>
                                        @endforeach
                                        @endif
                                    </ul>
                                <!-- <div class="checkout__order__subtotal">Tổng phụ <span>165.000 đ</span></div>
                                <div class="checkout__order__total">Tổng <span>165.000 đ</span></div> -->
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Tạo tài khoản
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
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
