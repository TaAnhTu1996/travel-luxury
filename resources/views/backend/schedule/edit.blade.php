@extends('layouts.admin')
@section('title', 'Lịch trình')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Cập nhật lịch trình
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
                        <form action="{{route('backend.schedule.update',$editSchedule->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tiêu đề</label>
                                        <input type="text" name="title" placeholder="Nhập tiêu đề" value="{{ $editSchedule->title }}" class="form-control">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Danh sách Tour</label>
                                        <select name="tour_id" class="form-control" >
                                            @foreach ($tours as $tour)
                                                <option value="{{$tour->id}}" {{$editSchedule->tour_id == $tour->id ? 'selected' : ''}}>{{$tour->title}}</option>
                                            @endforeach
                                            <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea name="content" class="form-control description">{{ $editSchedule->content }}</textarea>
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{route('backend.schedule.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
