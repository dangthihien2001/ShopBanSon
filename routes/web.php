<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CoLorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//backend_adminController
Route::get('/dangnhap',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);
Route::post('/login',[AdminController::class,'login']);
Route::get('/dangky',[AdminController::class,'show_register']);
Route::post('/dangky',[AdminController::class,'register']);
Route::get('/logout',[AdminController::class,'logout']);

//categoryproduct
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);
Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{id}',[CategoryProduct::class,'update_category_product']);
Route::get('/edit-category-product/{id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{id_cate}',[CategoryProduct::class,'delete_category_product']);


//brandcontroller
Route::get('/add-brand-product',[BrandController::class,'add_brand_product']);
Route::get('/all-brand-product',[BrandController::class,'all_brand_product']);
Route::post('/save-brand-product',[BrandController::class,'save_brand_product']);
Route::post('/update-brand-product/{id}',[BrandController::class,'update_brand_product']);
Route::get('/edit-brand-product/{id}',[BrandController::class,'edit_brand_product']);
Route::get('/delete-brand-product/{id_cate}',[BrandController::class,'delete_brand_product']);


//ProductController backend
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{id}',[ProductController::class,'update_product']);
Route::get('/edit-product/{id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{id}',[ProductController::class,'delete_product']);


//CoLorController
Route::get('/add-color',[CoLorController::class,'add_color']);
Route::post('/save-color',[ColorController::class,'save_color']);

//frontend
Route::get('/',[HomeController::class,'index']);
Route::get('/TrangChu', [HomeController::class,'index']);
Route::get('/SanPham', [ProductController::class,'shop']);

//danh muc,thuonghieu,chitiet san pham
Route::get('/Danh-Muc-San-Pham/{ID_DM}', [CategoryController::class,'show_category_home']);
Route::get('/Thuong-Hieu/{ID_TH}', [CategoryController::class,'show_brand_home']);
Route::get('/Chi-Tiet-San-Pham/{ID_SP}', [ProductController::class,'product_detail']);

//cart
Route::post('/save-cart', [CartController::class,'save_cart']);
Route::post('/update-cart-quantily', [CartController::class,'update_cart_quantily']);
Route::get('/show-cart', [CartController::class,'show_cart']);
Route::get('/delete-to-cart/{rowid}', [CartController::class,'delete_to_cart']);

