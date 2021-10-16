@include('home.layout.header')
@include('home.aside.menu')
<!-- Product Details Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Gói rau củ</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <a href="./index.html">Rau củ</a>
                            <span>Gói rau củ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="product-details spad">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('admin/images/product')}}/{{$product->image}}" width="300px" height="500px">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($gallerys as $gallery)
                            <img data-imgbigurl="{{asset('admin/images/product')}}/{{$gallery->name}}" src="{{asset('admin/images/product')}}/{{$gallery->name}}" height="110px" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->name}}</h3>
                            
                        @for($count=1; $count<=5; $count++)
                            @php
	                            if($count<=$rating){
	                                $color = 'color:#ffcc00;';
	                            }
	                            else {
	                                $color = 'color:#ccc;';
	                            }
	                                                	
                                @endphp

                                <li class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                        @endfor

                        <span>({{$count_rating}} đánh giá)</span>
            
                        <div class="mt-4">Giá gốc:<span style="text-decoration: line-through;"> {{number_format($product->price),''}} đ</span></div>
                        <div>Giá Khuyến mãi:<span class="product__details__price"> {{number_format($product->price_sales),''}} đ</span></div>
                        <div>Lượt xem:{{$product->views}}</div>
                        <div>Tình trạng:
                            @if($product->quanlity < 1)
                                Hết hàng
                            @else
                                Còn hàng ({{$product->quanlity}})
                            @endif
                        </div>
                        <div>Ngày sản xuất: {{$product->add_day}}</div>
                        <div>Ngày hết hạn: {{$product->expired_day}}</div>
                        <p>Mô tả</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" value="1" min="1" max="{{$product->quanlity}}">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Thêm giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Giao hàng</b> <span>1 ngày . <samp>Miễn phí vận chuyển hôm nay</samp></span></li>
                            <li><b>Cân nặng</b> <span>0.5 kg</span></li>
                            <li><b> Chia sẽ </b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Đánh giá <span>({{$count_rating}})</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Mô tả</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active col-md-11" style="margin: 0 auto" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                    <!-- <h6>Đánh giá </h6> -->
                                    <div class="container">
                            
                                        <div class="d-flex justify-content-center row">
                                            <div class="col-md-12">
                                            
                                                <div class="d-flex flex-column comment-section">
                                                <form>
										            @csrf
                                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->id}}">
                                                    <div id="comment_show"></div>

                                                </form>
                                                    <div id="notify_comment"></div>
                                                    <!-- <div class="bg-white float-right"> -->
                                                        <!-- <div class="float-right"> -->
                                                            <strong class="starts float-right mt-4">Viết đánh giá của bạn</strong>
                                                        <!-- </div> -->
                                                        @csrf
                                                        <ul class="list-inline rating float-right"  title="Average Rating">
                                                            @for($count=1; $count<=5; $count++)	
                                                            <div id="notifys_comment"></div>
                                                                <input type="hidden" id="index" value="{{$count}}">
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                                                <li title="star_rating" id="{{$product->id}}-{{$count}}" value="{{$count}}" name="$count[]" data-index="{{$count}}"  data-product_id="{{$product->id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; color:#ccc;; font-size:30px;">&#9733;</li>
                                                            @endfor
                                                        </ul>
                             

                                                        <div class="bg-light p-2" >
                                                         
                                                        <!-- <div id="notify_comment float-left"></div> -->
                                                            <div class="col-md-6 float-left">
                                                                <input type="text" class="form-control name_cmt mb-2" placeholder="Họ tên (bắt buộc)">
                                                                <input type="text" class="form-control email_cmt" placeholder="Email">
                                                            </div>
                                                            <div class="col-md-6 float-right">
                                                                <div class="d-flex flex-row align-items-start "><img class="rounded-circle" src="{{asset('admin/images/user/user.jpg')}}" width="40">
                                                                <textarea data-index="{{$count}}"  data-product_id="{{$product->id}}" data-rating="{{$rating}}" class="form-control ml-1 shadow-none textarea comment_content" name="comment" placeholder="Mời bạn bình luận hoặc đặt câu hỏi"></textarea></div>
                                                                <div class="mt-2 text-right"><button class="btn btn-success btn-sm shadow-none send-comment" type="button">Gửi đánh giá</button></div>
                                                            </div>
                                                        </div>

                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc col-md-11" style="margin: 0 auto">
                                    <div style="border-left: 5px green solid"> <h4 style="margin-left:5px; margin-bottom:10px">Thông tin sản phẩm </h4> </div>
                                    <p>{!!$product->description!!}</p>
                                    <!-- <p>nội dung..</p> -->
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                    <h6>Mô tả sản phẩm</h6>
                                    <p>nội dung.</p>
                                        <p>nội dung.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product_offer as $offer)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('admin/images/product')}}/{{$offer->image}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{url('product-detail')}}/{{$offer->slug}}/{{$offer->id}}">{{$offer->name}}</a></h6>
                            <h5>{{number_format($offer->price),''}} đ</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-3 col-md-4 col-sm-6">
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Ỏi</a></h6>
                            <h5>30.000 đ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
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
                </div> -->
            </div>
        </div>
    </section>
    
    @include('home.layout.footer')

    <script type="text/javascript">

        function remove_background(product_id)
        {
            for(var count = 1; count <= 5; count++)
            {
                $('#'+product_id+'-'+count).css('color', '#ccc');
            }
        }
    // //hover chuột đánh giá sao
    //     $(document).on('mouseenter', '.rating', function(){
    //         var index = $(this).data("index");
    //         var product_id = $(this).data('product_id');
    //         // alert(index);
    //         // alert(product_id);
    //         remove_background(product_id);
    //         for(var count = 1; count<=index; count++)
    //         {
    //             $('#'+product_id+'-'+count).css('color', '#ffcc00');
    //         }
            
    //     });
   //nhả chuột ko đánh giá
//    $(document).on('mouseleave', '.rating', function(){
//       var index = $(this).data("index");
//       var product_id = $(this).data('product_id');
//       var rating = $(this).data("rating");
//       remove_background(product_id);
//     //   alert(rating);
//       for(var count = 1; count<=rating; count++)
//       {
//        $('#'+product_id+'-'+count).css('color', '#ffcc00');
//       }
//      });
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
        
            $.ajax({
                url: '{{url('/load-comment')}}',
                method: 'POST',
                data:{product_id:product_id, _token:_token},
                    success:function(data){
                        $('#comment_show').html(data);
                    }
            });
        }
    //click đánh giá sao
        $(document).on('click', '.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            remove_background(product_id);

            for(var count = 0; count<=index; count++)
            {
                $('#'+product_id+'-'+count).css('color', '#ffcc00');
           
            }
            $('.send-comment').click(function(){

            var email = $('.email_cmt').val();
            var name = $('.name_cmt').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{url('/send-comment')}}",
                    method:"POST",
                    data:{index:index,product_id:product_id,email:email,name:name,comment_content:comment_content,_token:_token},
                    success:function(data){
               
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Gửi đánh giá thành công',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        // $('#notify_comment').fadeOut(2000);
                        // remove_background(product_id);
                        // $('.comment_content').val('');
                        window.setTimeout(function(){ 
                            location.reload();
                        } ,2000);

                    }
                });
            });
    });
    

    
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
        
        load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }
        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
              success:function(data){
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(9000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        });
    });
</script> -->