@extends('admin.layout')
@section('content')
<div class="col-md-10 col-xs-offset-1 user">
    <div>
        <a href="{{ url("admin/user/add") }}" class="btn btn-danger">Thêm tài khoản</a>
    </div>
    <div class="panel panel-primary list_user">
        <div class="panel-heading">Danh sách tài khoản</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Count</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Manager</th>
                </tr>
                <?php
                    $count = 0;
                    foreach ($arr as $rows){
                        $count++;
                        ?>
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $rows->name }}</td>
                            <td>{{ $rows->email }}</td>
                            <td>
                                <?php
                                    switch ($rows->role_id) {
                                        case 'ADMIN':
                                            echo "Admin";
                                            break;
                                        case 'DOCTOR':
                                            echo "Bác sĩ";
                                            break;
                                        case 'NURSE':
                                            echo "Y tá";
                                            break;
                                        case 'SCIENT':
                                            echo "Nhà nghiên cứu";
                                            break;
                                        case 'EMPLOY':
                                            echo "Nhân viên";
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="{{ url("admin/user/edit") }}/{{ $rows->id }}" >Sửa</a>&nbsp;&nbsp;
                                <a href="{{ url("admin/user/delete") }}/{{ $rows->id }}"
                                   onclick="window.confirm('Xóa tài khoản này?')">Xóa</a>
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