@extends('layouts.admin')
@section('title', 'Bình luận')
@section('content')
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    Cập nhật bình luận
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
                        <form action="{{route('backend.comment.update',$editComment->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" class="form-control" value="{{ $editComment->name }}" readonly>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $editComment->email }}" readonly>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <textarea name="content" class="form-control" cols="30" rows="5">{{ $editComment->content }}</textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div>
                            <div class="form-group" hidden>
                                <label for="">Khách hàng</label>
                                <input type="number" name="customer_id" class="form-control" value="{{ $editComment->customer_id }}">
                                <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                            </div>
                            <div class="form-group" hidden>
                                <label for="">Tour</label>
                                <input type="number" name="tour_id" class="form-control" value="{{ $editComment->tour_id }}">
                                <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Cập nhật</button>
                                <a href="{{route('backend.comment.index')}}" class="btn btn-info" role="button">Hủy bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
