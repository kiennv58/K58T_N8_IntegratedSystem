@extends('frontend.layout')
@section('content')
    <div class="col-md-12 col-xs-offset-0" style="margin-top: 100px; margin-bottom: 50px">
        <div>
            <?php
                $name = Auth::user()->name;
                echo "<b>Wellcome!</b><br/><br/>";
                echo "Xin chào ".$name;
            ?>
        </div>
        <br/>
        <div>
            <img src="{{ url("public/admin/images/uet.jpg") }}" alt="uet" style="width: 100%">
        </div>
    </div>
@endsection