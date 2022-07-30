<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $pro_id = array_keys($carts);
        $pro = Product::select('id', 'name', 'price', 'sale', 'image')
            ->whereIn('id',$pro_id)
            ->get();
        $view->with('sanpham', $pro);
    }
}
