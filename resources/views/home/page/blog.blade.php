@include('home.layout.header')
<!-- @include('home.aside.menu') -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('home/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tin Tức</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Tin tức</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                              
                                <!-- <li><a href="#">Thức ăn (5)</a></li>
                                <li><a href="#">Đời sống (9)</a></li>
                                <li><a href="#">Du lịch (10)</a></li> -->
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
                                <!-- <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-2.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Mẹo để cân bằng<br /> bữa ăn dinh dưỡng</h6>
                                        <span>Tháng 10 07, 2021</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="img/blog/sidebar/sr-3.jpg" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 nguyên tắt giúp bạn<br /> giảm cân với rau củ</h6>
                                        <span>Tháng 10 07, 2021</span>
                                    </div>
                                </a> -->
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('admin/image/blog')}}/{{$blog->image}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>{{date('d/m/Y H:i:s',strtotime($blog->post_day))}}</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="{{url('blog-detail')}}/{{$blog->slug}}/{{$blog->id}}">{{$blog->name}}</a></h5>
                                    <p>{{$blog->summary}}</p>
                                    <a href="{{url('blog-detail')}}/{{$blog->slug}}/{{$blog->id}}" class="blog__btn"> Đọc thêm<span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        <div class="col-lg-12">
                            <div class="pagination"
                            {!! $blogs->links() !!}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('home.layout.footer')