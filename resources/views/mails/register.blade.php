@extends('layouts.email',['subject'=>'Email đăng ký tài khoản thành công'])
@section('content')
    <tr>
        <td class="content-block">
            Xin chào {{ $name }}
        </td>
    </tr>
    <tr>
        <td class="content-block">
            <p>Tên : {{ $customer->name }}</p>
            <p>Email : {{ $customer->email }}</p>
            <p>Mật khẩu: {{ $password }}</p>
            <p>Số điện thoại: {{ $customer->phone_number }}</p>
            <p>Địa chỉ: {{ $customer->address }}</p>
        </td>
    </tr>
@endsection
