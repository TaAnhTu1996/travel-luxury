@extends('layouts.admin')
@section('title', 'Thư viện ảnh')
@section('content')
    @php
        $auth = Auth::user();
    @endphp
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Thư viện ảnh
                    </h3>
                </div>
            </div>
            @if($auth->hasPermission(PMS_USER_STORE))
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{route('backend.image-library.create')}}" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Thêm danh sách ảnh</a>
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
                        <table class="table table-striped m-table" id="librarys-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
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
                            @foreach ($library as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        @foreach($images[$key] as $image)
                                            <span>
                                                <img src="/img/region/{{$image}}" alt="" width="120" height="100" class="mx-2 my-2">
                                            </span>
                                        @endforeach
                                    </td>
                                    <td><strong class="text-info">{{$item->tour->title}}</strong></td>
                                    @if($auth->hasPermission(PMS_USER_EDIT))
                                        <td>
                                            <a href="{{route('backend.image-library.edit',$item->id)}}">
                                                <button
                                                        title="Edit"
                                                        class="btn btn-outline-warning m-btn m-btn--icon btn-sm    m-btn--icon-only m-btn--pill m-btn--air">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </td>
                                    @endif
                                    @if($auth->hasPermission(PMS_USER_DESTROY))
                                        <td>
                                            <form action="{{route('backend.image-library.destroy',$item->id)}}"
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
