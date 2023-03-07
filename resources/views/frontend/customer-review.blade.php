@extends('layouts.frontend')
@section('title', 'Đánh giá của khách hàng')
@push('styles')
    <style>
        body {
            padding-right: 0 !important;
        }

        .modal .modal-content .modal-header .close:before {
            content: "";
        }
        .modal .modal-content .modal-header .close span {
            display: block;
        }

        .travel-review-custom .section-tittle-2 h2 {
            font-size: 25px;
            margin-bottom: 30px;
            color: #0968e3;
            font-weight: bold;
            font-family: monospace !important;
            letter-spacing: -1px;
        }

        .travel-review-custom .section-tittle-2 h2 a {
            font-size: 14px;
            text-transform: lowercase;
        }

        .travel-review-custom .section-tittle__line-under {
            bottom: -15px;
        }

    </style>
@endpush
@section('content')
    <section class="my-5">
        <div class="container d-flex justify-content-between my-5">
            <div class="section-tittle-2">
                <p>Đánh giá từ khách hàng</p>
                <div class="section-tittle__line-under"></div>
            </div>
            @if($customerCheck)
                @foreach($reviews as $key => $review)
                    <div class="modal fade" tabindex="-1" role="dialog" id="review-{{$review->id}}"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật trải nghiệm Tour</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-center text-warning my-3 font-weight-bold">{{$review->tour->title}}</h4>
                                    <form action="{{route('frontend.customer-review.update', $review->id)}}" method="post"
                                          enctype="multipart/form-data" id="update-review">
                                        {{ csrf_field() }}
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Tiêu đề:</label>
                                            <input type="text" class="form-control title-review" name="title"
                                                   placeholder="Nhập tiêu đề">
                                            <span class="text-danger check-error">{{ $errors->first('title') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class="col-form-label">Nội dung:</label>
                                            <textarea class="form-control message-review" name="message"
                                                      rows="10"></textarea>
                                            <span class="text-danger check-error">{{ $errors->first('message') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-form-label">Ảnh chụp tại Tour:</label>
                                            <div class="image-review-{{$review->id}}"></div>
                                            <input type="file" class="form-control" name="image_new[]"
                                                   multiple>
                                            <span class="text-danger check-error">{{ $errors->first('image_new') }}</span>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="tour" class="col-form-label">Tour:</label>
                                            <input type="number" class="form-control tour-review" name="tour_id">
                                        </div>
                                        <div class="form-group" hidden>
                                            <label for="customer" class="col-form-label">Customer:</label>
                                            <input type="number" class="form-control customer-review" name="customer_id">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-outline-warning btn-update-review" ref="{{$review->id}}">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        @foreach($reviews as $key => $review)
            <div class="travel-review-luxury-area container mt-4 pt-3">
                <div class="row {{$key % 2 === 0 ? 'flex-row-reverse' : ''}}">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="travel-review-custom">
                            <div class="section-tittle-2">
                                <h2>{{$review->tour->title}} <a href="{{route('frontend.tour-detail', $review->tour->id)}}" class="text-warning">( Xem tour ngay )</a></h2>
                                <div class="section-tittle__line-under"></div>
                            </div>
                            <div class="p-3 rounded shadow border">
                                <h5 class="font-weight-bold">{{$review->title}}</h5>
                                <p class="travel-review__content">
                                    {{$review->message}}
                                </p>
                                <div class="d-flex justify-content-between mt-3">
                                    @if($customerCheck)
                                        @if($review->customer->id == $customer->id)
                                            <div class="action-review">
                                                <form action="{{route('frontend.customer-review.edit', $review->id)}}"
                                                      class="d-inline-block">
                                                    <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Sửa đánh giá" class="text-warning review-edit"
                                                       data-toggle="modal"
                                                       data-target="#review-{{$review->id}}" ref="{{$review->id}}"><i
                                                            class="fas fa-edit"></i></a>
                                                </form>
                                                <form action="{{route('frontend.customer-review.destroy', $review->id)}}"
                                                      method="post" onclick="return confirm('you want to delete')"
                                                      class="d-inline-block">
                                                    @csrf
                                                    @method("DELETE")
                                                    <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Xóa đánh giá" class="text-warning">
                                                        <i class="fas fa-eraser"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <span></span>
                                    @endif
                                    <p class="font-weight-bold text-black-50">
                                        <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Tác giả" class="text-warning">
                                            <i class="fas fa-user-tag"></i>
                                        </a> {{$review->customer->name}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="tour-content-img">
                            @foreach($images[$key] as $keyImg => $image)
                                <p class="{{$keyImg == 0 ? 'img-1' : 'overflow-hidden position-relative mb-0'}}">
                                    <a href="" class="{{$keyImg != 0 ? 'thumb-item thumb-5x3 mt-3' : ''}}">
                                        <img src="img/customer-review/{{$image}}" alt="">
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

            $('.btn-update-review').click(function () {
                $('#update-review').submit();
            });

            $(document).on('click', '.review-edit', function() {
                const form = $(this).parent().attr('action');
                const id = $(this).attr('ref');
                $('#review-' + id).modal('show');

                if($('#review-' + id).modal('hide')) {
                    $('.image-review-' + id).empty();
                }

                $.ajax({
                    type: 'GET',
                    url: form,
                    success: function(res) {
                        const images = res.data.image;
                        $('.title-review').val(res.data.title);
                        $('.message-review').val(res.data.message);
                        $.each(JSON.parse(images), function( index, image ) {
                            $('.image-review-' + id).append('<img src="img/customer-review/' + image + '" class="w-25 pr-3" />');
                        });
                        $('.customer-review').val(res.data.customer_id);
                        $('.tour-review').val(res.data.tour_id);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('.show-posts').prop("disabled", false).html('');
                        console.log(textStatus, errorThrown);
                    }
                });
            });

            $('[data-tooltip="tooltip"]').tooltip();
        });
    </script>
@endpush
