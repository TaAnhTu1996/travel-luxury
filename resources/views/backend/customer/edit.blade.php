@extends('layouts.admin')
@section('title', 'Khách hàng')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Sửa tài khoản khách hàng
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
                        <form action="{{route('backend.customer.update',$editCustomer->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" class="form-control" value="{{ $editCustomer->name }}" placeholder="Nhập tên">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $editCustomer->email }}" readonly>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $editCustomer->phone_number }}" placeholder="Nhập số điện thoại">
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{ $editCustomer->address }}" placeholder="Nhập địa chỉ">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới?" autocomplete="new-password">
                                <div class="form-text">Nếu bạn không muốn cập nhật mật khẩu, hãy để trống trường này...!</div>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                                <a href="{{route('backend.customer.index')}}" class="btn btn-info" role="button">Bỏ qua</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
