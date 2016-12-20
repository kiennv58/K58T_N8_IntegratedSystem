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
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            $name = Auth::user()->name;
            ?>
            <a class="navbar-brand" href="{{ url("/info/$name") }}">Trang chủ</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                $id = Auth::user()->id;
                $n = Auth::user()->name;
                ?>
                <li><a href="{{ url("/profile/$n") }}">Thông tin tài khoản</a></li>
                <li><a href="{{ url("/changepassword/$id") }}">Đổi mật khẩu</a></li>
                <li><a href="{{ url("/logout") }}">Đăng xuất</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Tìm kiếm ...">
            </form>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>