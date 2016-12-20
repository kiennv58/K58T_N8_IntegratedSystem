@extends('admin.layout')
@section('content')
    <div class="col-md-6 col-xs-offset-3 edit_user">
        <div class="panel panel-primary">
            <div class="panel-heading">Sửa tài khoản</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Name</div>
                        <div class="col-md-9">
                            <input type="text" name="name" value="<?php echo isset($arr->name)?$arr->name:"";?>" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Email</div>
                        <div class="col-md-9">
                            <input type="email" name="email" value="<?php echo isset($arr->email)?$arr->email:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Password</div>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Vai trò</div>
                        <div class="col-md-9">
                            <input type="radio" name="lv" value="NURSE" {{ isset($arr->role_id)&& $arr->role_id=='NURSE'?"checked":"" }}>Y tá<br/>
                            <input type="radio" name="lv" value="DOCTOR" {{ isset($arr->role_id)&& $arr->role_id=='DOCTOR'?"checked":"" }}>Bác sĩ<br/>
                            <input type="radio" name="lv" value="SCIENT" {{ isset($arr->role_id)&& $arr->role_id=='SCIENT'?"checked":"" }}>Nhà nghiên cứu<br/>
                            <input type="radio" name="lv" value="EMPLOY" {{ isset($arr->role_id)&& $arr->role_id=='EMPLOY'?"checked":"" }}>Nhân viên<br/>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
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
    </div>
@endsection