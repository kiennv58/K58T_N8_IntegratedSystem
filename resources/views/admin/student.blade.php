@extends('admin.layout')
@section('content')
    <div class="col-md-10 col-xs-offset-1 user">
        <div>
            <a href="{{ url("admin/student/add") }}" class="btn btn-danger">Thêm thí sinh</a>
        </div>
        <div class="panel panel-primary list_user">
            <div class="panel-heading">Danh sách thí sinh</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Tài khoản</th>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Lớp</th>
                        <th>Lệ phí</th>
                        <th>Lịch thi</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $stt = 0;
                    foreach ($arr as $rows){
                    $stt++;
                    ?>
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $rows->name }}</td>
                        <td>{{ $rows->mssv }}</td>
                        <td>{{ $rows->hoten }}</td>
                        <td>{{ $rows->ngaysinh }}</td>
                        <td>{{ $rows->lop }}</td>
                        <td>
                            <?php
                            echo $rows->lephi==1?"Đã nộp":"";
                            ?>
                        </td>
                        <td>{{ $rows->lichthi }}</td>
                        <td>
                            <a href="{{ url("admin/student/edit") }}/{{ $rows->id }}" >Sửa</a>&nbsp;&nbsp;
                            <a href="{{ url("admin/student/delete") }}/{{ $rows->id }}" onclick="window.confirm('Xóa thí sinh này?')">Xóa</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                {{$arr->render()}}
            </div>
        </div>
    </div>
@endsection