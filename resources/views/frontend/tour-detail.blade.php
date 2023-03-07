@extends('layouts.frontend')
@section('title', $tourDetail->title)
@push('styles')
<style>
    html {
        scroll-behavior: smooth;
    }

    section[id] {
        scroll-margin-top: 50px;
    }

    .breadcrumb-head h4 {
        font-family: "Open Sans", sans-serif;
        font-size: 13px;
    }

    .breadcrumb-head a {
        color: #0099cb;
        text-decoration: none;
    }

    .title-block {
        margin: 20px 0;
        border-left: 3px solid #0998c8;
        padding: 5px 0 5px 10px;
        color: #00506c;
    }

    .tooltip-css {
        color: #ffc600;
    }

    .tour-infomation__content {
        position: relative;
    }

    .tour-infomation__content .nav-fixed {
        line-height: 30px;
        background: #fff;
        color: #fff;
        position: sticky;
        width: 100%;
        top: 0;
        z-index: 10;
        margin: 30px 0;
    }

    .btn-info {
        background-color: #1192f6 !important;
        border-color: #1192f6 !important;
    }

    .slick-dots {
        transform: translate(0%, 0) !important;
        right: 0;
        left: 0;
        margin-top: 10px;
    }

    .nav-tabs .nav-link.active {
        /* border-bottom: 2px solid orangered !important; */
        background-color: #02020200;
        border-color: white;
    }

    .main-timeline {
        overflow: hidden;
        position: relative;
    }

    .main-timeline:before {
        content: "";
        display: block;
        width: 100%;
        clear: both;
        content: "";
        width: 1px;
        height: 100%;
        background: #0998c8;
        position: absolute;
        top: 30px;
        left: 15px;
    }

    .main-timeline:after {
        content: "";
        display: block;
        width: 100%;
        clear: both;
    }

    .main-timeline .timeline {
        width: 100%;
        float: left;
        padding-right: 30px;
        position: relative;
    }


    .main-timeline .timeline-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #ffffff;
        border: 3px solid #0998c8;
        position: absolute;
        top: 0;
        left: 0;
    }

    .main-timeline .timeline-content {
        padding: 5px 10px;
        margin: 0 45px 0 35px;
    }

    .main-timeline .title {
        font-size: 19px;
        font-weight: bold;
        color: #504f54;
        margin: 0 0 10px 0;
    }

    .main-timeline .description {
        font-size: 14px;
        color: #7d7b7b;
        margin: 0;
        text-align: justify;
    }
</style>
@endpush
@php
    use Carbon\Carbon;
    Carbon::setLocale('vi');
@endphp
@section('content')
<div class="container breadcrumb-head">
    <h4 class="mt-4"><a href="{{route('frontend.home')}}">Trang chủ</a> / <a href="{{route('frontend.tour-list', $tourDetail->regions->id)}}">{{$tourDetail->regions->name}}</a> / <span> {{$tourDetail->title}}</span></h4>
</div>
<section class="tour-infomation-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <aside>
                    <div class="tour-infomation__content">
                        <div class="tour-infomation__content__header">
                            <h2>{{$tourDetail->title}}</h2>
                            <span class="trending-tour-item__group-infor__rating"></span>
                            <span>({{$tourDetail->review->count()}} đánh giá)</span>
                            <div class="tour-infomation__content__header__icon ">

                                <p><i class="fas fa-home"></i> <span class="ml-2">{{$tourDetail->departure_from}}</span></p>
                                <p><i class="fas fa-map-marked-alt"></i> <span class="ml-2">{{$tourDetail->destination}}</span></p>
                                <p><i class="fas fa-clock"></i> <span class="ml-2">{{$tourDetail->schedule}}</span></p>
                                <p><i class="fas fa-calendar-alt"></i> <span class="ml-2">{{$tourDetail->start}}</span></p>

                            </div>
                        </div>

                        <div class="slider slider-for">
                            @foreach($images as $image)
                            <div>
                                <p class="thumb-img rounded">
                                    <span class="thumb-item thumb-5x3">
                                        <img src="/img/region/{{$image}}" class="" alt="">
                                    </span>
                                </p>
                            </div>
                            @endforeach
                        </div>

                        <div class="slider slider-nav mx-n1 mt-2">
                            @foreach($images as $image)
                            <div class="px-1">
                                <p class="thumb-img rounded">
                                    <span class="thumb-item thumb-5x3">
                                        <img src="/img/region/{{$image}}" class="" alt="">
                                    </span>
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <!--end  gallery-syncing-item -->
                        <div class="my-5 nav-tab-main">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tab-main-custom">
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#information">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#schedule">Lịch trình</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#comment">Bình luận</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#review">Đánh giá</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link page-scroll" href="#similar-tour">Chuyến tham quan tương tự</a>
                                </li>
                            </ul>
                        </div>

                        <!--start  information -->
                        <section class="tour-infomation__content__descript" id="information">
                            <h2 class="title-block">Giới thiệu</h2>
                            <p>{!! $tourDetail->introduce !!}</p>
                        </section>
                        <!--end  information -->

                        <!--start  schedule -->
                        <section class="tour-infomation__content__schedule" id="schedule">
                            <h2 class="title-block">Lịch trình</h2>
                            <div class="main-timeline my-4">
                                @foreach($schedules as $schedule)
                                <div class="timeline mb-5">
                                    <span class="timeline-icon"></span>
                                    <div class="timeline-content">
                                        <h3 class="title">{{$schedule->title}}</h3>
                                        <p class="description">{!! $schedule->content !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                        <!--end  schedule -->

                        <!--start  comment -->
                        <section class="blog-comment" id="comment">
                            <div class="blog-comment-box">
                                <h5 class="title-block">Bình luận ({{$comments->count()}})</h5>
                                @foreach($comments as $comment)
                                <div class="blog-comment-box__item my-3 d-flex">
                                    <div class="blog-comment-box__item__avatar">
                                        <img src="https://ui-avatars.com/api/?name={{$comment->name}}" alt="comment">
                                    </div>
                                    <div class="blog-comment-box__item__comment pt-3">
                                        <span>{{$comment->name}}</span>
                                        <span>({{$comment->created_at->diffForHumans()}})</span>
                                        <p>{{$comment->content}}</p>
                                        @if($customerCheck)
                                        @if($comment->customer->id == $customer->id)
                                        <form action="{{route('frontend.comment.edit',$comment->id)}}" class="d-inline-block">
                                            <a data-tooltip="tooltip" data-placement="top" title="Sửa bình luận" class="comment-edit tooltip-css" ref="{{$comment->id}}" data-toggle="collapse" href="#comment-edit-{{$comment->id}}"><i class="fas fa-edit"></i></a>
                                        </form>
                                        <form action="{{route('frontend.comment.destroy',$comment->id)}}" method="post" onclick="return confirm('Bạn có muốn xóa?')" class="d-inline-block">
                                            @csrf
                                            @method("DELETE")
                                            <a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Xóa bình luận" class="tooltip-css">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        </form>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>

                        <div class="tour-infomation__content__write-comment">
                            <h4 class="border-top py-3 border-dark">Để lại bình luận của bạn</h4>
                            @if(!$customerCheck)
                            <a href="{{route('customer.login')}}" class="btn btn-warning w-50 text-white">Khách hàng cần đăng nhập để bình luận</a>
                            @else
                            <form action="{{route('frontend.comment.store')}}" method="post" id="form-comment">
                                @csrf
                                <div>
                                    <input type="text" name="name" value="{{$customer->name}}" readonly>
                                    <input type="email" name="email" value="{{$customer->email}}" readonly>
                                    <input type="number" name="customer_id" value="{{$customer->id}}" hidden>
                                </div>
                                <input type="number" name="tour_id" value="{{$tourDetail->id}}" hidden>
                                <textarea name="content" cols="30" rows="8" placeholder="Phản hồi của bạn *" required></textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                <input type="submit" value="Gửi">
                            </form>
                            @if(isset($comment))
                            <form action="{{route('frontend.comment.update', $comment->id)}}" method="post" id="comment-edit-{{$comment->id}}" class="collapse">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div>
                                    <input type="text" name="name" id="name-comment">
                                    <input type="email" name="email" id="email-comment">
                                    <input type="number" name="customer_id" id="customer-comment" hidden>
                                </div>
                                <input type="number" name="tour_id" id="tour-comment" hidden>
                                <textarea name="content" cols="30" rows="8" id="content-comment" placeholder="Phản hồi của bạn *" required></textarea>
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                <input type="submit" value="Cập nhật">
                            </form>
                            @endif
                            @endif
                        </div>
                        <!--end  comment -->

                        <!--start  review -->
                        <section class="slide-main" style=" z-index: 1 " id="review">
                            <h5 class="title-block">Đánh giá ({{$tourDetail->review->count()}})</h5>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($tourDetail->review as $key => $review)
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                        <div class="customer-comment">
                                            <h4 class=" font-weight-bold text-info pb-3"><i class="fas fa-comment-alt mr-3" style="font-size: 29px;"></i>{{$review->title}}</h4>
                                            <p class="block-message d-inline">{{$review->message}}</p><a href="{{route('frontend.blog-review', $review->id)}}" class="btn-link"> ( Xem chi tiết )</a>
                                            <div class="d-flex justify-content-between align-items-center pt-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="customer-avatar d-flex text-dark">
                                                        <img src="https://ui-avatars.com/api/?name={{$review->customer->name}}" class="thumb" alt="{{$review->customer->name}}">
                                                    </div>
                                                    <p class="text-nowrap pl-3 text-info">{{$review->customer->name}}</p>
                                                </div>
                                                <div class="col-7 px-0 text-right">
                                                    <a href="javascript:;">{{$review->tour->title}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="position-relative review-customer-control w-100 mt-4">
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="" aria-hidden="true"><i class="fas fa-chevron-left text-dark"></i></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="" aria-hidden="true"> <i class="fas fa-chevron-right text-dark"></i></span>
                                    </a>
                                </div>

                            </div>
                        </section>
                        <!--end  review -->

                    </div>
                </aside>
            </div>
            <div class="col-lg-4 sidebar-custom-section">
                <div class="sidebar-custom" id="sidebar-custom">
                    <div class="sidebar__inner">
                        <div class="border p-3">
                            <img src="{{asset('img/tours/' . $tourDetail->image)}}" alt="">
                            <h5 class="py-3 mb-0">{{$tourDetail->title}}</h5>
                            <p class="border-bottom pb-3">
                                <a data-tooltip="tooltip" data-placement="top" title="Lịch trình" href="javascript:;" class="tooltip-css"><i class="fas fa-calendar-alt mr-2"></i></a> {{$tourDetail->schedule}}
                            </p>
                            <p class="pt-3">
                                <a data-tooltip="tooltip" data-placement="top" title="Khách hàng" href="javascript:;" class="tooltip-css"><i class="fas fa-user mr-2"></i></a> {{$buyTour}} khách hàng trải nghiệm
                            </p>
                            <p class="pt-2"><span>Giá từ : </span><span class="fs-25 text-warning">{{number_format($tourDetail->price)}}<sup>đ</sup></span> /khách</p>
                        </div>

                        <!--start  form infomation -->
                        <div class="sidebar mt-4">
                            <div class="right-sidebar">
                                <div class="right-sidebar__item">
                                    @if($customerCheck)
                                    <h3 class="bg-warning"><strong class="right-sidebar__item__from text-white">Thông tin khách hàng</strong></h3>

                                    <form class="right-sidebar__item__form border" action="{{route('frontend.session-booking')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <label for="name" class="form-label">Tên *</label>
                                            <input type="text" name="name" class="form-control" id="name">
                                            <span class="text-danger name-error error-action"></span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="email" class="form-label">Email *</label>
                                            <input type="email" name="email" class="form-control" id="email">
                                            <span class="text-danger email-error error-action"></span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="phone_number" class="form-label">Số điện thoại *</label>
                                            <input type="text" name="phone_number" class="form-control" id="phone_number">
                                            <span class="text-danger phone_number-error error-action"></span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="address" class="form-label">Địa chỉ *</label>
                                            <input type="text" name="address" class="form-control" id="address">
                                            <span class="text-danger address-error error-action"></span>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="total_person" class="form-label">Số người tham gia *</label>
                                            <input type="number" name="total_person" class="form-control" id="total_person" placeholder="Nhập số người tham gia tour">
                                            <span class="text-danger total_person-error error-action"></span>
                                        </div>
                                        <div class="form-group mb-0" hidden>
                                            <input type="number" name="customer_id" value="{{$customer->id}}" class="form-control" id="customer_id">
                                            <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                                        </div>
                                        <div class="form-group mb-0" hidden>
                                            <input type="number" name="tour_id" value="{{$tourDetail->id}}" class="form-control" id="tour_id">
                                            <span class="text-danger">{{ $errors->first('tour_id') }}</span>
                                        </div>
                                        <div class="w-100 text-center mt-3">
                                            <a class="btn btn-info btn-sm btn-new" href="javascript:;">
                                                Nhập thông tin mới
                                            </a>
                                            <a class="btn btn-info btn-sm btn-default" href="javascript:;">
                                                Thông tin từ tài khoản dăng nhập
                                            </a>
                                        </div>
                                        <a href="javascript:;" class="btn btn-warning d-block text-uppercase text-white my-3 btn-booking">Đặt tour ngay</a>
                                    </form>
                                    @else

                                    <a href="{{route('customer.login')}}" class="btn btn-warning d-block text-uppercase mt-3 text-white">Đăng nhập để đặt tour</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end  form infomation -->

            </div>
        </div>
    </div>

    <!--start  similar-tour -->
    <div class="similar-tour" id="similar-tour">
        <div class="container">
            <div class="tour-infomation__content__descript">
                <h2 class="title-block">Chuyến tham quan tương tự</h2>
            </div>
            <div class="row tour-list">
                @foreach($similarTours as $similarTour)
                <div class="col-lg-4 col-sm-6 col-12 tour-list-item">
                    <a href="{{route('frontend.tour-detail', $similarTour->id)}}" class="trending-tour-item tour-list-item-detail">
                        <div class="trending-tour-item__img">
                            <img class="trending-tour-item__thumnail" src="{{asset('img/tours/' . $similarTour->image)}}" alt="{{$similarTour->title}}">
                        </div>
                        <div class="trending-tour-item__info">
                            <h3 class="trending-tour-item__name">
                                {{$similarTour->title}}
                            </h3>
                            <div class="trending-tour-item__group-infor">
                                <div class="trending-tour-item__group-infor--left">
                                    <div class="trending-tour-item__group-infor__lasting">
                                        <i class="far fa-calendar-check"></i> {{$similarTour->schedule}}
                                    </div>
                                </div>
                                <div class="trending-tour-item-price">
                                    {{--<p class="trending-tour-item__group-infor__sale-price">$999</p>--}}
                                    <span class="trending-tour-item__group-infor__price">{{number_format($similarTour->price)}} <sup>đ</sup></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!--end  similar-tour -->
    <form action="{{route('frontend.tour-detail', $tourDetail->id)}}" method="GET" class="d-none" id="get-information"></form>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js"></script>
<script type="text/javascript">
    var sidebar = new StickySidebar('#sidebar-custom', {
        containerSelector: '.sidebar-custom-section',
        innerWrapperSelector: '.sidebar__inner',
        topSpacing: 20,
        bottomSpacing: 20
    });
</script>
<!-- <script>
    $(document).ready(function() {
        $('.drop-content').slideUp(); /*ẩn nội dung*/

        $('.drop').on('click', function(event) {
            // ngăn chặn mặc định
            event.preventDefault();
            // đóng/ mở
            // $('.noi-dung').slideUp(); /*ẩn nội dung*/
            $(this).next().slideToggle();

            // $(this).offset().top lấy vị trí của phần tử this

            $('html, body').animate({
                scrollTop: $(this).offset().top
            }, 400);
        });
    });
</script> -->
<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll > 750) {
                $(".nav-tab-main-custom").css("background", "#2f4d73");
            } else {
                $(".nav-tab-main-custom").css("background", "white");
            }
        })
    });

    $(function() {
        $(document).on('click', '.comment-edit', function() {
            const form = $(this).parent().attr('action');
            $('#form-comment').hide();
            $.ajax({
                type: 'GET',
                url: form,
                success: function(res) {
                    $('#name-comment').val(res.editComment.name);
                    $('#email-comment').val(res.editComment.email);
                    $('#content-comment').val(res.editComment.content);
                    $('#customer-comment').val(res.editComment.customer_id);
                    $('#tour-comment').val(res.editComment.tour_id);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('.nav-tabs .nav-link').on('click', function() {
            $('.nav-tabs .nav-link').removeClass('active');
            $(this).addClass('active');
        });

        $(window).scroll(function(event) {
            var scroll = $(window).scrollTop();

            if (scroll > 850) {
                $('.tour-infomation__content ul').addClass('nav-fixed');
            } else {
                $('.tour-infomation__content ul').removeClass('nav-fixed');
            }
        });

        $('#get-information').submit(function(e) {
            e.preventDefault();
            const form = $(this).attr('action');
            $.ajax({
                type: 'GET',
                url: form,
                success: function(res) {
                    $('input[name="name"]').val(res.data.name).attr('readonly', true);
                    $('input[name="email"]').val(res.data.email).attr('readonly', true);
                    $('input[name="phone_number"]').val(res.data.phone_number).attr('readonly', true);
                    $('input[name="address"]').val(res.data.address).attr('readonly', true);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
        getInformation();

        $('.btn-default').hide();
        $(document).on('click', '.btn-new', function() {
            $(this).hide();
            $('.btn-default').show();
            $('.error-action').html('');
            $('#name').val('').attr('readonly', false).attr("placeholder", "Nhập name");
            $('#email').val('').attr('readonly', false).attr("placeholder", "Nhập email");
            $('#phone_number').val('').attr('readonly', false).attr("placeholder", "Nhập số điện thoại");
            $('#address').val('').attr('readonly', false).attr("placeholder", "Nhập địa chỉ");
        });

        $(document).on('click', '.btn-default', function() {
            $(this).hide();
            $('.btn-new').show();
            $('.error-action').html('');
            getInformation();
        });

        $(document).on('click', '.btn-booking', function() {
            const form = $(this).parent().attr('action');
            $.ajax({
                type: 'POST',
                url: form,
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone_number: $('#phone_number').val(),
                    address: $('#address').val(),
                    total_person: $('#total_person').val(),
                    customer_id: $('#customer_id').val(),
                    tour_id: $('#tour_id').val()
                },
                success: function(res) {
                    if (res.success) {
                        window.location.href = "{{route('frontend.check-out')}}";
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let errors = jqXHR.responseJSON.errors;
                    $('.name-error').html(errors.name);
                    $('.email-error').html(errors.email);
                    $('.phone_number-error').html(errors.phone_number);
                    $('.address-error').html(errors.address);
                    $('.total_person-error').html(errors.total_person);
                    console.log(errors);
                }
            });
        });

        function getInformation() {
            $('#get-information').submit();
        }

        window.onload = function() {
            var message = $('.block-message').html();
            var dots = "...";
            if (message.length > 180) {
                $('.block-message').html(message.substring(0, 180) + dots);
            }
        };
    });
</script>
@endpush
