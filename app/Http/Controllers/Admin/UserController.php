<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Hash;
use Request;
use DB;
class UserController extends Controller{
    public function list_user(){
        $data["arr"] = DB::table("users")->orderBy("role_id","asc")->paginate(5);
        return view("admin.user",$data);
    }
    public function delete_user($id){
        DB::delete("delete from users where id=$id");
        return redirect("admin/user");
    }
    public function edit_user($id){
        $data['arr'] = DB::table("users")->where("id","=",$id)->first();
        return view("admin.edit_user",$data);
    }
    public function do_edit_user($id){
        $name = Request::get("name");
        $email = Request::get("email");
        $password = Request::get("password");
        $level = Request::get("lv");
        DB::update("update users set name='$name',email='$email',role='$level' where id=$id");
        if(!empty($password)){
            $password = Hash::make(Request::get("password"));
            DB::update("update users set password='$password' where id=$id");
        }
        return redirect("/admin/user");
    }
    public function add_user(){
        return view("admin.edit_user");
    }
    public function do_add_user(){
        $name = Request::get("name");
        $email = Request::get("email");
        $password = Hash::make(Request::get("password"));
        $role = Request::get("lv");
        DB::insert("insert into users(name,email,password,role_id) values('$name','$email','$password','$role')");
        return redirect("/admin/user");
    }
}
?>