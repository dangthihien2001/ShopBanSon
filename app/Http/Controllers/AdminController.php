<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
session_start();   //thư viện sử dụng session

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin_login');
     }
    
    public function show_dashboard(){
        return view('admin.dashboard');
     }

     public function login(Request $request){
        $Email = $request->email;
        $MatKhau = $request->matKhau;
        $result = DB::table('taikhoan')->where('Email',$Email)->first();

        // dd ($result);
        if($result){
            if(Hash::check($MatKhau, $result->MatKhau)){
                Session::put('HoTen',$result->HoTen);
                Session::put('ID_TK',$result->ID_TK);
                if($result->VaiTro==2){
                return Redirect::to('/TrangChu');
                }
                return Redirect::to('/dashboard'); //nếu tài khoản và mật khẩu đúng
            }else{
                Session::put('message','Mật khẩu hoặc tài khoản của bạn chưa đúng, vui lòng nhập lại');
                return Redirect::to('/dangnhap'); 
            }     

        }else{
            Session::put('message','Mật khẩu hoặc tài khoản của bạn chưa đúng, vui lòng nhập lại');
            return Redirect::to('/dangnhap'); 
        }     
    }

    public function logout(Request $request){
        $request->session()->flush();
        return view('admin_login');
    }

    public function show_register(){
        return view('register');
    }

    public function register(Request $request){
        $Email = $request->email;
        $MatKhau = $request->matKhau;
        $HoTen = $request->hoten;
        $SDT = $request->sdt;
        DB::table('taikhoan')->insert(
            ['Email' =>$Email, 'MatKhau' => Hash::make($MatKhau), 'SDT'=>$SDT, 'HoTen'=>$HoTen]
        );
        // dd ($result);
        return Redirect::to('/dangnhap');
    }

}
