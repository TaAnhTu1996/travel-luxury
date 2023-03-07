@extends('layouts.login-signup')
@section('title', 'Gửi link đặt lại mật khẩu')
@push('styles')
    <style>
        .container {
            min-height: 350px;
        }
        .sign-in-container {
            width: 100%;
        }
        .signIn-form-button {
            margin-top: 20px;
        }
        .account-input {
            width: 70%;
        }
    </style>
@endpush
@section('content')

    @if ($message = Session::get('success'))
        <p id="message">{{ $message }}</p>
    @endif
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="post" action="{{route('customer.forgot-password')}}" id="sign-in-container">
                @csrf
                <h1 style="padding-bottom: 20px;">Đặt lại mật khẩu</h1>

                <span>Nhập email để đặt lại mật khẩu</span>
                <div class="account-input">
                    <i class="far fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Nhập email"/>
                </div>
                @error('email')
                <strong style="color:red; font-size: 10px;">{{ $errors->first('email') }}</strong>
                @enderror
                <button type="submit" class="signIn-form-button">Đặt lại mật khẩu</button>
            </form>
        </div>
    </div>
@endsection
