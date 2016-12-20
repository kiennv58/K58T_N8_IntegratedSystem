@extends('frontend.layout_register')
@section('content')
    <div class="col-md-6 col-xs-offset-3 add_user" style="margin-top: 150px">
        <div class="panel panel-primary">
            <div class="panel-heading">Register User</div>
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
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <input type="submit" value="Register" class="btn btn-primary">
                            <input type="reset" value="Reset" class="btn btn-danger">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <?php
                    if(isset($reg)){
                    ?>
                    <div class="alert-success" style="margin-top: 50px; text-align: center">
                        <strong>CHÚC MỪNG! </strong><?php echo isset($reg)?$reg:"" ?>
                    </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
@endsection