@include('home.layout.header')
@include('home.aside.menu')
 <!-- Hero Section Begin -->
 <!-- <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả doanh mục</span>
                        </div>
                        <ul>
                            <li><a href="#">Thịt heo tươi</a></li>
                            <li><a href="#">Rau quả</a></li>
                            <li><a href="#">Thịt bò</a></li>
                            <li><a href="#">Thịt gà </a></li>
                            <li><a href="#">Hải sản </a></li>
                            <li><a href="#">Bơ & Trứng</a></li>
                            <li><a href="#">Thức ăn nhanh </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Bạn muốn tìm gì?">
                                <button type="submit" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>Hỗ trợ 24/7 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục</h4>
                            <ul>
                                <li><a href="{{url('by-category')}}/all/0">Tất cả</a></li>
                                @foreach($category as $row)
                                    <li><a href="{{url('by-category')}}/{{$row->slug}}/{{$row->id}}">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Giá</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Màu sắc</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    Trắng
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Xám
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Đỏ
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Đen
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Xanh Lục
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Xanh Lá
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Kích thước</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Lớn
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Trung bình
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Vừa
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Nhỏ
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Sản phẩm mới</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($product_new as $new)
                                            <a href="{{url('product-detail')}}/{{$new->slug}}/{{$new->id}}" class="latest-product__item">
                                                <div class="latest-product__item__pic" >
                                                    <img src="{{asset('admin/images/product')}}/{{$new->image}}" style="max-width:100px; max;height:90px">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{$new->name}}</h6>
                                                    @if(!$new->price_sales)
                                                        <span>{{number_format($new->price),' '}} đ</span>
                                                    @else
                                                    <span>{{number_format($new->price_sales),' '}} đ</span>
                                                    @endif
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        @foreach($product_new as $new)
                                            <a href="{{url('product-detail')}}/{{$new->slug}}/{{$new->id}}" class="latest-product__item">
                                                <div class="latest-product__item__pic" >
                                                    <img src="{{asset('admin/images/product')}}/{{$new->image}}" style="max-width:100px; max;height:100px">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{$new->name}}</h6>
                                                    @if(!$new->price_sales)
                                                        <span>{{number_format($new->price),' '}} đ</span>
                                                    @else
                                                    <span>{{number_format($new->price_sales),' '}} đ</span>
                                                    @endif
                                                </div>
                                            </a>
                                        @endforeach
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2 style="font-size:24px">Khuyến mãi</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($product_sales as $sales)
                                    @if($sales->price_sales)
                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg"
                                                    data-setbg="{{asset('admin/images/product')}}/{{$sales->image}}" >
                                                    <div class="product__discount__percent">-Giảm</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><button><i class="fa fa-heart like-product" data-id = "{{$sales->id}}" ></i></button></li>
                                                        <li><a href="{{url('product-detail')}}/{{$sales->slug}}/{{$sales->id}}"i class="fa fa-retweet"></i></a></li>
                                                        <li><button class="add-to-cart" name="add-cart" data-id = "{{$sales->id}}"><i class="fa fa-shopping-cart"></i></button></li>
                                                    </ul>
                                                </div>
                                                
                                                <div class="product__discount__item__text">
                                                @if(!$sales->price_sales)
                                                    <form>
                                                        @csrf
                                                        <input type="hidden" value="{{$sales->id}}" class="product_id" >
                                                        <input type="hidden" value="{{$sales->id}}" class="cart_product_id_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales->name}}" class="cart_product_name_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales->image}}" class="cart_product_image_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales>price}}" class="cart_product_price_{{$sales->id}}" >
                                                        <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$sales->id}}">  
                                                    </form> 
                                                @else
                                                    <form>
                                                        @csrf
                                                        <input type="hidden" value="{{$sales->id}}" class="product_id" >
                                                        <input type="hidden" value="{{$sales->id}}" class="cart_product_id_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales->name}}" class="cart_product_name_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales->image}}" class="cart_product_image_{{$sales->id}}" >
                                                        <input type="hidden" value="{{$sales->price_sales}}" class="cart_product_price_{{$sales->id}}" >
                                                        <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$sales->id}}">  
                                      
                                                    </form> 
                                                @endif
                                                    <span>{{$sales->name_cate}}</span>
                                                    <h5><a href="{{url('product-detail')}}/{{$sales->slug}}/{{$sales->id}}">{{$sales->name}}</a></h5>
                                                    <div class="product__item__price">{{number_format($sales->price_sales),''}} đ<span>{{number_format($sales->price),''}} đ</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-2.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Rau củ </span>
                                            <h5><a href="#">Gói rau</a></h5>
                                        <div class="product__item__price">30.000 đ <span>36.000 đ</span></div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-3.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Nước trái cây</span>
                                            <h5><a href="#">Trái cây hỗn hợp</a></h5>
                                        <div class="product__item__price">30.000 đ <span>36.000 đ</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-4.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Trái cây</span>
                                            <h5><a href="#"> Xoài</a></h5>
                                        <div class="product__item__price">30.000 đ <span>36.000 đ</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-5.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Thức ăn nhanh</span>
                                            <h5><a href="#"> Humberger</a></h5>
                                        <div class="product__item__price">30.000 đ <span>36.000 đ</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/discount/pd-6.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Hoa quả </span>
                                            <h5><a href="#">Nho Mỹ</a></h5>
                                        <div class="product__item__price">30.000 đ <span>36.000 đ</span></div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp theo</span>
                                    <select>
                                        <option value="0">Giá</option>
                                        <option value="0">Từ cao - thấp</option>
                                        <option value="0">Từ thấp - cao</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Sản phẩm tìm thấy</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Thịt heo</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Chuối</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Ỏi ruột đỏ</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Nho mỹ</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-5.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Humberger</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Xoài</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Dưa hấu</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-8.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Táo</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-9.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Nho sấy</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-10.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Đùi gà </a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-11.jpg">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">Sữa cam</a></h6>
                                    <h5>30.000 đ</h5>
                                </div>
                            </div>
                        </div> -->
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"  data-setbg="{{asset('admin/images/product')}}/{{$product->image}}" >
                                    <ul class="product__item__pic__hover">
                                        <li><button><i class="fa fa-heart like-product" data-id = "{{$product->id}}" ></i></button></li>
                                        <li><a href="{{url('product-detail')}}/{{$product->slug}}/{{$product->id}}"i class="fa fa-retweet"></i></a></li>
                                        <li><button class="add-to-cart" name="add-cart" data-id = "{{$product->id}}"><i class="fa fa-shopping-cart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('product-detail')}}/{{$product->slug}}/{{$product->id}}">{{$product->name}}</a></h6>
                                    @if(!$product->price_sales)
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" class="product_id" >
                                        <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->image}}" class="cart_product_image_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->price}}" class="cart_product_price_{{$product->id}}" >
                                        <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$product->id}}">  
                                        <h5>{{number_format($product->price),''}} đ</h5>
                                    </form> 
                                @else
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" class="product_id" >
                                        <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->image}}" class="cart_product_image_{{$product->id}}" >
                                        <input type="hidden" value="{{$product->price_sales}}" class="cart_product_price_{{$product->id}}" >
                                        <!-- <div class="pro-qty"> -->
                                        <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$product->id}}">  
                                        <!-- </div> -->
                                        <h5>{{number_format($product->price_sales),''}} đ</h5>
                                    </form> 
                                @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <div class="product__pagination"> -->
                        <!-- <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a> -->
                        <div style="backgroud-color:red;">    {{ $products->links() }}</div>
                    
                    <!-- </div> -->
                   
              
                </div>  
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@include('home.layout.footer')