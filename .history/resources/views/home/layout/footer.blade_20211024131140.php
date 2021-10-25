   <!-- Footer Section Begin -->
   <footer class="footer spad ">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-3 col-md-6 col-sm-6 ">
                    <div class="footer__about ">
                        <div class="footer__about__logo ">
                            <a href="./index.html ">
                        <a href="./index.html"><img src="{{asset('admin/logo/logo.png')}}" width="65px" height="50px" alt=""><span style="font-size:22px; color:#6dc12e; font-weight: bold">Green Mart</span></a>
                        </div>
                        <ul>
                            <li>Address: Thành Phố Hồ Chí Minh</li>
                            <li>Phone: +84 0123456789</li>
                            <li>Email: GFM@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1 ">
                    <div class="footer__widget ">
                        <h6>Liên kết hữu ích</h6>
                        <ul>
                            <li><a href="# ">Về Chúng Tôi</a></li>
                            <li><a href="# ">Về Cửa Hàng</a></li>
                            <li><a href="# ">Thông Tin Giao Hàng </a></li>
                            <li><a href="# ">Chính Sách Bảo Mật</a></li>
                            <li><a href="# ">Bản Đồ</a></li>
                        </ul>
                        <ul>
                            <li><a href="# ">Chúng Tôi Là Ai</a></li>
                            <li><a href="# ">Dịch Vụ Của Chúng Tôi </a></li>
                            <li><a href="# ">Dự Án</a></li>
                            <li><a href="# ">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 ">
                    <div class="footer__widget ">
                        <h6>Đăng ký để nhận tin mới mỗi ngày</h6>
                        <p>Nhận thông tin cập nhật qua Email mới nhất của chúng tôi về cửa hàng và các ưu đãi đặc biệt. </p>
                        <form action="# ">
                            <input type="text " placeholder="Nhập Email ">
                            <button type="submit " class="site-btn ">Đăng Ký</button>
                        </form>
                        <div class="footer__widget__social ">
                            <a href="# "><i class="fab fa-facebook-f "></i></a>
                            <a href="# "><i class="fab fa-instagram "></i></a>
                            <a href="# "><i class="fab fa-twitter "></i></a>
                            <a href="# "><i class="fab fa-pinterest "></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="footer__copyright ">
                        <div class="footer__copyright__text ">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart " aria-hidden="true "></i> by <a href="https://colorlib.com " target="_blank ">GFM</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment "><img src="img/payment-item.png " alt=" "></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js ')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js ')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js ')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js ')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js ')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{asset('home/js/main.js ')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!} -->
    <script>
        $(document).ready(function (){
        $('.dropdown-menu .icon-menu').click(function () {
            $(this).parent('li').children('.sub-menu').slideToggle();
            $(this).toggleClass('fa-chevron-down fa-chevron-right');
        });
    });
    </script>
    <!--  Thêm sản phẩm ajax -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_'+ id).val();
                var cart_product_name = $('.cart_product_name_'+ id).val();
                var cart_product_image = $('.cart_product_image_'+ id).val();
                var cart_product_price = $('.cart_product_price_'+ id).val();
                // var cart_product_price_sales = $('.cart_product_price_sales_'+ id).val();
                var cart_product_amount = $('.cart_product_amount_'+ id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data:{cart_product_id :cart_product_id , cart_product_name: cart_product_name,cart_product_image :
                        cart_product_image,cart_product_price:cart_product_price,cart_product_amount:cart_product_amount,_token :_token },
                        success:function(data){
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Thêm sản phẩm thành công',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                })
                // swal("Good job!", "You clicked the button!", "success")
            });
        });
    </script>

    {{-- -- Ship -- --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id =  $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if(action=='city'){
                    result = 'district';
                }else{
                    result = 'village';
                }
                // console.log("ma_id", ma_id);
                $.ajax({
                    url: '{{url('/select-delivery-home')}}',
                    method: 'POST',
                    data: {action:action, ma_id:ma_id, _token:_token},
                    success:function(data){
                        $('.'+result).html(data);
                    }
                });
            });
        });
    </script>

    {{-- Feeship --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var city_id = $('.city').val();
                var district_id = $('.district').val();
                var village_id = $('.village').val();
                var _token = $('input[name="_token"]').val();

                if(city_id == '' && district_id == '' && village_id == ''){
                    alert('làm ơn chọn để tính phí ship!!')
                }else{
                    $.ajax({
                    url: '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{city_id:city_id, district_id:district_id, village_id:village_id, _token:_token},
                        success:function(data){
                            location.reload();
                        }
                    })
                }
            })
        });
    </script>

</body>
</html>