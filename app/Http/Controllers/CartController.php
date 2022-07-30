<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FormProductDetail;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index(Request $request){
        $result = $this->cart->create($request);
        if ($result === false){
            return redirect()->back();
        }
        return redirect('/gio-hang');
//        $carts = Session::get('carts');
//        Session::forget('carts');
    }

    public function show(){
        if (Auth::check()) {
            $products = $this->cart->getProduct();
            return view('cart', [
                'title' => 'Giỏ hàng',
                'products' => $products,
                'carts' => Session::get('carts')
            ]);
        }else{
            return redirect('/dang-nhap');
        }
    }

    public function update($id,$qty){
        $this->cart->update($id,$qty);
    }

    public function remove($id){
        $this->cart->remove($id);
        return redirect()->back();
    }
}
