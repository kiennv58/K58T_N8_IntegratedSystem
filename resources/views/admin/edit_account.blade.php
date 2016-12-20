@extends('admin.layout')
@section('content')
    <div class="col-md-6 col-xs-offset-3 edit_user">
        <div class="panel panel-primary">
            <div class="panel-heading">Tài khoản thi</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Name</div>
                        <div class="col-md-9">
                            <input type="text" name="name" value="<?php echo isset($arr->name)?$arr->name:"";?>" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Họ tên</div>
                        <div class="col-md-9">
                            <input type="text" name="hoten" value="<?php echo isset($arr->hoten)?$arr->hoten:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Username</div>
                        <div class="col-md-9">
                            <?php
                                $a = str_random(6);
                            ?>
                            <input type="text" name="username" value="<?php echo isset($arr->username)?$arr->username:"$a";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Password</div>
                        <div class="col-md-9">
                            <?php
                                $a = str_random(6);
                            ?>
                            <input type="text" name="password" value="<?php echo isset($arr->password)?$arr->password:"$a";?>" class="form-control" required>
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