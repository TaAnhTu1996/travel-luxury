@extends('layouts.admin')
@section('title', 'Cấu hình trang web')
@section('content')
@php
$auth = Auth::user();
@endphp
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cấu hình trang web
                </h3>
            </div>
        </div>
        @if($auth->hasPermission(PMS_USER_STORE))
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('backend.setting.create')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Thêm cấu hình</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <div class="m-portlet__body">
        <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
                <div class="table-responsive">
                    <table class="table table-striped m-table" id="settings-table">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Giới thiệu</th>
                                <th>Email</th>
                                <th>Ảnh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                @if($auth->hasPermission(PMS_USER_EDIT))
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
                            @foreach ($settings as $key => $setting)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$setting->information}}</td>
                                <td>{{$setting->email}}</td>
                                <td>
                                    <img src="/img/{{$setting->logo}}" alt="{{$setting->information}}" width="200" height="auto">
                                </td>
                                <td>{{$setting->phone_number}}</td>
                                <td>{{$setting->address}}</td>
                                @if($auth->hasPermission(PMS_USER_EDIT))
                                <td>
                                    <a href="{{route('backend.setting.edit',$setting->id)}}">
                                        <button title="Edit" class="btn btn-outline-warning m-btn m-btn--icon btn-sm    m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                @endif
                                @if($auth->hasPermission(PMS_USER_DESTROY))
                                <td>
                                    <form action="{{route('backend.setting.destroy',$setting->id)}}" method="post" onclick="return confirm('Bạn có muốn xóa?')">
                                        @csrf
                                        @method("DELETE")
                                        <button title="Delete" class="btn btn-outline-danger m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
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
