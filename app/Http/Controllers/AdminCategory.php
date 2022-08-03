<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategory extends Controller
{

    public function index()
    {
        $collection = Category::all();
        return view('admin.category.list', [
            'title' => 'Admin | Category',
            'content' => 'List Category',
            'collection' => $collection
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
        $cate->fill($request->all());
        $cate->slug = Str::slug($request->name, '-');
        $cate->save();
        return redirect()->route('list.cate')->with('success', 'Create category successfully !');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'title' => 'Category | Edit',
            'content' => 'Edit Category',
            'cate' => $category,
        ]);
    }
    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        return redirect()->route('list.cate')->with('success', 'Update category successfully !');
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('list.cate')->with('success', 'Delete category successfully !');
    }
}
