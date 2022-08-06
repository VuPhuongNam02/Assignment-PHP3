<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Product::all();
        return view('admin.product.list', [
            'title' => 'Admin | Product',
            'content' => 'List Product',
            'collection' => $collection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'Product | Create',
            'content' => 'Create Product',
            'sizes' => Size::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());

        $product->slug = Str::slug($request->name, '-');
        $product->code = Str::random(6);

        // //file avatar
        $product->image = \App\Helpers\Helper::saveImage(
            $request->hasFile('image'),
            $request->image,
            'products',
            $product->image
        );

        // $file->move('Backend/img/', $filename);
        // $product->image = $filename;
        //file album
        //        $file_album = $request->file('album');
        //        foreach ($file_album as $item):
        //            $file_album_name = time().'.'.$item->getClientOriginalExtension();
        //            $item->move('Backend/img/',$file_album_name);
        //        endforeach;
        $result = $product->save();
        if ($result) {
            $newProduct = Product::select('id')->orderBy('id', 'desc')->limit(1)->first();
            foreach ($request->sizeId as $val) {
                ProductSize::create([
                    'productId' => $newProduct->id,
                    'sizeId' => $val
                ]);
            }
            return redirect()->route('list.pro')->with('success', 'Create product successfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $list_cate = Category::all();
        $list_size = Size::all();

        return view('admin.product.edit', [
            'title' => 'Product | Edit',
            'content' => 'Edit Product',
            'pro' => $product,
            'listCate' => $list_cate,
            'list_size' => $list_size
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());

        $product->slug = Str::slug($request->name, '-');

        $product->image = \App\Helpers\Helper::saveImage(
            $request->hasFile('image'),
            $request->image,
            'products',
            $product->image,
            true
        );
        $result =  $product->save();

        if ($result) {
            DB::table('product_sizes')->where('productId', $product->id)->delete();

            foreach ($request->sizeId as $val) {
                ProductSize::create([
                    'productId' => $product->id,
                    'sizeId' => $val
                ]);
            }
        }
        return redirect()->route('list.pro')->with('success', 'Update product successfully !');
    }


    //shutdown
    // public function destroy(Product $product)
    // {
    //     DB::table('product_sizes')->where('productId', $product->id)->delete();

    //     $product->delete();

    //     return redirect()->route('list.pro')->with('success', 'Delete product successfully !');
    // }
}
