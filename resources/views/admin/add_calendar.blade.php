@extends('admin.layout')
@section('content')
    <div class="col-md-10 col-xs-offset-1 edit_user">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm lịch thi</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Tên lịch thi</div>
                        <div class="col-md-9">
                            <input type="text" name="tenlichthi" value="<?php echo isset($arr->tenlichthi)?$arr->tenlichthi:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Ngày thi</div>
                        <div class="col-md-9">
                            <input type="text" name="ngaythi" value="<?php echo isset($arr->ngaythi)?$arr->ngaythi:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Thời gian thi</div>
                        <div class="col-md-9">
                            <input type="text" name="thoigianthi" value="<?php echo isset($arr->thoigianthi)?$arr->thoigianthi:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Phòng thi</div>
                        <div class="col-md-9">
                            <input type="text" name="phongthi" value="<?php echo isset($arr->phongthi)?$arr->phongthi:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="submit" value="Thêm" class="btn btn-primary">
                            <input type="reset" value="Làm mới" class="btn btn-danger">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection