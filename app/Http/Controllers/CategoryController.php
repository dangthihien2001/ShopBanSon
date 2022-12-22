<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

//category for frontend
class CategoryController extends Controller
{

    public function show_category_home($ID_DM){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        $tat_ca_sp = DB::table('sanpham')->where('sanpham.ID_DM',$ID_DM)->get();
        $ten_dm = DB::table('danhmuc')->where('ID_DM', $ID_DM)->value('TenDanhMuc');
        return view('pages.category.show_category',compact('danhmuc','thuonghieu','tat_ca_sp','ten_dm'));
     }


    //
    public function show_brand_home($ID_TH){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        $tat_ca_sp = DB::table('sanpham')->where('sanpham.ID_TH',$ID_TH)->get();
        $ten_th = DB::table('thuonghieu')->where('ID_TH', $ID_TH)->value('TenThuongHieu');
        return view('pages.category.show_brand',compact('danhmuc','thuonghieu','tat_ca_sp','ten_th'));
     }
}


