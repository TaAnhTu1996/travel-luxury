@extends('layouts.admin')
@section('title', 'Bookings')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cập nhật Booking
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-md-6">
                        <form action="{{route('backend.booking.update',$editBooking->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('PATCH')
                            {{$errors->first()}}
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" placeholder="Nhập tên" class="form-control" value="{{ $editBooking->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Nhập email" class="form-control" value="{{ $editBooking->email }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="phone_number" placeholder="Nhập số điện thoại" class="form-control" value="{{ $editBooking->phone_number }}">
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" placeholder="Nhập địa chỉ" class="form-control" value="{{ $editBooking->address }}">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số người tham gia</label>
                                <input type="number" id="total_person" name="total_person" placeholder="Nhập số người tham gia" class="form-control" value="{{ $editBooking->total_person }}">
                                <span class="text-danger">{{ $errors->first('total_person') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Tổng giá tiền</label>
                                <input type="text" class="form-control total_price_show" value="{{ number_format($editBooking->total_price) }}" disabled>
                                <input hidden type="number" name="total_price" class="form-control total_price_hide" value="{{ $editBooking->total_price }}">
                                <span class="text-danger">{{ $errors->first('total_price') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                                <a href="{{route('backend.booking.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                            </div>
                            <p id="price-tour" hidden>{{$editBooking->tour->price}}</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#total_person').on('change keyup', function() {
                let person = $(this).val();
                const priceTour = $('#price-tour').html();
                let totalTemps = person * priceTour;
                var voucher = 0;

                if (person < 1) {
                    alert('Số người tham gia ít nhất 1 người...!');
                }

                if (person >= 5) {
                    voucher = totalTemps * 20/100;
                } else if (person >= 3) {
                    voucher = totalTemps * 15/100;
                } else {
                    voucher = 0;
                }

                let totalPrice = totalTemps - voucher;
                let total = numberWithCommas(totalPrice);
                $('.total_price_show').val(total);
                $('.total_price_hide').val(totalPrice);
            });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
@endpush
