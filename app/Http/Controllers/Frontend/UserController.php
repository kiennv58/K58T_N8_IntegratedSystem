<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Hash;
use Request;
use DB;
class UserController extends Controller{
    public function info_user($id){
        return view("frontend.info");
    }
    public function change_password($id){
        $data['arr'] = DB::table("users")->where("id","=",$id)->first();
        return view("frontend.change_password",$data);
    }
    public function change_profile($n){
        $data["lichthi"] = DB::table("lichthi")->orderBy("id","desc")->paginate(5);
        $data["arr"] = DB::table("ds_thisinh")->where("name","=",$n)->first();
        return view("frontend.profile",$data);
    }
    public function do_change_profile($n){
        $username = str_random(6);
        $password = str_random(6);
        $name = Request::get("name");
        $mssv = Request::get("mssv");
        $hoten = Request::get("hoten");
        $ngaysinh = Request::get("ngaysinh");
        $lop = Request::get("lop");
        $lichthi = Request::get("lichthi");
        DB::update("update ds_thisinh set name='$name',mssv='$mssv',hoten='$hoten',ngaysinh='$ngaysinh'where name='$n'");
        
        return view("frontend.info");
    }
}
?>