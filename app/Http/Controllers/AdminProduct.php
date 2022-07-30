<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
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
        $list_cate = DB::select('SELECT * FROM category WHERE parent > 0');
        return view('admin.product.create', [
            'title' => 'Product | Create',
            'content' => 'Create Product',
            'listCate' => $list_cate
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
        $size = implode(',', $request->size);

        $product = new Product();
        $product->fill($request->all());
        $product->size = $size;
        //slug
        $product->slug = Str::slug($request->name, '-');

        //file avatar
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('Backend/img/', $filename);
        $product->image = $filename;
        //file album
        //        $file_album = $request->file('album');
        //        foreach ($file_album as $item):
        //            $file_album_name = time().'.'.$item->getClientOriginalExtension();
        //            $item->move('Backend/img/',$file_album_name);
        //        endforeach;
        $product->save();
        return redirect()->route('list.pro')->with('success', 'Create product successfully !');
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
    public function edit($id)
    {
        $pro = DB::table('product')
            ->select('product.*', 'category.id as catId', 'category.catName as catName')
            ->join('category', 'product.catId', '=', 'category.id')
            ->where('product.id', $id)
            ->first();
        $list_cate = DB::select('SELECT * FROM category');

        return view('admin.product.edit', [
            'title' => 'Product | Edit',
            'content' => 'Edit Product',
            'pro' => $pro,
            'listCate' => $list_cate
        ]);
    }


    public function update(Request $request, $id)
    {
        $pro = Product::find($id);
        $pro->fill($request->all());

        $pro->size = implode(',', $request->size);
        $pro->slug = Str::slug($request->name, '-');

        $file = $request->file('image');
        if ($file == '') {
            $pro->image = $pro->image;
        } else {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('Backend/img/', $filename);
            $pro->image = $filename;
        }

        $pro->save();
        return redirect()->route('list.pro')->with('success', 'Update product successfully !');
    }


    public function destroy($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        return redirect()->route('list.pro')->with('success', 'Delete product successfully !');
    }
}