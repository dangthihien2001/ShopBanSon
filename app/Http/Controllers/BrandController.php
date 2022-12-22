<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandController extends Controller
{
    //
    public function add_brand_product(){
        return view('admin.add_brand_product');
    }

    public function all_brand_product(){
        $all_brand_product = DB::table('thuonghieu')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product); //admin_layout chứa all_category_product gán vào biến manager
    }

    public function save_brand_product(Request $request){
        $data = array();
        $data['TenThuongHieu'] = $request->brand_product_name;
        DB::table('thuonghieu')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('/add-brand-product');
    }

    //get
    public function edit_brand_product($id){
        $ID_DM = DB::table('thuonghieu')->where('ID_TH',$id)->get();   //dữ liệu thuộc id này 
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $ID_DM);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product); //admin_layout chứa all_category_product gán vào biến manager       
    }


    //post 
    public function update_brand_product(Request $request,$id){
        $data = array();
        $data['TenThuongHieu'] = $request->brand_product_name;
        DB::table('thuonghieu')->where('ID_TH',$id)->update($data);
        Session::put('message','Cập nhập thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');   
    }

    public function delete_brand_product($id){
        DB::table('thuonghieu')->where('ID_TH',$id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('/all-brand-product');   
    }

   
}
