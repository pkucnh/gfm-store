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
                            <img src="{{asset('admin/images/blog')}}/{{$blog->image}}" width="300" height="300" alt="">
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
            </div>
        </div>
    </section>