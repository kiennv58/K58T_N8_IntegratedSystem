@extends('frontend.layout')
@section('content')
    <div class="col-md-6 col-xs-offset-3 edit_user" style="margin-top: 100px; margin-bottom: 220px">
        <div class="panel panel-primary">
            <div class="panel-heading">Đổi mật khẩu</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Tài khoản</div>
                        <div class="col-md-9">
                            <input type="text" name="name" value="<?php echo isset($arr->name)?$arr->name:"";?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Email</div>
                        <div class="col-md-9">
                            <input type="email" name="email" value="<?php echo isset($arr->email)?$arr->email:"";?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Mật khẩu</div>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="submit" value="Xác nhận" class="btn btn-success">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection