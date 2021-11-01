 <!-- Blog Section Begin -->
 <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Bài Viết</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('admin/image/blog')}}/{{$blog->image}}" width="300" height="300" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                            
                                <!-- $data = strtotime($blog->post_day); -->
                                <li><i class="fa fa-calendar-o"></i> {{date('d/m/Y H:i:s',strtotime($blog->post_day))}}</li>
                                <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                            </ul>
                            <h5><a href="#">{{$blog->name}} </a></h5>
                            <p>{{$blog->summary}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('home/img/blog/blog-2.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 bước để chuẩn bị buổi sáng đơn giản và đầy đủ dinh dưỡng</a></h5>
                            <p>.... </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('home/img/blog/blog-3.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Ghé thăm nông trại sạch </a></h5>
                            <p>.... </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>