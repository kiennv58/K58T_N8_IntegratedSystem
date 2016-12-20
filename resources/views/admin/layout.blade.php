<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url("public/admin/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ url("public/admin/css/layout_admin.css") }}">
    <link rel="stylesheet" href="{{ url("public/admin/css/user.css") }}">
    <link rel="stylesheet" href="{{ url("public/admin/css/edit_user.css") }}">
    <link rel="stylesheet" href="{{ url("public/admin/css/add_user.css") }}">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Nhóm 8</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url("admin/user") }}">Tài khoản</a></li>
                <li>
                    <a href="{{ url("#") }}" style="font-size: 18px; color: red">
                        <?php
                        $name = Auth::user()->name;
                        echo "Xin chào ".$name;
                        ?>
                    </a>
                </li>
                <li><a href="{{ url("admin/logout") }}">Đăng xuất</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div style="margin-top: 150px; clear: both"></div>
<div class="container">
    @yield('content')
</div>
</body>
</html>