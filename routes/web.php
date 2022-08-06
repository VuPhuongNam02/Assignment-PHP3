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


//role == admin
Route::middleware('CheckAdmin')->group(function () {

    //admin
    Route::get('/admin', [Admin::class, 'index'])->name('admin.dashboard');

    //category
    Route::prefix('/category/')->group(function () {
        Route::get('list', [AdminCategory::class, 'index'])->name('list.cate');
        Route::get('create', [AdminCategory::class, 'create']);
        Route::post('store', [AdminCategory::class, 'store']);
        Route::get('edit/{category}', [AdminCategory::class, 'edit']);
        Route::post('update/{category}', [AdminCategory::class, 'update']);
        Route::get('delete/{category}', [AdminCategory::class, 'delete']);
    });

    //product
    Route::prefix('/product/')->group(function () {
        Route::get('list', [AdminProduct::class, 'index'])->name('list.pro');
        Route::get('create', [AdminProduct::class, 'create']);
        Route::post('store', [AdminProduct::class, 'store']);
        Route::get('edit/{product}', [AdminProduct::class, 'edit']);
        Route::patch('update/{product}', [AdminProduct::class, 'update']);
        Route::get('destroy/{product}', [AdminProduct::class, 'destroy']);
    });

    //Slider
    Route::prefix('/slider/')->group(function () {
        Route::get('list', [AdminSlider::class, 'index'])->name('list.slide');
        Route::post('store', [AdminSlider::class, 'store']);
        Route::get('edit/{id}', [AdminSlider::class, 'edit']);
        Route::post('update/{id}', [AdminSlider::class, 'update']);
        Route::get('delete/{id}', [AdminSlider::class, 'destroy']);
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});


//role === user
Route::middleware('Auth')->group(function () {
    //cart
    Route::get('/gio-hang', [CartController::class, 'show']);
    Route::post('/add-cart', [CartController::class, 'index']);
    Route::get('/update/cart/{id}/{qty}', [CartController::class, 'update']);
    Route::get('/cart/delete/{id}', [CartController::class, 'remove']);

    //account
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/tai-khoan', [Profile::class, 'index']);
});


//public
//login
Route::get('/dang-nhap', [AuthController::class, 'signin'])->name('login');
Route::get('/dang-ky', [AuthController::class, 'signup']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//product
Route::get('/san-pham/{id}-{slug}.html', [ProductDetail::class, 'index']);
