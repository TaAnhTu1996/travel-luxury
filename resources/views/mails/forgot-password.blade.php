@extends('layouts.email',['subject'=>'Email đăng ký tài khoản thành công'])
@section('content')
    <tr>
        <td class="content-block">
            Xin chào {{ $name }}
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <a href="{{ $link }}&response=accept" class="btn-primary">
                Đặt lại mật khẩu
            </a>
        </td>
    </tr>
@endsection
