@extends('layouts.frontend')
@section('title', 'Luxury Travel')
@push('styles')
<style>
    .box-region {
        padding: 10px;
        cursor: pointer;
    }

    .box-region .region-item {
        text-decoration: none;
        color: black;
    }

    .box-region .region-item .region-item__img {
        width: 100%;
        height: auto;
        margin-right: 10px;
    }

    .box-region .region-item .region-item__img img {
        border-radius: 5px;
    }
</style>
@endpush
@section('content')
<section>
    <div class="">
        <div class="mg-background">
            <img src="{{asset('img/269988.jpg')}}" class="thumb" alt="">
            <div class="bg-layer"></div>
        </div>
        <div id="search-tour">
            <div class="justify-content-center mt-n5">
                <div class="col-md-6 mx-auto">
                    <p class="text-white pb-1 text-center " style="font-size: 35px;">Chuẩn bị lên đường thôi!</p>
                    <p class="text-white pb-3 text-center" style="font-size: 18px;">Đặt tour và yên tâm tận hưởng chuyến đi của bạn với sự đồng hành của Luxury Travel</p>
                    <form action="{{route('frontend.search')}}" method="get" id="form-search" class="d-flex">
                        <div class="form-group mb-0 d-flex align-items-center bg-white border rounded py-2 px-3 col-12">
                            <i class="fas fa-map-marker-alt text-blue"></i>
                            <input type="search" name="search" id="search" required class="form-control border-0" placeholder="Bạn muốn đi đâu?">

                        </div>
                        <button class="border-0 bg-darkblue col-3 rounded-right d-none"> <i class="fas fa-search mr-2 fs-16"></i>Tim tour ngay</button>
                    </form>
                    <div class="shadow p-2 bg-white rounded-bottom collapse show-tour ">
                        <div class="title pb-2">
                            <p style="font-size: 16px;"><i class="fas fa-star mr-2 text-warning"></i>Địa điểm nổi bật</p>
                        </div>
                        <div class="show-tour-detail">
                            <div class="row px-3 mt-n2" id="show-region">
                                @foreach($regions as $region)
                                <div class="col-md-6 box-region ">
                                    <a href="{{route('frontend.tour-list', $region->id)}}" class="region-item">
                                        <div class="region-item__img">
                                            <img src="{{asset('img/'. $region->image)}}" alt="{{$region->name}}">
                                        </div>
                                        <div class="">
                                            <span class="font-weight-bold font-14">{{$region->name}}</span>
                                            <span class="font-weight-bold">{{$region->getTour->count()}} tours</span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="row px-3 mt-n2" id="show-tour"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="top-desti__tittle">
            <!-- section tittle -->
            <div class="section-tittle">
                <h2>Danh mục sản phẩm</h2>
                <div class="section-tittle__line-under"></div>
                <p>Vùng Miền</p>
            </div>
        </div>
    </div>

    <div class="top-desti">
        @foreach($regions as $region)
        <a href="{{route('frontend.tour-list', $region->id)}}" class="top-desti__item">
            <div class="top-desti__img">
                <img src="{{asset('img/'. $region->image)}}" alt="{{$region->name}}">
            </div>
            <div class="top-desti__ammout">
                <span>
                    <i class="fas fa-clock"></i> {{$region->name}}
                </span>
                <span>{{$region->getTour->count()}} Tours</span>
            </div>
        </a>
        @endforeach
    </div>
</section>

<section id="col-3-tours">
    <div class="container">
        <div class="trending-tour__tittle">
            <!-- section tittle -->
            <div class="section-tittle">
                <h2>Danh sách Tour</h2>
                <div class="section-tittle__line-under"></div>
                <p>Danh sách Tour</p>
            </div>
        </div>
        <div class="row tour-list">
            @foreach($tours as $tour)
            <div class="col-lg-4 col-sm-6 col-12 tour-list-item">
                <a href="{{route('frontend.tour-detail', $tour->id)}}" class="trending-tour-item text-decoration-none tour-list-item-detail">
                    {{--<div class="trending-tour-item__sale"></div>--}}
                    <div class="trending-tour-item__img">
                        <img src="{{asset('img/tours/'. $tour->image)}}" alt="">
                    </div>
                    <div class="trending-tour-item__info">
                        <h3 class="trending-tour-item__name">
                            {{$tour->title}}
                        </h3>
                        <div class="trending-tour-item__group-infor">
                            <div class="trending-tour-item__group-infor--left">
                                <div class="trending-tour-item__group-infor__lasting">
                                    <i class="far fa-calendar-check"></i> {{$tour->schedule}}
                                </div>
                            </div>
                            <div class="trending-tour-item-price">
                                {{--<p class="trending-tour-item__group-infor__sale-price">$999</p>--}}
                                <span class="trending-tour-item__group-infor__price">{{number_format($tour->price)}} <sup>đ</sup></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="video-popup-1">
        <div class="video-popup-1__head-Brg"></div>
        <div class="container">
            
            <div class="video-popup-1__area">
                <div class="video-popup-img pt-5">
                    <img src="/img/banner.png" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="col-3-tours">
    <div class="container">
        <div class="trending-tour__tittle">
            <!-- section tittle -->
            <div class="section-tittle">
                <h2>Tour trải nhiệm nhiều nhất</h2>
                <div class="section-tittle__line-under"></div>
                <p>Tour Hot</p>
            </div>
        </div>
        <div class="row tour-list">
            @foreach($bookingFinish as $booking)
            <div class="col-lg-4 col-sm-6 col-12 tour-list-item">
                <a href="{{route('frontend.tour-detail', $booking->tour->id)}}" class="trending-tour-item text-decoration-none tour-list-item-detail">
                    {{--<div class="trending-tour-item__sale"></div>--}}
                    <div class="trending-tour-item__img">
                        <img src="{{asset('img/tours/'. $booking->tour->image)}}" alt="">
                    </div>
                    <div class="trending-tour-item__info">
                        <h3 class="trending-tour-item__name">
                            {{$booking->tour->title}}
                        </h3>
                        <div class="trending-tour-item__group-infor">
                            <div class="trending-tour-item__group-infor--left">
                                <div class="trending-tour-item__group-infor__lasting">
                                    <i class="far fa-calendar-check"></i> {{$booking->tour->schedule}}
                                </div>
                            </div>
                            <div class="trending-tour-item-price">
                                {{--<p class="trending-tour-item__group-infor__sale-price">$999</p>--}}
                                <span class="trending-tour-item__group-infor__price">{{number_format($booking->tour->price)}} <sup>đ</sup></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(function() {

        // function add html
        function showTour({
            id,
            title,
            image,
            price,
            url
        }) {
            $('#show-tour').append(`
                <div class="col-md-6 box-region">
                    <a href="${url}" class="region-item">
                        <div class="region-item__img">
                            <img src="img/tours/${image}" alt="${title}">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="font-weight-bold font-14">${title}</span>
                            <span class="font-weight-bold text-danger pt-1">${price} <sup>đ</sup></span>
                        </div>
                    </a>
                </div>`);
        }

        // updating...
        function load() {
            $('#show-tour').prop("disabled", true).html(
                `<p class="text-center text-warning w-100 d-block"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></p>
                `);
        }

        // search product
        $('#search').keyup(function() {
            const action = $('#form-search').attr('action');
            const valueInput = $(this).val();
            const expression = new RegExp(valueInput, "i");
            load();
            $.ajax({
                type: 'GET',
                url: action,
                success: function(res) {
                    $('#show-tour').empty();
                    $('#show-region').hide();
                    $.each(res.data, function(key, tour) {
                        if (tour.title.search(expression) !== -1 || tour.destination.search(expression) !== -1) {
                            showTour(tour);
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    $('#show-tour').prop("disabled", false).html('');
                }
            });
        });

        $('#search').focus(function() {
            $('.show-tour').slideDown();
        });

        $('#search').blur(function() {
            $('#search').removeClass("focus");
            $('.show-tour').slideUp();
        });
    });
</script>
@endpush
