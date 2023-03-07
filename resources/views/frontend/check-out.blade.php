@extends('layouts.frontend')
@section('title', 'Check out')
@push('styles')

@endpush
@section('content')
<section class="">
    <div class="container my-5">
        @if($booking)
            <div class="section-tittle-2">
                <p>Kiểm tra thông tin chi tiết Tour và thông tin Khách hàng</p>
                <div class="section-tittle__line-under"></div>
            </div>
        @else
            <div class="section-tittle-2 text-center">
                <p>Vui lòng Xem thông tin các Tour và nhập thông tin đặt Tour</p>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-8">
                @php
                    if ($booking) {
                        $totalTemps = $booking->total_person * $tour->price;

                        if ($booking->total_person >= 5) {
                            $voucher = $totalTemps * 20/100;
                        } else if ($booking->total_person >= 3) {
                            $voucher = $totalTemps * 15/100;
                        } else {
                            $voucher = 0;
                        }
                        $totalPrice = $totalTemps - $voucher;
                    }
                @endphp
                @if($booking)
                    <ul class="list-group d-block w-100 mb-5">
                        <li class="list-group-item list-group-item-warning text-center font-weight-bold">
                            Thông tin khách hàng
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Tên:</span> {{$booking->name}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Email:</span> {{$booking->email}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Số điện thoại:</span> {{$booking->phone_number}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Đia chỉ:</span> {{$booking->address}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Số người tham gia:</span> {{$booking->total_person}}
                        </li>
                    </ul>
                    <ul class="list-group d-block w-100">
                        <li class="list-group-item list-group-item-success text-center font-weight-bold">
                            Thông tin Tour
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Tên Tour:</span> {{$tour->title}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Giá Tour:</span> {{number_format($tour->price)}} <sup>đ</sup>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Lịch trình:</span> {{$tour->schedule}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Điểm đến:</span> {{$tour->destination}}
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <span class="font-weight-bold">Thời gian xuất phát:</span> {{$tour->start}}
                        </li>
                    </ul>
                @endif
            </div>
            <div class="col-sm-4">
                @if($tour)
                    <div class="pb-5">
                        @if($booking->total_person >= 5)
                            <p class="font-weight-bold mb-3 fs-20">5 người tham gia trở lên bạn nhận được phiếu giảm giá 20%.</p>
                            <img src="{{asset('img/voucher-20.jpeg')}}" alt="Giảm giá 20%" class="border">
                        @elseif($booking->total_person >= 3)
                            <p class="font-weight-bold mb-3 fs-20">3 người tham gia trở lên bạn nhận được phiếu giảm giá 15%.</p>
                            <img src="{{asset('img/voucher-15.jpeg')}}" alt="Giảm giá 15%" class="border">
                        @endif
                    </div>
                    <div class="border p-3">
                        <p class="font-weight-bold mb-3 fs-20">{{$tour->title}}</p>
                        <div class="py-3 border-top border-bottom">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0 font-weight-bold">Giá</p>
                                <p class="mb-0 font-weight-bold"><span class="text-danger">{{number_format($tour->price)}} <sup>đ</sup></span></p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0 font-weight-bold">Tạm tính</p>
                                <p class="mb-0 font-weight-bold"><span class="text-danger">{{number_format($totalTemps)}} <sup>đ</sup></span></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-0 font-weight-bold">voucher giảm giá</p>
                                <p class="mb-0 font-weight-bold"><span class="text-black-50">- {{number_format($voucher)}} <sup>đ</sup></span></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3">
                            <p class="mb-0 font-weight-bold">Tổng tiền</p>
                            <p class="mb-0 font-weight-bold"><span class="text-danger">{{number_format($totalPrice)}} <sup>đ</sup></span></p>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning btn-md text-white w-50 my-3" id="btn-booking">Đặt Tour</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row" hidden>
            @if($booking)
                <form class="right-sidebar__item__form" action="{{route('backend.booking.store')}}" id="form-booking"
                      method="post">
                    @csrf
                    <input type="text" name="name" value="{{$booking->name}}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>

                    <input type="email" name="email" value="{{$booking->email}}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>

                    <input type="text" name="phone_number" value="{{$booking->phone_number}}">
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>

                    <input type="text" name="address" value="{{$booking->address}}">
                    <span class="text-danger">{{ $errors->first('address') }}</span>

                    <input type="number" name="total_person" value="{{$booking->total_person}}">
                    <span class="text-danger">{{ $errors->first('total_person') }}</span>

                    <input type="number" name="total_price" value="{{$totalPrice}}">
                    <span class="text-danger">{{ $errors->first('total_price') }}</span>

                    <input type="number" name="customer_id" value="{{$booking->customer_id}}">
                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>

                    <input type="number" name="tour_id" value="{{$booking->tour_id}}">
                    <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                </form>
            @endif
        </div>
    </div>


</section>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#btn-booking').on('click', function() {
                $('#form-booking').submit();
            });
        });
    </script>
@endpush
