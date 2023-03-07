@extends('layouts.admin')
@section('title', 'Đánh giá của khách hàng')
@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Cập nhật đánh giá của khách hàng
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
                            <form action="{{route('backend.customer-review.update', $reviewEdit->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text" name="title" placeholder="Nhập tiêu đề" class="form-control" value="{{ $reviewEdit->title }}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Thông điệp</label>
                                    <textarea name="message" class="form-control" cols="5" rows="10">{{ $reviewEdit->message }}</textarea>
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                </div>
                                <div class="form-group w-75">
                                    <label for="" class="d-block">Ảnh</label>
                                    @foreach($images as $image)
                                        <span>
                                            <img src="/img/customer-review/{{$image}}" alt="" width="120" height="100" class="mx-2 my-2">
                                        </span>
                                    @endforeach
                                    <input type="file" name="image_new[]" multiple class="form-control">
                                    <span class="text-danger">{{ $errors->first('image_new') }}</span>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="">Tour</label>
                                    <input type="number" name="tour_id" class="form-control" value="{{ $reviewEdit->tour_id }}">
                                    <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                                </div>
                                <div class="form-group" hidden>
                                    <label for="">Customer</label>
                                    <input type="number" name="customer_id" class="form-control" value="{{ $reviewEdit->customer_id }}">
                                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    <a href="{{route('backend.customer-review.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
