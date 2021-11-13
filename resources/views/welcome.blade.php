<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
<div class="row">
                                <form>
                                    @csrf
                                    <div class="col-lg-4">
                                        <!-- <div class="checkout__input"> -->
                                        <p>Tỉnh / Thành Phố<span>*</span></p>
                                            <select class="choose city" name="city" id="city">
                                                <option value="">Chọn tỉnh thành phố</option>
                                                @foreach($citys as $key => $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        <!-- </div> -->
                                    </div>
                                    <!-- <div id="district">
                                        
                                    </div> -->
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                        <p>Quận / Huyện<span>*</span></p>
                                            <select class="choose district" name="district" id="district" >
                                                <option value="">Chọn quyện huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="checkout__input">
                                        <p>Xã / Phường<span>*</span></p>
                                            <select class="village" name="village" id="village">
                                                <option value="">Chọn xã phường</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{asset('home/js/jquery.nice-select.min.js ')}}"></script> -->
    <script src="{{asset('home/js/jquery-ui.min.js ')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js ')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js ')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js ')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{asset('home/js/main.js ')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

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
                        $('#'+result).html(data);
                    }
                });
            });
        });
    </script>
