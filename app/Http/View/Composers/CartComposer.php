<?php

namespace App\Http\View\Composers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        $carts = Cart::select('id')->where('userId', Auth::id())->get();
        $view->with('carts', count($carts));
    }
}
