@include('home.layout.header')
@include('home.aside.menu')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Giỏ hàng </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="shoping__cart__table">
                    <form action="{{url('/update-cart')}}" method="post">
                        @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp

                            @if(Session::get('cart'))
                                @foreach(Session::get('cart') as $cart)
                                    @php
                                        $subtotal = $cart['product_price'] * $cart['product_amount'];
                                        $total += $subtotal;
                                    @endphp
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('admin/images/product')}}/{{$cart['product_image']}}" class="float-left" width="100px" height="80px"alt="">
                                        <h5 style="display: block">{{$cart['product_name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    {{number_format($cart['product_price'])}} đ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" min="1"  name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_amount']}}" autocomplete="off">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{number_format($subtotal)}} đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="cart_quantity_delete" href="{{url('/delete-cart/'.$cart['session_id'])}}"> <span class="icon_close"></span></a>           
                                    </td>
                                </tr>
                                @endforeach           
                            @else
                            <!-- <tr> -->
                                <td>
                                    <p><strong> Giỏ hàng trống!</strong></p>
                                </td>
                            <!-- </tr> -->
                            @endif
                                
                            </tbody>
                        </table>
                  

                    </div>
                </div>
                <div class="col-lg-4 float-right">
                    <div class="shoping__checkout">
                        <h5>Tóm Tắt Đơn Hàng</h5>
                        
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
                        
                        <a href="{{url('check-out')}}" class="primary-btn">Thanh toán</a>
                    </div>
                  
                    <div>
                        <img src="{{asset('home/img/cart/c.png')}}" style="margin: 0 auto;" alt="">
                    </div>
                </div>
             
                
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="shoping__cart__btns">
                        <a href="{{url('/')}}" class="btn primary-btn cart-btn cart-btn-right float-left mr-2" >Tiếp tục mua sắm</a>
                        @if(Session::get('customer_id'))
                            <button type="submit" name="update_qty" class="btn primary-btn cart-btn cart-btn-right float-left"><i class="fa fa-refresh" aria-hidden="true"></i>Cập nhật giỏ hàng</button>
                        @endif
                    </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="shoping__continue">
                        @if(Session::get('id_customer'))
                            <div class="shoping__discount">

                                @php
                                    $message = Session::get('cou');
                                    $messages = Session::get('cous');
                                    if ($message) {
                                            echo '<div class="alert alert-success">'.$message.'</div>';
                                            Session::put('message',null);
                                    }   
                                    if ($messages) {
                                            echo '<div class="alert alert-danger">'.$messages.'</div>';
                                            Session::put('message',null);
                                    } 
                                @endphp

                                <h5>Mã giảm giá</h5>
                                <form action="{{url('/check-coupon')}}" method="post">
                                @csrf
                                    <input type="text" name="code" placeholder="Nhập mã giảm giá">
                                    <button type="submit" name="check_coupon" class="site-btn">Xác nhận</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
           
                
            </div>
        </div>
    </section>
@include('home.layout.footer')