@extends('layouts.admin')
@section('title', 'Cấu hình trang web')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cập nhật cấu hình
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
                        <form action="{{route('backend.setting.update',$editSetting->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Giới thiệu</label>
                                <input type="text" name="information" placeholder="Nhập giới thiệu" class="form-control" value="{{ $editSetting->information }}">
                                <span class="text-danger">{{ $errors->first('information') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" placeholder="Nhập email" class="form-control" value="{{ $editSetting->email }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="d-block" for="">Ảnh</label>
                                <img src="/img/{{$editSetting->logo}}" alt="{{$editSetting->information}}" width="200" height="auto">
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                <input type="file" name="logo_new" class="form-control">
                                <span class="text-danger">{{ $errors->first('logo_new') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="phone_number" placeholder="Nhập số điện thoại" class="form-control" value="{{ $editSetting->phone_number }}">
                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" placeholder="Nhập địa chỉ" class="form-control" value="{{ $editSetting->address }}">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
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
