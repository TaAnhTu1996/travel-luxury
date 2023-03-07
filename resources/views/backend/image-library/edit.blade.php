@extends('layouts.admin')
@section('title', 'Thư viện ảnh')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Cập nhật danh sách ảnh
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
                            <form action="{{route('backend.image-library.update', $editLibrary->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control" value="{{ $editLibrary->title }}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="form-group w-75">
                                    <label for="" class="d-block">Ảnh</label>
                                    @foreach($images as $image)
                                        <span>
                                            <img src="/img/region/{{$image}}" alt="" width="120" height="100" class="mx-2 my-2">
                                        </span>
                                    @endforeach
                                    @if ($errors->has('file'))
                                        @foreach ($errors->get('file') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <input type="file" name="file_new[]" multiple class="form-control">
                                    @if ($errors->has('file_new'))
                                        @foreach ($errors->get('file_new') as $error)
                                            <span class="text-danger">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Danh sách tour</label>
                                    <select name="tour_id" class="form-control" >
                                        @foreach ($tours as $tour)
                                            <option value="{{$tour->id}}" {{$tour->id == $editLibrary->tour_id ? 'selected' : ''}}>{{$tour->title}}</option>
                                        @endforeach
                                        <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{route('backend.image-library.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
