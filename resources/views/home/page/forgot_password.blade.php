@include('home.layout.header')
    <link rel="stylesheet" href="{{asset('home/login/css/login2.css')}}">
    <section style="background-image: url({{asset('home/login/img/dt.jpg')}})">
        <div class="containers">
            <div class="user signinBx">
                <div class="imgBx"><img src="{{asset('home/login/img/forgot.jpg')}}"></div>
                <div class="formBx">         
                    <form>
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        <h2>Quên mật khẩu</h2>
                        <input type="text" name="email" placeholder="Nhập email">
                        <input type="submit" value="Gửi">
                        <p class="signup">Đi đến đăng nhập?<a href="{{url('login')}}">Đăng nhập</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@include('home.layout.footer')
