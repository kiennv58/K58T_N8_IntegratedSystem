@extends('admin.layout')
@section('content')
    <div class="col-md-10 col-xs-offset-1 user">
        <div>
            <a href="{{ url("admin/point/add") }}" class="btn btn-danger">Thêm điểm</a>
        </div>
        <div class="panel panel-primary list_user">
            <div class="panel-heading">Bảng điểm</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>MSSV</th>
                        <th>Lớp</th>
                        <th>40%</th>
                        <th>60%</th>
                        <th>Tổng kết</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    $count = 0;
                    foreach ($arr as $rows){
                    $count++;
                    ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $rows->hoten }}</td>
                        <td>{{ $rows->mssv }}</td>
                        <td>{{ $rows->lop }}</td>
                        <td>{{ $rows->d40 }}</td>
                        <td>{{ $rows->d60 }}</td>
                        <td>
                            <?php
                                $rows->tongket = Round(((0.4*$rows->d40)+(0.6*$rows->d60)),1);
                            ?>
                            {{ $rows->tongket }}
                        </td>
                        <td>
                            <a href="{{ url("admin/point/edit") }}/{{ $rows->id }}" >Sửa</a>&nbsp;&nbsp;
                            <a href="{{ url("admin/point/delete") }}/{{ $rows->id }}" onclick="window.confirm('Xóa mục điểm này?')">Xóa</a>
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


