<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Admin | Home',
            'content' => "Home ADMIN"
        ]);
    }
}