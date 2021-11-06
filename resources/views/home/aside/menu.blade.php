<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Doanh mục</span>
                    </div>
                    <ul>
                        @foreach($category as $row)
                        <li>
                            <a data-toggle="collapse" href="#{{$row->slug}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <span class="badge pull-right"><i class="fa fa-chevron-down"></i></span>
                                {{$row->name}}
                            </a>
                            <div class="collapse items" id="{{$row->slug}}">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">2</a>
                            </div>
                        </li>
                        @endforeach
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
                            <h5>+84 81.799.175</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
         
            </div>
        </div>
    </div>
    @include('home.aside.slide')
</section>