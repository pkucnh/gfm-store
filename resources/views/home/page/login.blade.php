<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    @include('home.layout.header')
    <link rel="stylesheet" href="{{asset('home/login/css/login2.css')}}">
    <!-- <title>Document</title>
</head>
<body> -->
    <section style="background-image: url({{asset('home/login/img/dt.jpg')}})">
        <div class="containers">
            <div class="user signinBx">
                <div class="imgBx"><img src="{{asset('home/login/img/3.jpg')}}"></div>
                <div class="formBx">         
                    <form>
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        
                        <h2>Đăng nhập</h2>
                        <input type="text" name="email" placeholder="Nhập tài khoản hoặc email">
                        <input type="password" name="password" placeholder="Mật khẩu">
                        <input type="submit" value="Đăng nhập"><a href="{{url('forgot-password')}}" class="forgot float-right">Quên mật khẩu</a><br>
                        <p class="signup">Bạn chưa có mật khẩu?<a href="#" onclick="toggleForm();">Đăng ký</a></p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form>
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        <h2>Đăng ký</h2>
                        <input type="text" name="email" placeholder="Nhập email">
                        <input type="password" name="password" placeholder="Mật khẩu">
                        <input type="re-password" name="password" placeholder="Xác nhận mật khẩu">
                        <input type="submit" value="Đăng ký">
                        <p class="signup">Đi đến đăng nhập?<a href="#" onclick="toggleForm();">Đăng nhập</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="{{asset('home/login/img/1.jpg')}}">
                </div>
            </div>
            <!-- <div class="user signupBx">
                <div class="formBx">
                    <form>
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        <h2>Quên mật khẩu</h2>
                        <input type="text" name="email" placeholder="Nhập email">
              
                        <input type="submit" value="Gửi">
                        <p class="signup">Đi đến đăng nhập?<a href="#" onclick="toggleForm();">Đăng nhập</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="{{asset('home/login/img/1.jpg')}}">
                </div>
            </div> -->
           
        </div>
        
    </section>
    @include('home.layout.footer')
    <script type="text/javascript">
        function toggleForm(){
            var container = document.querySelector('.containers');
            container.classList.toggle('active')
        }
        function toggleForms(){
            var containers = document.querySelector('.containers');
            containers.classList.toggle('actives')
        }
    </script>
<!-- </body>
</html> -->