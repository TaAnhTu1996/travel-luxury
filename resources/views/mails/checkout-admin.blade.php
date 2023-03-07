@extends('layouts.email',['subject'=>'Email đặt tour thành công'])
@section('content')
    @if($booking)
        <tr>
            <td class="content-block">
                <p class="title-block">Xin chào Luxury Travel</p>
                <p>Đã có khách hàng đăng ký Tour bên dưới</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Thông tin khách hàng đăng ký Tour</p>
                <p>Tên: {{ $booking->name }}</p>
                <p>Email: {{ $booking->email }}</p>
                <p>Số điện thoại: {{ $booking->phone_number }}</p>
                <p>Địa chỉ: {{ $booking->address }}</p>
                <p>Số người tham gia: {{ $booking->total_person }}</p>
                <p>Tài khoản đăng ký Tour: {{ $booking->customer->name }}</p>
                <p>Tên Tour: {{ $booking->tour->title }}</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Tổng tiền cần phải trả để đặt Tour</p>
                <p>{{ number_format($booking->tour->price) }} <sup>đ</sup>/Người X {{ $booking->total_person }}
                    = {{ number_format($booking->total_price) }} <sup>đ</sup></p>
                <p>
                    @if($booking->total_person >= 5)
                        Đã bao gồm phiếu giảm giá 20%
                    @elseif($booking->total_person >= 3)
                        Đã bao gồm phiếu giảm giá 15%
                    @endif
                </p>
            </td>
        </tr>
    @endif
@endsection

