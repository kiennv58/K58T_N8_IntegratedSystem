@extends('admin.layout')
@section('content')
    <div class="col-md-10 col-xs-offset-1 user">
        <div>
            <a href="{{ url("admin/account/add") }}" class="btn btn-danger">Thêm tài khoản thi</a>
        </div>
        <div class="panel panel-primary list_user">
            <div class="panel-heading">Danh sách tài khoản thi</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Họ tên</th>
                        <th>Username</th>
                        <th>Password</th>
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
                        <td>{{ $rows->hoten }}</td>
                        <td>{{ $rows->username }}</td>
                        <td>{{ $rows->password }}</td>
                        <td>
                            <a href="{{ url("admin/account/edit") }}/{{ $rows->id }}" >Sửa</a>&nbsp;&nbsp;
                            <a href="{{ url("admin/account/delete") }}/{{ $rows->id }}" onclick="window.confirm('Xóa tài khoản này?')">Xóa</a>
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