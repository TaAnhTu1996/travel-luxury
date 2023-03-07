@extends('layouts.admin')
@section('title', 'Bình luận')
@section('content')
@php
$auth = Auth::user();
@endphp
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Bình luận
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin::Section-->
        <div class="m-section">
            <div class="m-section__content">
                <div class="table-responsive">
                    <table class="table table-striped m-table" id="comments-table">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Khách hàng</th>
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
                            @foreach ($comments as $key => $comment)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->customer->name}}</td>
                                <td>{{$comment->tour->title}}</td>
                                @if($auth->hasPermission(PMS_USER_EDIT))
                                <td>
                                    <a href="{{route('backend.comment.edit',$comment->id)}}">
                                        <button title="Edit" class="btn btn-outline-warning m-btn m-btn--icon btn-sm    m-btn--icon-only m-btn--pill m-btn--air">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                @endif
                                @if($auth->hasPermission(PMS_USER_DESTROY))
                                <td>
                                    <form action="{{route('backend.comment.destroy',$comment->id)}}" method="post" onclick="return confirm('Bạn có muốn xóa?')">
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
