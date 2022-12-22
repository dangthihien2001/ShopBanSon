<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    
    public function save_cart(Request $request){
        $producId= $request->productid_hidden;
        $quantity= $request->qty;
        // $Color = $request->color;
        $product_info = DB::table('sanpham')->where('ID_SP',$producId)->first();

        $data['id']=$product_info->ID_SP;
        $data['qty']= $quantity;
        $data['name']=$product_info->TenSP;
        $data['price']=$product_info->DonGiaBan;   
        $data['weight']=$product_info->DonGiaBan; 
        $data['options']['image']=$product_info->HinhAnh;    
        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart'); //quay lại trang show_cart
     }

     public function show_cart(){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        return view('pages.cart.show_cart',compact('danhmuc','thuonghieu')); 
     }

     public function delete_to_cart($rowId){
        Cart::remove($rowId); //xóa sản phẩm đó dựa vào rowId
        return Redirect::to('/show-cart');
     }

     public function update_cart_quantily (Request $request){
        $rowid = $request->rowId_cart;
        $soluong = $request->cart_quantily;
        Cart::update($rowid,$soluong);
      //   Cart::destroy();
        return Redirect::to('/show-cart');
     }
}
