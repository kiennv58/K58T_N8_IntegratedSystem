<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Hash;
use Request;
use DB;
class AccountController extends Controller{
    public function list_account(){
        $data["arr"] = DB::table("taikhoanthi")->orderBy("id","desc")->paginate(5);
        return view("admin.account",$data);
    }
    public function delete_account($id){
        DB::delete("delete from taikhoanthi where id=$id");
        return redirect("admin/account");
    }
    public function edit_account($id){
        $data['arr'] = DB::table("taikhoanthi")->where("id","=",$id)->first();
        return view("admin.edit_account",$data);
    }
    public function do_edit_account($id){
        $name = Request::get("name");
        $hoten = Request::get("hoten");
        $username = Request::get("username");
        $password = Request::get("password");
        DB::update("update taikhoanthi set name='$name',hoten='$hoten',username='$username',password='$password' where id=$id");
//        if(!empty($password)){
//            $password = Hash::make(Request::get("password"));
//            DB::update("update taikhoanthi set password='$password' where id=$id");
//        }
        return redirect("/admin/account");
    }
    public function add_account(){
        return view("admin.edit_account");
    }

    public function do_add_account(){
        $name = Request::get("name");
        $hoten = Request::get("hoten");
        $username = Request::get("username");
        $password = Request::get("password");
        DB::insert("insert into taikhoanthi(name,hoten,username,password) values('$name','$hoten','$username','$password')");
        if(!empty($name)){
            DB::insert("insert into users(name,lv) values('$name',1)");
        }

        return redirect("/admin/account");
    }
}
?>