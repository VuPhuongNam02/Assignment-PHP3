<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $auth;
    public function signin()
    {
        return view('auth.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    public  function signup()
    {
        return view('auth.register', [
            'title' => 'Đăng ký'
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/admin');
        } else {
            return redirect()->back();
        }
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->status = 0;
        $user->avatar = '/images/users/user-default.png';
        $user->address = "";
        $user->phone = "";
        $user->save();
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Sai email hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
