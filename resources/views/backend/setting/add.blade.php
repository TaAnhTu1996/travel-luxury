@extends('layouts.admin')
@section('title', 'Cấu hình trang web')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Thêm cấu hình
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
                        <form action="{{route('backend.setting.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Giới thiệu</label>
                                <input type="text" name="information" placeholder="Nhập giới thiệu" class="form-control">
                                <span class="text-danger">{{ $errors->first('information') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" placeholder="Nhập email" class="form-control">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="logo" placeholder="Nhập ảnh" class="form-control">
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="phone_number" placeholder="Nhập số điện thoại" class="form-control">
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" placeholder="Nhập địa chỉ" class="form-control">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Tạo</button>
                                <a href="{{route('backend.setting.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
