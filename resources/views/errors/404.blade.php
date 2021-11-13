<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('home/css/errors.css')}}">
    <title>Error 404</title>
</head>
<body>
    <div id="container">
        <div class="content">
            <h2>404</h2>
            <h4>Lỗi! Trang không tìm thấy</h4>
            <p>Trang bạn đang sử dụng không tồn tại. Bạn có thể đã nhập sai địa chỉ hoặc trang có thể đã bị di chuyển.</p>
            <a href="{{asset('/')}}">Trở lại trang chủ</a>
        </div>
    </div>
    <script type="text/javascript">
        var container = document.getElementById('container');
        window.onmousemove = function(e){
            var x = - e.clientX/5,
                y = - e.clientY/5;
            container.style.backgroundPositionX = x + 'px';
            container.style.backgroundPositionY = y + 'px';
        }
    </script>
</body>
</html>