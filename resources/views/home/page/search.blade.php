@include('home.layout.header')
@include('home.aside.menu')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Tìm kiếm sản phẩm</span>
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
                                <li><a href="{{url('tat-ca-san-pham')}}">Tất cả</a></li>
                                @foreach($category as $row)
                                    <li><a href="{{url('loai-san-pham')}}/{{$row->id}}/{{$row->slug}}">{{$row->name}}</a></li>
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
                                            <a href="{{url('chi-tiet-san-pham')}}/{{$new->id}}/{{$new->slug}}" class="latest-product__item">
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
                                            <a href="{{url('chi-tiet-san-pham')}}/{{$new->id}}/{{$new->slug}}" class="latest-product__item">
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
                    <div class="filter__item">
                        <div class="section-title product__discount__title">
                            <h2 style="font-size:24px">Tìm kiếm sản phẩm</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="filter__found" style="text-align: left">
                                    <h6>Tìm thấy <span>{{count($products)}}</span>sản phẩm với từ khóa <span>{{$tukhoa}}</span></h6>
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
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"  data-setbg="{{asset('admin/images/product')}}/{{$product->image}}" >
                                    <ul class="product__item__pic__hover">
                                        <li><button><i class="fa fa-heart like-product" data-id = "{{$product->id}}" ></i></button></li>
                                        <li><a href="{{url('chi-tiet-san-pham')}}/{{$product->id}}/{{$product->slug}}"i class="fa fa-retweet"></i></a></li>
                                        <li><button class="add-to-cart" name="add-cart" data-id = "{{$product->id}}"><i class="fa fa-shopping-cart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('chi-tiet-san-pham')}}/{{$product->id}}/{{$product->slug}}">{{$product->name}}</a></h6>
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
                    <div style="backgroud-color:red;">{{ $products->links() }}</div>
                </div>  
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@include('home.layout.footer')