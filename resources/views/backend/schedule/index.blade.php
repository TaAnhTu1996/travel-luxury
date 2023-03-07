@extends('layouts.admin')
@section('title', 'Lịch trình')
@section('content')
@php
$auth = Auth::user();
@endphp
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Lịch trình
                </h3>
            </div>
        </div>
        @if($auth->hasPermission(PMS_USER_STORE))
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a href="{{route('backend.schedule.create')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Thêm lịch trình</a>
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
                    <table class="table table-striped m-table" id="schedules-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Tour</th>
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
                            @foreach ($schedules as $key => $schedule)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$schedule->title}}</td>
                                <td>{{$schedule->getTour->title}}</td>
                                @if($auth->hasPermission(PMS_USER_EDIT))
                                <td>
                                    <a href="{{route('backend.schedule.edit',$schedule->id)}}">
                                        <button title="Edit" class="btn btn-outline-warning m-btn m-btn--icon btn-sm    m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                @endif
                                @if($auth->hasPermission(PMS_USER_DESTROY))
                                <td>
                                    <form action="{{route('backend.schedule.destroy',$schedule->id)}}" method="post" onclick="return confirm('Bạn có muốn xóa')">
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
