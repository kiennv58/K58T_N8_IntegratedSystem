<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="public/admin/images/laravel_logo2.png">
    <link rel="stylesheet" href="{{ url("public/admin/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("public/admin/css/home.css") }}">

</head>
<body>
<div class="wraper">
    <div class="dau-page">
        <div class="logo_uet">
            <a href="{{ url("/") }}">
                <img src="public/admin/images/uet_logo.png" alt="uet-logo">
                TÍCH HỢP HỆ THỐNG
            </a>
        </div>
        <div class="lienlac">
            <img src="public/admin/images/phone.png" alt="phone"> Call us: (0)168 260 xxxx &nbsp;
            <img src="public/admin/images/email.png" alt="email"> Email: vankien9x@gmail.com
        </div>
    </div>
    <div class="than-page">
        @yield('content')
    </div>
    <div class="cuoi-page">
        <div class="copyright">
            <div class="ll">Info</div>
            <div>
                Copyright © 2016 Nhóm 8 - K58T - UET. All Rights Reserved
            </div>
            <div class="lienhe">
                <a href="{{ url("https://www.facebook.com/vietnt94v") }}">
                    <img src="public/admin/images/facebook.jpg" alt="Facebook cá nhân">
                </a>
                &nbsp;
                <a href="{{ url("https://www.youtube.com/channel/UCY43Nffon6dVjUW1I0j2JsA") }}">
                    <img src="public/admin/images/youtube.jpg" alt="Youtube cá nhân">
                </a>
            </div>
        </div>
        <div class="diachilienlac">
            <div class="ll">Contact us</div>
            <div>144 Xuan Thuy, Cau giay, Ha Noi</div>
            <div>
                <img src="public/admin/images/phone2.png" alt="Phone"> Phone: (0)168 260 xxxx<br/>
                <img src="public/admin/images/email2.png" alt="Email"> Email: vankien9x@gmail.com<br/>
            </div>
        </div>
        <div class="logo_uet">
            <a href="{{ url("/") }}" style="color: cornsilk">
                <img src="public/admin/images/uet_logo.png" alt="uet-logo">
                TÍCH HỢP HỆ THỐNG
            </a>
        </div>
    </div>
</div>
</body>
</html>