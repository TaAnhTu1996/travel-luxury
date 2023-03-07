@extends('layouts.email',['subject'=>'Email đặt tour thành công'])
@section('content')
    @if($name && $tour)
        <tr>
            <td class="content-block">
                <p class="title-block">Kinh gửi Quý khách hàng: {{ $name }}</p>
                <p>Luxury Travel xin cảm ơn {{ $name }} đã chọn chúng tôi là nơi cũng cấp dịch vụ du lịch cho quý khách. Hẹn gặp lại {{ $name }} tại {{ $tour->title }}</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Thông tin Tour</p>
                <p>Tên Tour: {{ $tour->title }}</p>
                <p>Lịch trình: {{ $tour->schedule }}</p>
                <p>Điểm đến: {{ $tour->destination }}</p>
                <p>THời gian xuất phát: {{ $tour->start }}</p>
            </td>
        </tr>
    @endif
@endsection

