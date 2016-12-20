@extends('admin.layout')
@section('content')
    <div class="col-md-6 col-xs-offset-3 edit_user">
        <div class="panel panel-primary">
            <div class="panel-heading">Bảng điểm</div>
            <div class="panel-body">
                <form method="post" action="">
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Họ tên</div>
                        <div class="col-md-9">
                            <input type="text" name="hoten" value="<?php echo isset($arr->hoten)?$arr->hoten:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">MSSV</div>
                        <div class="col-md-9">
                            <input type="text" name="mssv" value="<?php echo isset($arr->mssv)?$arr->mssv:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Lớp</div>
                        <div class="col-md-9">
                            <input type="text" name="lop" value="<?php echo isset($arr->lop)?$arr->lop:"";?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Điểm 40%</div>
                        <div class="col-md-9">
                            <input type="number" name="d40" value="<?php echo isset($arr->d40)?$arr->d40:"";?>"
                                   class="form-control" id="fname1" onkeyup="myFunction()" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Điểm 60%</div>
                        <div class="col-md-9">
                            <input type="number" name="d60" value="<?php echo isset($arr->d60)?$arr->d60:"";?>"
                                   class="form-control" id="fname2" onkeyup="myFunction()" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-3">Tổng kết</div>
                        <div class="col-md-9">
                            <input type="text" name="tongket" id="demo" class="form-control" readonly>
                        </div>
                    </div>
                    {{--Enter 40%: <input type="text" id="fname1" onkeyup="myFunction()" ><br/>--}}
                    {{--Enter 60%: <input type="text" id="fname2" onkeyup="myFunction()" style="margin-top:5px">--}}

                    {{--<p>Sum: <span id="demo"></span></p>--}}

                    <script>
                        function myFunction() {
                            var x = document.getElementById("fname1").value;
                            var y = document.getElementById("fname2").value;
                            document.getElementById("demo").value = parseInt(x)*0.4 + parseInt(y)*0.6;
                        }
                    </script>


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