@extends('include.frame-login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="/register" method="POST">
                    <h2 class="text-center">Đăng ký</h2>
                    <p class="text-center">Nhanh và dễ.</p>

                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Họ và tên"
                            value="{{ old('name') }}">
                        <p style="color: red">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Địa chỉ email"
                            value="{{ old('email') }}">
                        <p style="color: red">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                        <p style="color: red">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password_confirmation"
                            placeholder="Nhập lại mật khẩu">
                        <p style="color: red">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Đăng ký">
                    </div>
                    <div class="link login-link text-center">Bạn đã có tài khoản? <a href="/dang-nhap">Đăng nhập tại đây</a>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
