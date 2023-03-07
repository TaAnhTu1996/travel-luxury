@extends('layouts.admin')
@section('title', 'Bảng điều khiển Luxury Travel')
@push('styles')
    <style>
        .info-box {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            border-radius: .25rem;
            background: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: 0.6rem;
            position: relative;
        }

        .info-box .elevation-1 {
            box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)!important;
        }

        .info-box .info-box-icon {
            border-radius: .25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }

        .info-box .info-box-icon .icon {
            font-size: 2.5rem;
        }

        .bg-danger, .bg-warning > a {
            color: #1f2d3d!important;
        }

        .bg-danger, .bg-danger > a {
            color: #fff !important;
        }

        .bg-danger, .bg-info > a {
            color: #fff !important;
        }

        .bg-danger, .bg-success > a {
            color: #fff !important;
        }

        .bg-danger {
            background-color: #dc3545 !important;
        }

        .bg-info {
            background-color: #17a2b8 !important;
        }

        .bg-success {
            background-color: #28a745 !important;
        }

        .bg-warning {
            background-color: #ffc107 !important;
        }

        .info-box .info-box-content {
            -ms-flex: 1;
            flex: 1;
            padding: 5px 10px;
        }

        .info-box .info-box-text {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 1.3rem;
        }

        .info-box .info-box-number {
            display: block;
            font-weight: 700;
            font-size: 1.3rem;
        }
    </style>
@endpush
@section('content')
    <h3 class="mb-4">
        Bảng điều khiển Luxury Travel
    </h3>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                    <a href="#"><i class="fas fa-users icon"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Quản trị viên</span>
                    <span class="info-box-number">{{$users}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <a href="#"><i class="m-menu__link-icon flaticon-map-location icon"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Vùng miền</span>
                    <span class="info-box-number">{{$regions}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1">
                    <a href="#"><i class="m-menu__link-icon flaticon-map icon"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Tours</span>
                    <span class="info-box-number">{{$tours}}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1">
                    <a href="#"><i class="fa fa-list-alt icon"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Bookings</span>
                    <span class="info-box-number">{{$bookings}}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Khách hàng đã đăng ký
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <div class="table-responsive">
                        <table class="table table-striped m-table" id="customers-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Thời gian tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($totalCustomer as $key => $customer)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone_number}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->created_at}}</td>
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
