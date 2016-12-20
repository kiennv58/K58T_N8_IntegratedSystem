@extends('admin.layout')
@section('content')
    <div class="col-md-6 col-xs-offset-3 edit_user">
        <div class="panel panel-primary">
            <div class="panel-heading">Sửa thông tin thí sinh</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">MSSV</div>
                        <div class="col-md-9">
                            <input type="number" name="mssv" value="<?php echo isset($arr->mssv)?$arr->mssv:"";?>" class="form-control" required>
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
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Lệ phí</div>
                        <div class="col-md-9">
                            <input type="checkbox" name="lephi" {{ isset($arr->lephi) && $arr->lephi==1?"checked":"" }}>
                            <label for="lephi">Đã đóng lệ phí</label>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="submit" value="Sửa" class="btn btn-primary">
                            <input type="reset" value="Làm mới" class="btn btn-danger">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection