<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug = '', $size = '')
    {

        if ($slug != '') {
            $cate = Category::with('products')->where('slug', $slug)->first();
            $products = $cate->products;
        } else {
            $products = Product::select('id', 'name', 'price', 'sale', 'image', 'slug')->get();
        }

        return view('product.list', [
            'title' => 'Cửa hàng',
            'products' => $products,
            'listSize' => Size::all(),
            'slug' => $slug
        ]);
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('product.detail', [
            'title' => $product->name,
            'product' => $product,
            'productId' => $product->id
        ]);
    }
}
