<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request){
        $qty = (int)$request->input('num-product');
        $pro_id = (int)$request->input('product_id');

        $size = $request->size;

        if ($qty <= 0 || $pro_id <=0){
            Session::flash('error','Số lượng hoặc sản phẩm không chính xác');
            return false;
        }
// Session::forget('carts');

      $carts = Session::get('carts');
//        dd($carts);

        if (!$carts){
            Session::put('carts', [
                $pro_id => $qty
            ]);
            return true;
        }

        if (isset($carts[$pro_id])){
            $carts[$pro_id] = $carts[$pro_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$pro_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $pro_id = array_keys($carts);
        return DB::table('product')
            ->whereIn('id', $pro_id)
            ->get();
    }

    public function update($id,$qty){
        $carts = Session::get('carts');
        $exits = Arr::exists($carts,$id);

        if ($exits){
            $carts[$id] = (int)$qty;
            Session::put('carts', $carts);
        }
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }
}
