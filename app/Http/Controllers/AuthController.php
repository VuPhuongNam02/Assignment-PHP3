<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

    public function register(Request $request)
    {

        $message = [
            'name.required' => 'Không được để trống !',
            'email.required' => 'Không được để trống !',
            'email.unique' => 'Email này đã tồn tại !',
            'email.email' => 'Không đúng định dạng email !',
            'password.required' => 'Không được để trống !',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Đăng ký tài khoản thành công');
        }
    }

    public function login(Request $request)
    {
        $message = [
            'email.required' => 'Không được để trống !',
            'password.required' => 'Không được để trống !',
            'email.email' => 'Không đúng định dạng email !',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Sai email hoặc mật khẩu');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/dang-nhap');
    }
}
