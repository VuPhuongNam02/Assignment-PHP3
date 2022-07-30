<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategory extends Controller
{

    // public function __construct()
    // {
    //     $this->cate =
    // }

    public function index()
    {
        $collection = Category::all();
        return view('admin.category.list', [
            'title' => 'Admin | Category',
            'content' => 'List Category',
            'menus' => $collection
        ]);
    }

    public function create()
    {
        $list_cate = DB::select('SELECT * FROM category');
        return view('admin.category.create', [
            'title' => 'Category | Create',
            'content' => 'Create Category',
            'list' => $list_cate
        ]);
    }

    public function store(Request $request)
    {
        $cate = new Category();
        $cate->catName = $request->catName;
        $cate->slug = Str::slug($request->catName, '-');
        $cate->parent = $request->parent;
        $cate->save();
        // $this->cate->fill($request->all());
        return redirect()->route('list.cate')->with('success', 'Create category successfully !');
    }

    public function edit($id)
    {
        $cate = Category::find($id);
        $list_cate = DB::table('category')->where('parent', '>', 0)->get();
        return view('admin.category.edit', [
            'title' => 'Category | Edit',
            'content' => 'Edit Category',
            'cate' => $cate,
            'list' => $list_cate
        ]);
    }
    public function update(Request $request, $id)
    {
        $cate = Category::find($id);
        $cate->fill($request->all());
        $cate->slug = Str::slug($request->catName, '-');
        $cate->save();

        return redirect()->route('list.cate')->with('success', 'Update category successfully !');
    }
    public function delete($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('list.cate')->with('success', 'Delete category successfully !');
    }
}