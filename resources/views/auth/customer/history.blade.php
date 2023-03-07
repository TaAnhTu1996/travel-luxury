@extends('layouts.frontend')
@section('title','Lịch sử đặt tour')
@push('styles')
<style>
    .status-booking {
        font-size: 1em;
        font-weight: bold;
        color: white;
        padding: .35em .65em;
    }
</style>
@endpush
@section('content')

<section class="grid-left-sidebar">
    <div class="container">
        <h1 class="pb-5">Lịch sử đặt tour</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="font-weight-bold">#</th>
                    <th class="font-weight-bold">Tên tour</th>
                    <th class="font-weight-bold">Ảnh</th>
                    <th class="font-weight-bold">Tổng tiền</th>
                    <th class="font-weight-bold">Lịch trình</th>
                    <th class="font-weight-bold">Miền</th>
                    <th class="font-weight-bold">Trạng thái</th>
                    <th class="font-weight-bold">Thời gian</th>
                </tr>
            </thead>
            <tbody>
            @if($customerCheck)
                @foreach($booked as $key => $book)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{route('frontend.tour-detail', $book->tour->id)}}" class="text-info">{{ $book->tour->title }}</a></td>
                        <td>
                            <img src="/img/tours/{{ $book->tour->image }}" alt="" width="100" height="auto">
                        </td>
                        <td>{{ number_format($book->total_price) }}</td>
                        <td>{{ $book->tour->schedule }}</td>
                        <td>{{ $book->tour->regions->name }}</td>
                        <td>
                            @if($book->status === BOOKING_PENDING)
                                <span class="badge rounded-pill bg-warning status-booking">Chưa thanh toán</span>
                            @elseif($book->status === BOOKING_ACCEPTED)
                                <span class="badge rounded-pill bg-success status-booking">Đã thanh toán</span>
                            @elseif($book->status === BOOKING_REJECTED)
                                <span class="badge rounded-pill bg-danger status-booking">Đã hủy</span>
                            @else
                                <span class="badge rounded-pill bg-info status-booking">Đã kết thúc</span>
                            @endif
                        </td>
                        <td>{{ $book->tour->created_at->toDateTimeString() }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center font-weight-bold py-5" colspan="7">Bạn cần đăng nhập để xem lịch sử đặt Tour</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</section>
@endsection
@push('scripts')

@endpush
