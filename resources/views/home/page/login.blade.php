
    <link rel="stylesheet" href="{{asset('home/login/css/login2.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <section style="background-image: url({{asset('home/login/img/dt.jpg')}})">
        <div class="containers">
            <div class="user signinBx">
                <div class="imgBx"><img src="{{asset('home/login/img/3.jpg')}}"></div>
                <div class="formBx">         
                    <form action="{{url('check-login-user')}}" method="post">
                        @csrf
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        <h2>Đăng nhập</h2>
                        <input type="text" name="email" placeholder="Nhập tài khoản hoặc email">
                        <input type="password" name="password" placeholder="Mật khẩu">
                        <input type="submit" value="Đăng nhập"><a href="{{url('forgot-password')}}" class="forgot float-right">Quên mật khẩu</a><br>
                        <p class="signup">Bạn chưa có mật khẩu?<a href="#" onclick="toggleForm();">Đăng ký</a></p>
                        <a class="social social-google" href="{{url('login/google')}}"><i class="fab fa-google-plus-square"></i>Đăng nhập với Google</a>
                        <a class="social social-facebook" href="{{url('login/facebook')}}"><i class="fab fa-facebook-square"></i></i>Đăng nhập với Facebook</a>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form action="{{url('register')}}" method="post">
                            @csrf
                        <div style="text-align:center">
                            <img src="{{asset('home/login/img/logo.png')}}" width="70px" height="70px" >
                        </div>
                        <h2>Đăng ký</h2>
                         <input type="text" name="fullname" placeholder="Họ và tên">
                        <input type="text" name="email" placeholder="Nhập email">
                        <input type="password" name="password" placeholder="Mật khẩu">
                        <input type="password" name="password" placeholder="Xác nhận mật khẩu">
                        <input type="submit" value="Đăng ký">
                        <p class="signup">Đi đến đăng nhập?<a href="#" onclick="toggleForm();">Đăng nhập</a></p>
                        <a class="social social-google" href="{{url('login/google')}}"><i class="fab fa-google-plus-square"></i>Đăng nhập với Google</a>
                        <a class="social social-facebook" href="{{url('login/facebook')}}"><i class="fab fa-facebook-square"></i></i>Đăng nhập với Facebook</a>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="{{asset('home/login/img/1.jpg')}}">
                </div>
            </div>
        </div>
            
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

  

   
    <script src="{{asset('home/js/sweetalert2.all.js')}}"></script>
    @include('sweetalert::alert')

   

