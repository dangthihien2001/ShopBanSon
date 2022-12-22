<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //trang chủ
    public function index(){
        $danhmuc = DB::table('danhmuc')->get();
        $thuonghieu= DB::table('thuonghieu')->get();
        $tat_ca_sp= DB::table('sanpham')->orderBy('ID_SP', 'ASC')->limit(4)->get();
        return view('pages.home',compact('danhmuc','thuonghieu','tat_ca_sp'));
    }

}