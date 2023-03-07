@extends('layouts.email',['subject'=>'Email đặt tour thành công'])
@section('content')
    @if($tour && $booking)
        <tr>
            <td class="content-block">
                <p class="title-block">Xin chào {{ $name }}</p>
                <p>Vui lòng kiểm tra thông tin cập nhật của bạn </p>
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
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Thông tin Tour</p>
                <p>Tên Tour: {{ $tour->title }}</p>
                <p>Giá Tour: {{ number_format($tour->price) }} <sup>đ</sup></p>
                <p>Lịch trình: {{ $tour->schedule }}</p>
                <p>Điểm đến: {{ $tour->destination }}</p>
                <p>THời gian xuất phát: {{ $tour->start }}</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Tổng tiền cần phải trả để đặt Tour</p>
                <p>{{ number_format($tour->price) }} <sup>đ</sup>/Người X {{ $booking->total_person }}
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
        <tr>
            <td class="content-block">
                <p class="title-block">Số tài khoản của Luxury Travel</p>
                <p>Ngân hàng: TPBANK</p>
                <p>Người nhận: NGUYỄN THANH PHƯƠNG</p>
                <p>STK: 0414 0939 701</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Lưu ý: Quý khách vui lòng thanh toán tối thiểu 30% đơn hàng để đặt chỗ</p>
                <p>Số tiền cần chuyển tối thiểu: {{ number_format($booking->total_price * 30/100) }}</p>
            </td>
        </tr>
    @endif
@endsection

