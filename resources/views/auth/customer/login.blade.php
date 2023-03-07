@extends('layouts.login-signup')
@section('title', 'Đăng nhập Luxury Travel')
@section('content')

@if ($message = Session::get('success'))
<p id="message">{{ $message }}</p>
@endif
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="post" action="{{route('customer.login')}}" id="sign-in-container">
            @csrf
            <h1 style="padding-bottom: 20px;">Đăng nhập</h1>

            <span>Nhập thông tin bên dưới</span>
            <div class="account-input ">
                <i class="far fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Nhập email"/>
            </div>
            @error('email')
            <strong style="color:red; font-size: 10px;">{{ $message }}</strong>
            @enderror
            <div class="account-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" autocomplete="new-password" />
            </div>
            @error('password')
            <strong style="color:red; font-size: 10px;">{{ $message }}</strong>
            @enderror
            <a class="forgot" href="{{route('customer.forgot-password')}}"> Quên mật khẩu? </a>
            <button type="submit" class="signIn-form-button">Đăng nhập</button>
            <p>Hoặc chọn đăng nhập bằng Google+</p>
            <a href="{{route('customer.customer-redirect')}}" class="login-google">Đăng nhập bằng Google+</a>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="square"></div>
            <div class="triangle"></div>
            <div class="circle"></div>
            <div class="square2"></div>
            <div class="triangle2"></div>
            <div class="overlay-panel overlay-right">
                <h1>Luxury Travel</h1>
                <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                <a href="{{route('customer.register')}}" class="ghost" id="signUp">Tạo tài khoản </a>
            </div>

        </div>
    </div>
</div>
@endsection
