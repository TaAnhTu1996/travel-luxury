@extends('layouts.email',['subject'=>'Email đặt tour thành công'])
@section('content')
    @if($booking)
        <tr>
            <td class="content-block">
                <p class="title-block">Kinh gửi Quý khách hàng: {{ $booking->name }}</p>
                <p>Lời đầu tiên, thay mặt ban lãnh đạo Luxury Travel cũng như toàn bộ đội ngũ nhân viên gửi lời cảm ơn
                    chân thành và sâu sắc nhất tới quý khách hàng, đã ủng hộ công ty trong thời gian qua.</p>
            </td>
        </tr>
        <tr>
            <td class="content-block">
                <p class="title-block">Viết đánh giá về Tour quý khách để phản hồi về dịch vụ:</p>
                <a href="{{$link}}&response=accept" class="btn-primary">Đánh giá ngay</a>
            </td>
        </tr>
    @endif
@endsection

