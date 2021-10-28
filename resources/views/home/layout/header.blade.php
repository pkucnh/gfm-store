<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Green Farm Mart | Chuổi siêu thị cung cấp thực phẩm sạch</title>
    <link rel="shortcut icon" href="{{asset('home/img/logo/logo.png')}}" type="image/png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> -->

    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/comment.css')}}" type="text/css">
    <link rel="stylesheet" href="sweetalert2.min.css">
  
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href=""><i class="fa fa-shopping-bag"></i> <span>4</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('admin/logo/logo.png')}}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
           


            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i>Đăng nhập</a>
            </div>
            
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
                <li><a href="#">Cửa hàng</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{url('show-cart')}}">Shop Details</a></li>
                        <li><a href="#">Shoping Cart</a></li>
                        <li><a href="{{url('check-out')}}">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> greenmart@gmail.com</li>
                                <li>Miễn phí giao hàng cho đơn hàng chỉ từ 99k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Tiếng Việt</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Tiếng việt</a></li>
                                    <li><a href="#">Tiếng anh</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                            @if(Auth::check())
                                <a href="#"><i class="fa fa-user"></i> {{Auth::user()->email}}</a>
                            @else
                                <a href="{{url('login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{asset('home/img/logo/logo.png')}}" width="65px" height="50px" alt=""><img src="{{asset('home/login/img/t.png')}}" width="135px" height="55px" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Trang Chủ</a></li>
                            <li><a href="./shop-grid.html">Cửa hàng</a></li>
                            <li><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Chi tiết</a></li>
                                    <li><a href="./shoping-cart.html">Giỏ hàng</a></li>
                                    <li><a href="./checkout.html">Thanh toán</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Bài viết</a></li>
                            <li><a href="./contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{url('show-cart')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                    
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->