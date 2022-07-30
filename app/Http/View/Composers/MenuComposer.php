<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class MenuComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $cate = Category::all();
        $view->with('menus', $cate);
    }
}
