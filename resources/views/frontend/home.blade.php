<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="public/admin/images/laravel_logo2.png">
    <link rel="stylesheet" href="{{ asset("public/admin/css/bootstrap.min.css") }}">
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
            <div class="trai">
                <div>Nhóm 8 - K58T<br/></div>
                <div style="font-size: 16px; color: black">
                    <ul>
                        <li>Nguyễn Văn Kiên</li>
                        <li>Phạm Thái Cường</li>
                        <li>Thẩm Kim Dũng</li>
                        <li>Nguyễn Thị Trang</li>
                        <li>Phạm Thị Yến Lan</li>
                    </ul>
                </div>
            </div>
            <div class="phai">
                <div class="col-md-6 col-xs-offset-3">
                    <form action="" method="post">
                        <div class="dau-form">ĐĂNG NHẬP</div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-3" style="font-size: 20px">Tài khoản</div>
                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" style="height: 40px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" style="font-size: 20px">Mật khẩu</div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" style="height: 40px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <input type="submit" value="Đăng nhập" class="btn btn-success" style="height: 45px">
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <?php
                        if(isset($error)){
                        ?>
                        <div class="alert-danger">
                            <div class="col-md-9 col-xs-offset-3">
                                <strong>CẢNH BÁO! </strong><?php echo isset($error)?$error:"" ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($error2)){
                        ?>
                        <div class="alert-danger">
                            <div class="row col-md-9 col-xs-offset-3">
                                <strong>CẢNH BÁO! </strong><?php echo isset($error2)?$error2:"" ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-9 col-xs-offset-3">
                                <br/><br/>
                                <div>
                                    <i>Bạn chưa có tài khoản?</i>
                                    <a href="{{ url("/register") }}" style="color: #0000cc"> Đăng kí ngay!</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cuoi-page">
            <div class="copyright">
                <div class="ll">Info</div>
                <div>
                    Copyright © 2016 Nhóm 8 - K58T - UET. All Rights Reserved
                </div>
                <div class="lienhe">
                    <a href="{{ url("https://www.facebook.com/") }}">
                        <img src="public/admin/images/facebook.jpg" alt="Facebook cá nhân">
                    </a>
                    &nbsp;
                    <a href="{{ url("https://www.youtube.com") }}">
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
                    
                </a>
            </div>
        </div>
    </div>
</body>
</html>