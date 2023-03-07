@extends('layouts.admin')
@section('title', 'Vùng miền')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Cập nhật vùng miền
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
                            <form action="{{route('backend.region.update',$editRegion->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" name="name" placeholder="Nhập tên" class="form-control" value="{{ $editRegion->name }}" required>
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="" class="d-block">Ảnh</label>
                                    <img src="/img/{{$editRegion->image}}" alt="{{$editRegion->name}}" width="200" height="auto">
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    <input type="file" name="image_new" class="form-control">
                                    <span class="text-danger">{{ $errors->first('image_new') }}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{route('backend.region.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
