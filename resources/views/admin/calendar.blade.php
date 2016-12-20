@extends('admin.layout')
@section('content')
    <div class="col-md-10 col-xs-offset-1 user">
        <div>
            <a href="{{ url("admin/calendar/add") }}" class="btn btn-danger">Thêm lịch thi</a>
        </div>
        <div class="panel panel-primary list_user">
            <div class="panel-heading">Lịch thi</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Tên lịch thi</th>
                        <th>Ngày thi</th>
                        <th>Thời gian thi</th>
                        <th>Phòng thi</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $stt = 0;
                    foreach ($arr as $rows){
                    $stt++;
                    ?>
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $rows->tenlichthi }}</td>
                        <td>{{ $rows->ngaythi }}</td>
                        <td>{{ $rows->thoigianthi }}</td>
                        <td>{{ $rows->phongthi }}</td>
                        <td>
                            <a href="{{ url("admin/calendar/edit") }}/{{ $rows->id }}" >Sửa</a>&nbsp;&nbsp;
                            <a href="{{ url("admin/calendar/delete") }}/{{ $rows->id }}" onclick="window.confirm('Xóa lịch thi này?')">Xóa</a>
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