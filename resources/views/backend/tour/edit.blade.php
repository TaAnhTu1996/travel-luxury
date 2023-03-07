@extends('layouts.admin')
@section('title', 'Danh sách Tour')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Cập nhật Tour
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
                        <form action="{{route('backend.tour.update',$editTour->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tiêu đề</label>
                                        <input type="text" name="title" placeholder="Nhập tên" value="{{ $editTour->title }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá</label>
                                        <input type="number" name="price" placeholder="Nhập giá" value="{{ $editTour->price }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lịch trình</label>
                                        <input type="text" name="schedule" placeholder="Nhập lịch trình" value="{{ $editTour->schedule }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('schedule') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Điểm xuất phát</label>
                                        <input type="text" name="departure_from" placeholder="Nhập điểm xuất phát" value="{{ $editTour->departure_from }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('departure_from') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Điểm đến</label>
                                        <input type="text" name="destination" placeholder="Nhập điểm đến" value="{{ $editTour->destination }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('destination') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Khởi hành</label>
                                        <input type="text" name="start" placeholder="Nhập khởi hành" value="{{ $editTour->start }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('start') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Giới thiệu</label>
                                        <textarea name="introduce" class="form-control description">{{ $editTour->introduce }}</textarea>
                                        <span class="text-danger">{{ $errors->first('introduce') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ảnh</label>
                                        <img src="/img/tours/{{$editTour->image}}" alt="{{$editTour->title}}" width="200" height="auto" class="d-block">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        <input type="file" name="image_new" class="form-control">
                                        <span class="text-danger">{{ $errors->first('image_new') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vùng miền</label>
                                        <select name="region_id" class="form-control" >
                                            @foreach ($regions as $region)
                                                <option value="{{$region->id}}" {{$region->id == $editTour->region_id ? 'selected' : ''}}>{{$region->name}}</option>
                                            @endforeach
                                            <span class="text-danger">{{ $errors->first('region_id') }}</span>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{route('backend.tour.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
