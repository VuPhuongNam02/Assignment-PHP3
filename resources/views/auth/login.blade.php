@extends('include.frame-login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                {{-- @include('include.alert') --}}
                <form action="/login" method="POST">
                    <h2 class="text-center">Đăng nhập</h2>
                    <p class="text-center">Đăng nhập với email và mật khẩu của bạn</p><br>
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" value="{{ old('email') }}"
                            placeholder="Địa chỉ Email ">
                        <p style="color: red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" value="{{ old('password') }}"
                            placeholder="Mật khẩu">
                        <p style="color: red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="link forget-pass text-left"><a href="">Quên mật khẩu</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" value="Đăng nhập">
                    </div>
                    <div class="link login-link text-center">Bạn chưa có tài khoản? <a href="/dang-ky">Đăng ký ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
