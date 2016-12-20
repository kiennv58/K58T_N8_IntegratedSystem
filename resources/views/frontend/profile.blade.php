@extends('frontend.layout')
@section('content')
    <div class="col-md-8 col-xs-offset-2 edit_user" style="margin-top: 100px">
        <div class="panel panel-primary">
            <div class="panel-heading">Thông tin cá nhân</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Tài khoản</div>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" value="<?php echo isset($arr->name)?$arr->name:"";?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">MSSV</div>
                        <div class="col-md-9">
                            <input type="text" name="mssv" value="<?php echo isset($arr->mssv)?$arr->mssv:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Họ tên</div>
                        <div class="col-md-9">
                            <input type="text" name="hoten" value="<?php echo isset($arr->hoten)?$arr->hoten:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Ngày sinh</div>
                        <div class="col-md-9">
                            <input type="text" name="ngaysinh" value="<?php echo isset($arr->ngaysinh)?$arr->ngaysinh:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Lớp</div>
                        <div class="col-md-9">
                            <input type="text" name="lop" value="<?php echo isset($arr->lop)?$arr->lop:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="submit" value="Xác nhận" class="btn btn-primary">
                            <input type="reset" value="Làm mới" class="btn btn-danger">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{--Lich thi--}}
        <div class="panel panel-primary" style="margin-top: 100px">
            
        </div>
    </div>
@endsection