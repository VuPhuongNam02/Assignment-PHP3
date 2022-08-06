<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug = '')
    {
        if ($slug != '') {
            $cate = Category::with('products')->where('slug', $slug)->first();
            $products = $cate->products;
        } else {
            $products = Product::select('id', 'name', 'price', 'sale', 'image')->get();
        }

        return view('product.list', [
            'title' => 'Cửa hàng',
            'products' => $products
        ]);
    }
}
