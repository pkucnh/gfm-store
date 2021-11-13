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
            <h2>403</h2>
            <h4>Lỗi! Quyền truy cập</h4>
            <p>Bạn không có quyền truy cập vào trang này.</p>
            <a href="{{asset('/admin/home')}}">Trở lại trang chủ</a>
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