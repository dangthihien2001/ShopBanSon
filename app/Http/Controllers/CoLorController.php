<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class CoLorController extends Controller
{
    public function add_color(){
        $product = DB::table('sanpham')->orderBy('ID_SP','desc')->get();
        return view('admin.add_color')->with('product',$product);
    }

    public function save_color(Request $request){
        $data = array();
    	$data['TenMau'] = $request->color_name;
        $data['ID_SP'] = $request->product;

    	DB::table('mausanpham')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('add-color');
    }
    //
}
