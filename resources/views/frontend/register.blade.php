@extends('frontend.layout_register')
@section('content')
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
                <div class="dau-form" style="color: #2aabd2;">
                    ĐĂNG KÝ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{ url("/") }}" style="font-size: 22px; color: crimson">Đăng nhập</a>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-3" style="font-size: 20px">Tài khoản</div>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" style="height: 40px" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" style="font-size: 20px">Email</div>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" style="height: 40px" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3" style="font-size: 20px">Mật khẩu</div>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" style="height: 40px" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <input type="submit" value="Đăng kí" class="btn btn-primary" style="height: 45px">
                    </div>
                </div>
                <br/>
                <br/>
                <?php
                if(isset($reg)){
                ?>
                <div class="alert-success" style="margin-top: 50px; text-align: center">
                    <strong>CHÚC MỪNG! </strong><?php echo isset($reg)?$reg:"" ?>
                </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
@endsection