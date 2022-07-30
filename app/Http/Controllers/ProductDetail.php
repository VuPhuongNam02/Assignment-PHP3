<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    public function index($id = '', $slug = '')
    {
        $product = \App\Models\Product::find($id);

        return view('product.detail', [
            'title' => $product->name,
            'product' => $product
        ]);
    }
}
