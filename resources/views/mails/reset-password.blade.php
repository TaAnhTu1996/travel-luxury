@extends('layouts.email',['subject'=>'Email đăng ký tài khoản thành công'])
@section('content')
    <tr>
        <td class="content-block">
            Xin chào {{ $customer->name }}
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <p>Thông tin tài khoản đã được cập nhật.</p>
            <p>Tên: {{$customer->name}}</p>
            <p>email: {{$customer->email}}</p>
            <p>Số điện thoại: {{$customer->phone_number}}</p>
            <p>Địa chỉ: {{$customer->address}}</p>
            <p>Mật khẩu: {{$password}}</p>
        </td>
    </tr>
@endsection
