@extends('layouts.admin')
@section('title', 'Quản trị viên')
@push('styles')
    <style>
        .role {
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
                        Quản trị viên
                    </h3>
                </div>
            </div>
            @if($auth->hasPermission(PMS_USER_STORE))
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{route('backend.user.create')}}" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Thêm quản trị viên</a>
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
                        <table class="table table-striped m-table" id="users-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
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
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->role_id === ACC_ADMIN)
                                            <span class="badge rounded-pill bg-info role">{{$user->role->name}}</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning role">{{$user->role->name}}</span>
                                        @endif
                                    </td>
                                    @if($auth->hasPermission(PMS_USER_EDIT))
                                        <td>
                                            <a href="{{route('backend.user.edit',$user->id)}}">
                                                <button title="Edit"
                                                        class="btn btn-outline-warning m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>
                                    @endif
                                    @if($auth->hasPermission(PMS_USER_DESTROY))
                                        <td>
                                            <form action="{{route('backend.user.destroy',$user->id)}}"
                                                  method="post"
                                                  onclick="return confirm('bạn có muốn xóa?')">
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
