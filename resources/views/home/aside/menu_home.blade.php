<section class="hero">
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
<<<<<<< HEAD
                            <li class="dropdown"><a href="#">{{$row->name}}</a>
                                    <ul>
                                        <li>
                                                dada
                                        </li>
                                    </ul>
                           </li>
=======
                            <li><a href="#">{{$row->name}}</a></li>
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
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
<<<<<<< HEAD
                                <h5>+65 11.188.888</h5>
=======
                                <h5>+84 81.799.175</h5>
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                  @include('home.aside.slide')
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </section>
    <link rel="stylesheet" href="style.css">
=======
        
    </section>
>>>>>>> e67035c4ea184912f964e44a044cb8c2822baaa3
