<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    //
    public function add_category_product(){
        return view('admin.add_category_product');
    }

    public function all_category_product(){
        $all_category_product = DB::table('danhmuc')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product); //admin_layout chứa all_category_product gán vào biến manager
    }

    public function save_category_product(Request $request){
        $data = array();
        $data['TenDanhMuc'] = $request->category_product_name;
        $data['Mo_Ta'] = $request->category_product_desc;
        DB::table('danhmuc')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('/add-category-product');
    }

    //get
    public function edit_category_product($id){
        $ID_DM = DB::table('danhmuc')->where('ID_DM',$id)->get();   //dữ liệu thuộc id này 
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $ID_DM);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product); //admin_layout chứa all_category_product gán vào biến manager       
    }


    //post 
    public function update_category_product(Request $request,$id){
        $data = array();
        $data['TenDanhMuc'] = $request->category_product_name;
        $data['Mo_Ta'] = $request->category_product_desc;
        DB::table('danhmuc')->where('ID_DM',$id)->update($data);
        Session::put('message','Cập nhập danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');   
    }

    public function delete_category_product($id_cate){
        DB::table('danhmuc')->where('ID_DM',$id_cate)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');   
    }

   
}
