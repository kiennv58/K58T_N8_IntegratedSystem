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
<div class="container">
    <div class="col-md-4 col-xs-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Đăng nhập</div>
            <div class="panel-body">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-4">Tài khoản</div>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Mật khẩu</div>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <input type="submit" value="Đăng nhập" class="btn btn-primary">
                            <input type="reset" value="Làm mới" class="btn btn-warning">
                        </div>
                    </div>
                    <?php
                    if(isset($error)){
                    ?>
                    <div class="alert-danger">
                        <strong>CẢNH BÁO! </strong><?php echo isset($error)?$error:"" ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($error2)){
                    ?>
                    <div class="alert-danger">
                        <strong>CẢNH BÁO! </strong><?php echo isset($error2)?$error2:"" ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8 col-xs-offset-4">
                            <br/><br/>
                            <div style="color: blue">Bạn chưa có tài khoản?</div>
                            <a href="{{ url("/register") }}">
                                <input type="button" value="Đăng ký" class="btn btn-success" style="margin-top: 10px">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>