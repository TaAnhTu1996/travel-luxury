@extends('layouts.admin')
@section('title', 'Bookings')
@push('styles')
    <style>
        #bookings-table .status-booking {
            font-size: 1em;
            font-weight: bold;
            color: white;
            padding: .35em .65em;
        }
    </style>
@endpush
@section('content')
    @php
        $auth = Auth::user();
    @endphp
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Bookings
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <div class="table-responsive">
                        <table class="table table-striped m-table" id="bookings-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Số người tham gia</th>
                                <th>Tổng giá tiền</th>
                                <th>Tour</th>
                                <th>Trạng thái</th>
                                @if($auth->hasPermission(PMS_USER_EDIT))
                                    <th>Thanh toán</th>
                                    <th>Kết thúc</th>
                                    <th>
                                        Sửa
                                    </th>
                                @endif
                                @if($auth->hasPermission(PMS_USER_DESTROY))
                                    <th>
                                        Xóa
                                    </th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookings as $key => $booking)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$booking->name}}</td>
                                    <td>{{$booking->email}}</td>
                                    <td>{{$booking->phone_number}}</td>
                                    <td>{{$booking->address}}</td>
                                    <td>{{$booking->total_person}}</td>
                                    <td>
                                        <span class="text-danger">{{number_format($booking->total_price)}}</span>
                                    </td>
                                    <td>{{$booking->tour->title}}</td>
                                    <td>
                                        @if($booking->status === BOOKING_PENDING)
                                            <span class="badge rounded-pill bg-warning status-booking">Đang chờ</span>
                                        @elseif($booking->status === BOOKING_ACCEPTED)
                                            <span class="badge rounded-pill bg-success status-booking">Thanh toán thành công</span>
                                        @elseif($booking->status === BOOKING_REJECTED)
                                            <span class="badge rounded-pill bg-danger status-booking">Hủy bỏ</span>
                                        @else
                                            <span class="badge rounded-pill bg-info status-booking">Kết thúc</span>
                                        @endif
                                    </td>
                                    @if($auth->hasPermission(PMS_USER_EDIT))
                                        <td>
                                            @if($booking->status === BOOKING_ACCEPTED || $booking->status === BOOKING_FINISHED)
                                                <p class="text-success">đã thanh toán</p>
                                            @else
                                                <a href="{{route('backend.booking.mail-tour-success', $booking->id)}}"
                                                   onclick="return confirm('Bạn muốn gửi mail thông báo đặt Tour thành công')">
                                                    <button title="BOOKING SUCCESS"
                                                            class="btn btn-outline-success m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                                        <i class="far fa-paper-plane"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($booking->status === BOOKING_ACCEPTED)
                                                <a href="{{route('backend.booking.mail-tour-finish', $booking->id)}}"
                                                   onclick="return confirm('Bạn muốn gửi mail thông báo kết thúc Tour')">
                                                    <button title="BOOKING FINISH"
                                                            class="btn btn-outline-info m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                                        <i class="far fa-envelope"></i>
                                                    </button>
                                                </a>
                                            @elseif($booking->status === BOOKING_FINISHED)
                                                <p class="text-success">đã kết thúc tour</p>
                                            @else
                                                <p class="text-warning">đang chờ</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('backend.booking.edit',$booking->id)}}">
                                                <button title="Edit"
                                                    class="btn btn-outline-warning m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>
                                    @endif
                                    @if($auth->hasPermission(PMS_USER_DESTROY))
                                        <td>
                                            <form action="{{route('backend.booking.destroy',$booking->id)}}"
                                                  method="post"
                                                  onclick="return confirm('Bạn có muốn xóa?')">
                                                @csrf
                                                @method("DELETE")
                                                <button title="Delete"
                                                        class="btn btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
