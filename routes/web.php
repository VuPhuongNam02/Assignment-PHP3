<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AdminCategory;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminProduct;
use App\Http\Controllers\Home;
use \App\Http\Controllers\AdminSlider;
use \App\Http\Controllers\ProductDetail;
use \App\Http\Controllers\Profile;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\CartController;

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

Route::get('/', [Home::class, 'index'])->name('home');

//admin
Route::get('/admin', [Admin::class, 'index']);

//category
Route::prefix('/category/')->group(function () {
    Route::get('list', [AdminCategory::class, 'index'])->name('list.cate');
    Route::get('create', [AdminCategory::class, 'create']);
    Route::post('store', [AdminCategory::class, 'store']);
    Route::get('edit/{id}', [AdminCategory::class, 'edit']);
    Route::post('update/{id}', [AdminCategory::class, 'update']);
    Route::get('delete/{id}', [AdminCategory::class, 'delete']);
});

//product
Route::prefix('/product/')->group(function () {
    Route::get('list', [AdminProduct::class, 'index'])->name('list.pro');
    Route::get('create', [AdminProduct::class, 'create']);
    Route::post('store', [AdminProduct::class, 'store']);
    Route::get('edit/{id}', [AdminProduct::class, 'edit']);
    Route::post('update/{id}', [AdminProduct::class, 'update']);
    Route::get('destroy/{id}', [AdminProduct::class, 'destroy']);
});

//Slider
Route::prefix('/slider/')->group(function () {
    Route::get('list', [AdminSlider::class, 'index'])->name('list.slide');
    Route::post('store', [AdminSlider::class, 'store']);
    Route::get('edit/{id}', [AdminSlider::class, 'edit']);
    Route::post('update/{id}', [AdminSlider::class, 'update']);
    Route::get('delete/{id}', [AdminSlider::class, 'destroy']);
});

//login
Route::get('/dang-nhap',[AuthController::class,'signin']);
Route::get('/dang-ky',[AuthController::class,'signup']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/dang-xuat',[AuthController::class,'logout']);


//
Route::get('/san-pham/{id}-{slug}.html',[ProductDetail::class,'index']);
Route::get('/tai-khoan',[Profile::class,'index']);

//cart
Route::get('/gio-hang',[CartController::class,'show']);
Route::post('/add-cart', [CartController::class, 'index']);
Route::get('/update/cart/{id}/{qty}', [CartController::class, 'update']);
Route::get('/cart/delete/{id}', [CartController::class, 'remove']);




