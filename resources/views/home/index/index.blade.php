@include('home.layout.header')
@include('home.aside.menu')
@include('home.aside.slide')
    <section class="categories mt-5">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($category as $row)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('admin/images/category')}}/{{$row->image}}"></div>
                        <h5 class="cate-name"><a href="#">{{$row->name}}</a></h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="section-title">
                        <h2>SẢN PHẨM</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            @foreach($category as $cate)
                            <li data-filter=".{{$cate->slug}}">{{$cate->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->slug_cate}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('admin/images/product')}}/{{$product->image}}">
                            <ul class="featured__item__pic__hover">
                                <li><button><i class="fa fa-heart like-product" data-id = "{{$product->id}}" ></i></button></li>
                                <li><a href="{{url('chi-tiet-san-pham')}}/{{$product->id}}/{{$product->slug}}"i class="fa fa-retweet"></i></a></li>
                                <li><button class="add-to-cart" name="add-cart" data-id = "{{$product->id}}"><i class="fa fa-shopping-cart"></i></button></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
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
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Parallax Background 1 Begin -->
    <div id="parallax-image">
        <div class="row h-100">
            <div class="col-md-12 align-self-center">
                <h1 class="text-center"><strong>Chào Mừng Đến Với Cửa Hàng</strong> </h1>
            </div>
        </div>
    </div>
    <!-- Parallax Background 1 End -->

    <section class="banner-container" style="padding: 3rem 18%;">
        <div class="banner">
            <img src="{{asset('home/img/banner/banner-11.jpg')}}" alt="">
            <div class="content">
                <span>Sản phẩm giảm giá</span>
                <h3>Đến 50% </h3>
                <a href="#" class="btn">Cửa hàng</a>
            </div>
        </div>

        <div class="banner">
            <img src="{{asset('home/img/banner/banner-33.jpg')}}" alt="">
            <div class="content">
                <span>Bài viết</span>
                <h3>Xem ngày</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>
    </section>
    <!-- Parallax Background 2 Begin -->
    <div id="parallax-image2">
        <div class="row h-100">
            <div class="col-md-12 align-self-center">
                <h1 class="text-center"><strong>Thực Phẩm Tươi</strong></h1>
            </div>
        </div>
    </div>
    <!-- Parallax Background 2 End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4> Sản Phẩm Yêu Thích</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_like as $like)
                                <a href="{{url('chi-tiet-san-pham')}}/{{$like->id}}/{{$like->slug}}"" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$like->image}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$like->name}}</h6>
                                       
                                        @if(!$like->price_sales)
                                            <span>{{number_format($like->price),' '}} đ</span>
                                        @else
                                           <span>{{number_format($like->price_sales),' '}} đ</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_like as $like)
                                <a href="{{url('chi-tiet-san-pham')}}/{{$like->id}}/{{$like->slug}}"" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$like->image}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$like->name}}</h6>                                       
                                        @if(!$like->price_sales)
                                            <span>{{number_format($like->price),' '}} đ</span>
                                        @else
                                           <span>{{number_format($like->price_sales),' '}} đ</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4> Sản Phẩm Mới Nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_new as $new)
                                <a href="{{url('chi-tiet-san-pham')}}/{{$new->id}}/{{$new->slug}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$new->image}}" alt="">
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
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$new->image}}" alt="">
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4> Sản Phẩm Xem Nhiều</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_view as $view)
                                <a href="{{url('chi-tiet-san-pham')}}/{{$view->id}}/{{$view->slug}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$view->image}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$view->name}}</h6>

                                        @if(!$view->price_sales)
                                            <span>{{number_format($view->price),' '}} đ</span>
                                        @else
                                           <span>{{number_format($view->price_sales),' '}} đ</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($product_view as $view)
                                <a href="{{url('chi-tiet-san-pham')}}/{{$view->id}}/{{$view->slug}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('admin/images/product')}}/{{$view->image}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$view->name}}</h6>

                                        @if(!$view->price_sales)
                                            <span>{{number_format($view->price),' '}} đ</span>
                                        @else
                                           <span>{{number_format($view->price_sales),' '}} đ</span>
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
    </section>
    <!-- Latest Product Section End -->

    <!-- Parallax Background 2 Begin -->
    <div id="parallax-image3">
        <div class="row h-100">
            <div class="col-md-12 align-self-center">
                <h1 class="text-center"><strong>Chia Sẻ Các Mẹo Nấu Ăn</strong> </h1>
            </div>
        </div>
    </div>
    <!-- Parallax Background 2 End -->
    <!-- Blog Section Begin -->
@include('home.aside.blog')
@include('home.layout.footer')