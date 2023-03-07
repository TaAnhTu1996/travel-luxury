@extends('layouts.login-signup')
@section('title', 'Đặt lại mật khẩu')
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
        .account-input span {
            margin-top: 15px;
        }
    </style>
@endpush
@section('content')

    @if ($message = Session::get('success'))
        <p id="message">{{ $message }}</p>
    @endif
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            @if($customer)
                <form method="post" action="{{route('customer.reset-password')}}" id="sign-in-container">
                    {{ csrf_field() }}
                    <h1 style="padding-bottom: 20px;">Đặt lại mật khẩu</h1>

                    <span>Nhập thông tin mật khẩu mới</span>
                    <div class="account-input">
                        <i class="far fa-envelope"></i>
                        <input type="email" name="email" class="form-control" value="{{$customer->email}}" readonly/>
                    </div>
                    <div class="account-input">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" id="password" autocomplete="new-password" />
                        <span class="fa fa-fw fa-eye field_icon toggle-password"></span>
                    </div>
                    @error('password')<strong style="color:red; font-size: 10px;">{{ $errors->first('password') }}</strong>@enderror
                    <button type="submit" class="signIn-form-button">Đặt lại mật khẩu</button>
                </form>
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    </script>
@endpush
