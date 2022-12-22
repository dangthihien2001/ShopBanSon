<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
session_start();

class ProductController extends Controller
{
    //backend 
    public function add_product(){
        //lấy hết bảng danh mục và bảng sản phẩm rồi cho vào 2 biến trong view add_product
        $cate_product = DB::table('danhmuc')->orderBy('ID_DM','desc')->get();
        $cate_brand = DB::table('thuonghieu')->orderBy('ID_TH','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }

    public function all_product(){
        $all_product = DB::table('sanpham')
        ->join('danhmuc','danhmuc.ID_DM','=','sanpham.ID_DM')
        ->join('thuonghieu','thuonghieu.ID_TH','=','sanpham.ID_TH')
        ->orderby('sanpham.ID_SP','desc')->paginate(5);
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request){
        $data = array();
    	$data['TenSP'] = $request->product_name;
        $data['SoLuong'] = $request->product_quantity;
    	$data['DonGiaBan'] = $request->product_price;
    	$data['MoTa'] = $request->product_desc;
        $data['ID_DM'] = $request->product_cate;
        $data['ID_TH'] = $request->product_brand;

        $get_image = $request->file('product_image');  //lấy hình ảnh
        if($get_image){  //kiểm tra dung lượng, kích thước
            $get_name_image = $get_image->getClientOriginalName();  //lấy tên
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();  //vidu ten3854.jpg
            $get_image->move('public/uploads/products',$new_image);
            $data['HinhAnh'] = $new_image;   
            DB::table('sanpham')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
    	DB::table('sanpham')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }

    //get
    public function edit_product($id){
        $cate_product = DB::table('danhmuc')->orderby('ID_DM','desc')->get(); 
        $brand_product = DB::table('thuonghieu')->orderby('ID_TH','desc')->get(); 

        $edit_product = DB::table('sanpham')->where('ID_SP',$id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }


    //post 
    public function update_product(Request $request,$product_id){
        $data = array();
    	$data['TenSP'] = $request->product_name;
        $data['SoLuong'] = $request->product_quantity;
    	$data['DonGiaBan'] = $request->product_price;
    	$data['MoTa'] = $request->product_desc;
        $data['ID_DM'] = $request->product_cate;
        $data['ID_TH'] = $request->product_brand;

        $get_image = $request->file('product_image');  //lấy hình ảnh
        if($get_image){  //kiểm tra dung lượng, kích thước
            $get_name_image = $get_image->getClientOriginalName();  //lấy tên
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();  //vidu ten3854.jpg
            $get_image->move('public/uploads/products',$new_image);
            $data['HinhAnh'] = $new_image;   
            DB::table('sanpham')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';
    	DB::table('sanpham')->where('product_id',$product_id)->update($data);
    	Session::put('message','Cập nhật sản phẩm thành công');
    	return Redirect::to('all-product');  
    }

    public function delete_product($id){
        DB::table('sanpham')->where('ID_SP',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');  
    }




    //frontend

    //trang sản phâme
    public function shop(){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        $tat_ca_sp= DB::table('sanpham')->orderBy('ID_SP', 'ASC')->limit(12)->get();
        return view('pages.products.shop',compact('danhmuc','thuonghieu','tat_ca_sp'));
    }

    //chitietsanpham
    public function product_detail($ID_SP){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        $sp = DB::table('sanpham')
        ->join('danhmuc','sanpham.ID_DM','=','danhmuc.ID_DM')
        ->join('thuonghieu','sanpham.ID_TH','=','thuonghieu.ID_TH')
        ->where('ID_SP', $ID_SP)->get(); //lấy tất cả bảng sản phẩm

         $mausac = DB::table('mausanpham')
         ->where('ID_SP', $ID_SP)->get();
        return view('pages.products.product_detail',compact('danhmuc','thuonghieu','sp','mausac'));
    }  
    
    
}
