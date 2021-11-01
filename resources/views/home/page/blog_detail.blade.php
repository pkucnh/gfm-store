@include('home.layout.header')

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{asset('home/img/blog/details/details-hero.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>Khoảnh khắc bạn cần loại bỏ tỏi khỏi thực đơn </h2>
                        <ul>
                            <li>Tác giả: Đỉnh</li>
                            <li>07/10/2021</li>
                            <li>8 bình luận</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Tìm kiếm...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Doanh mục</h4>
                            <ul>
                                <li><a href="{{url('blogs')}}/all/0">Tất cả</a></li>
                            @foreach($cate_blogs as $cate_blog )
                                <li><a href="{{url('blogs')}}/{{$cate_blog->slug}}/{{$cate_blog->id}}">{{$cate_blog->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4> Tin gần đây</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($blog_new as $new )
                                    <a href="{{url('blog-detail')}}/{{$new->slug}}/{{$new->id}}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{asset('admin/image/blog')}}/{{$new->image}}" width="100px" height="70px" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{$new->name}}</h6>
                                            <span>{{date('d/m/Y H:i:s',strtotime($new->post_day))}}</span>
                                        </div>
                                    </a>
                                @endforeach                           
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tìm kiếm bởi</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Táo</a>
                                <a href="#">Làm đẹp</a>
                                <a href="#">Rau </a>
                                <a href="#">Trái cây</a>
                                <a href="#">Thức ăn tốt </a>
                                <a href="#">Đời sống</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    @foreach($blogs as $blog)
                        <div class="blog__details__text">
                            <h3 style=color:#037841>{{$blog->name}}</h3>
                            <p>{!!$blog->content!!}</p>
                            <p>Kết thúc</p>
                        </div>
                    @endforeach
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('home/img/blog/details/details-author.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Đỉnh</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Doanh mục:</span> Thức ăn</li>
                                        <li><span>Tags:</span> các tag</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Dành cho bạn </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Tháng 10,2021</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Mẹo giúp việc nấu ăn trở nên đơn giản</a></h5>
                            <p>Suy nghĩ đơn giản </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Tháng 10,2021</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 bước nấu buổi sáng trong 15 phút</a></h5>
                            <p>Suy nghĩ đơn giản </p>
                        </div>
                    </div>
                </div> -->
                @foreach($blog_offer as $offer)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('admin/image/blog')}}/{{$offer->image}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i>{{date('d/m/Y H:i:s',strtotime($offer->post_day))}}</li>
                                    <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                                </ul>
                                <h5><a href="{{url('blog-detail')}}/{{$offer->slug}}/{{$offer->id}}">{{$offer->name}}</a></h5>
                                <p>{{$offer->summary}} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

@include('home.layout.footer')