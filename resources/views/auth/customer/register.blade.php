@extends('layouts.login-signup')
@section('title', 'Đăng ký tài khoản')
@push('styles')
<style>
form span {
    margin-bottom: 0;
}
</style>
@endpush
@section('content')

<div class="container right-panel-active" id="container">
    <div class="form-container sign-up-container">
        <form method="post" action="{{route('customer.register')}}">
            @csrf
            <h1>Đăng kí tài khoản</h1>
            <span>hoặc sử dụng email của bạn để đăng ký</span>
            <div class="account-input">
                <i class="far fa-user"></i>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                    placeholder="Tên đăng nhập" autofocus />
            </div>
            <span class="text-danger">{{ $errors->first('name') }}</span>
            <div class="account-input">
                <i class="far fa-envelope"></i>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                    placeholder="Nhập Email" />
            </div>
            <span class="text-danger">{{ $errors->first('email') }}</span>
            <div class="account-input">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                    placeholder="Nhập Password" autocomplete="new-password" />
            </div>
            <span class="text-danger">{{ $errors->first('password') }}</span>
            <div class="account-input">
                <i class="fas fa-mobile-alt"></i>
                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"
                    placeholder="Nhập số điện thoại" />
            </div>
            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
            <div class="account-input">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                    placeholder="Nhập địa chỉ" />
            </div>
            <span class="text-danger">{{ $errors->first('address') }}</span>
            <button class="mt-3" type="submit">Đăng ký</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="square"></div>
            <div class="triangle"></div>
            <div class="circle"></div>
            <div class="square2"></div>
            <div class="triangle2"></div>
            <div class="overlay-panel overlay-left">
                <h1>Luxury Travel</h1>
                <p>Đăng kí thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                <a href="{{route('customer.login')}}" class="ghost" id="signIn">Đăng nhập</a>
            </div>
        </div>
    </div>
</div>
@endsection
