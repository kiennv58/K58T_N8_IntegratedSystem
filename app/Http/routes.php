<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\session;
Route::Controllers(array("auth"=>"Auth\AuthController"));
Route::get("/login", function (){
    return view("admin.login");
});
Route::post("/login", function (){
    $username = Request::input("name");
    $password = Request::input("password");
    if(Auth::attempt(array("name"=>$username,"password"=>$password,"role_id"=>"ADMIN"))){
        
        //$session_name = Request::session
        return redirect("admin/user");
    }
    else if(Auth::attempt(array("name"=>$username,"password"=>$password))){
        $data['error2'] = "Bạn không phải Admin nên không thể đăng nhập!";
        return view("admin.login",$data);
    }
    else{
        $data['error'] = "Sai tài khoản hoặc mật khẩu!";
        return view("admin.login",$data);
    }
});
Route::group(array("prefix"=>"admin","middleware"=>"auth"), function (){
    Route::get("/logout", function (){
        return redirect("/login");
    });
    //USER
    //List user
    Route::get("/user","Admin\UserController@list_user");
    //Delete user
    Route::get("/user/delete/{id}","Admin\UserController@delete_user");
    //Edit user
    Route::get("/user/edit/{id}","Admin\UserController@edit_user");
    Route::post("/user/edit/{id}","Admin\UserController@do_edit_user");
    //Add user
    Route::get("/user/add","Admin\UserController@add_user");
    Route::post("/user/add","Admin\UserController@do_add_user");

    //STUDENT
    //List student
    Route::get("/student","Admin\StudentController@list_student");
    //Delete student
    Route::get("/student/delete/{id}","Admin\StudentController@delete_student");
    //Edit student
    Route::get("/student/edit/{id}","Admin\StudentController@edit_student");
    Route::post("/student/edit/{id}","Admin\StudentController@do_edit_student");
    //Add student
    Route::get("/student/add","Admin\StudentController@add_student");
    Route::post("/student/add","Admin\StudentController@do_add_student");

    //ROOM TEST
    Route::get("/roomtest","Admin\RoomtestController@list_room");

    //CALENDAR
    //List calendar
    Route::get("/calendar","Admin\CalendarController@list_calendar");
    //Delete calendar
    Route::get("/calendar/delete/{id}","Admin\CalendarController@delete_calendar");
    //Edit calendar
    Route::get("/calendar/edit/{id}","Admin\CalendarController@edit_calendar");
    Route::post("/calendar/edit/{id}","Admin\CalendarController@do_edit_calendar");
    //Add calendar
    Route::get("/calendar/add","Admin\CalendarController@add_calendar");
    Route::post("/calendar/add","Admin\CalendarController@do_add_calendar");

    //ACCOUNT TEST
    //List account
    Route::get("/account","Admin\AccountController@list_account");
    //Delete account
    Route::get("/account/delete/{id}","Admin\AccountController@delete_account");
    //Edit account
    Route::get("/account/edit/{id}","Admin\AccountController@edit_account");
    Route::post("/account/edit/{id}","Admin\AccountController@do_edit_account");
    //Add account
    Route::get("/account/add","Admin\AccountController@add_account");
    Route::post("/account/add","Admin\AccountController@do_add_account");

    //BROAD POINT
    //List point
    Route::get("/point","Admin\PointController@list_point");
    //Delete point
    Route::get("/point/delete/{id}","Admin\PointController@delete_point");
    //Edit point
    Route::get("/point/edit/{id}","Admin\PointController@edit_point");
    Route::post("/point/edit/{id}","Admin\PointController@do_edit_point");
    //Add point
    Route::get("/point/add","Admin\PointController@add_point");
    Route::post("/point/add","Admin\PointController@do_add_point");

});





//FRONTEND
Route::get("/", function (){
    return view("frontend.home");
});
Route::post("/", function (){
    $username = Request::get("name");
    $password = Request::get("password");
    if(Auth::attempt(array("name"=>$username,"password"=>$password,'role_id'=>'DOCTOR'))){
        $name = Auth::user()->name;
        return redirect("/info/{$name}");
    }
    else if(Auth::attempt(array("name"=>$username,"password"=>$password,'role_id'=>'ADMIN'))){
        $data['error2'] = "Tài khoản này chỉ dùng để đăng nhập Admin!";
        return view("frontend.home",$data);
    }
    else{
        $data['error'] = "Sai tài khoản hoặc mật khẩu!";
        return view("frontend.home",$data);
    }

});
Route::get("/register", function (){
    return view("frontend.register");
});
Route::post("/register", function (){
    $name = Request::get("name");
    $email = Request::get("email");
    $password = Hash::make(Request::get("password"));
    DB::insert("insert into users(name,email,password,role_id) values('$name','$email','$password','PATIENT')");
    echo "Một email đã được gửi tới địa chỉ email của bạn";
    if(!empty($name) && !empty($email) && !empty($password)){
        $data['reg'] = "Đăng ký thành công, bạn vui lòng quay lại trang đăng nhập để tiếp tục!";
        return view("frontend.register",$data);
    }
});
Route::group(array("prefix"=>"","middleware"=>"auth"), function (){

    Route::get("/logout", function (){
        return redirect("/");
    });

    //Infomation user
    Route::get("/info/{name}","Frontend\UserController@info_user");// Have problem with {name} but don't know why code run?
    Route::get("/changepassword/{id}","Frontend\UserController@change_password");
    Route::post("/changepassword/{id}", function ($id){
        $name = Request::get("name");
        $email = Request::get("email");
        $password = Request::get("password");
        DB::update("update users set name='$name',email='$email' where id=$id");
        if(!empty($password)){
            $password = Hash::make(Request::get("password"));
            DB::update("update users set password='$password' where id=$id");
        }
        return redirect("/info/{$name}");
    });
    Route::get("/profile/{name}","Frontend\UserController@change_profile");
    Route::post("/profile/{name}","Frontend\UserController@do_change_profile");
});

//RESTful API
//GET ALL
Route::get("/api/users", function (){
    $users = DB::table('users')->get();
    $data;
    foreach ($users as $user)
    {
        $data[] = array(
            'id' => $user->id ,
            'name' => $user->name,
            'email' => $user->email,
         );
        
    }
    
    $x = Response::json($data);
    //var_dump($x);die();
    $a = json_decode($x, true);
    var_dump($a['data']);
    die();
    return $a;
    
});
//GET
Route::get("/api/user/{id}", function ($id){
    $users = DB::table('users')->where('id', $id)->get();
    $data = array(
            'id' => $users['0']->id,
            'name' => $users['0']->name,
            'email' => $users['0']->email,
         );
    
    return Response::json($data);
    
});
//POST - CREATE USER
Route::post("/api/user", function (Request $request){
    $name = $request->input('name');
    $email = $request->input('email');
    $password = bcrypt($request->input('password'));
    $lv = $request->input('lv');
    $result = DB::insert("insert into users(name,email,password,lv) values( '$name','$email','$password','$lv')");
    return Response::json([
       'message' => 'User Created Succesfully',
    ]);
    
});
//PUT - UPDATE USER
Route::put("/api/user", function (Request $request){
    $id = $request->input('id');
    $name = $request->input('name');
    $email = $request->input('email');
    $password = bcrypt($request->input('password'));
    $lv = $request->input('lv');
   
    $result = DB::update("update users set name='$name',email='$email',password='$password', lv='$lv' where id=$id");
    if ($result) {
        return Response::json([
       'message' => 'User Updated Succesfully',
    ]);
    }
    return Response::json([
       'message' => 'User Updated Failed',
    ]);
    
});
//DELETE USER
Route::delete("/api/user/{id}", function (Request $request, $id){
    //$id = $request->input('id');
    $result = DB::delete("delete from users where id=$id");
    if ($result) {
        return Response::json([
       'message' => 'User Deleted Succesfully',
    ]);
    }
    return Response::json([
       'message' => 'User Deleted Failed',
    ]);
    
});











