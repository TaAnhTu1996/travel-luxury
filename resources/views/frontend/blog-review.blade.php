@extends('layouts.frontend')
@section('title', $review ? $review->title : '')
@push('styles')
    <style>
        .breadcrumb-head h4{
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

        .tour-infomation__content {
            position: relative;
            padding: 30px 0 0 0;
        }

        .tour-infomation__content .tour-infomation__content__header h2 {
            font-size: 28px;
            color: #00506c;
            font-weight: bold;
        }

        .blog-review .blog-review__avatar img {
            border-radius: 50%;
        }

        .blog-review .name-customer {
            font-size: 15px;
            color: #00506c;
            text-transform: uppercase;
            font-weight: bold;
        }

        .blog-review .name-tour {
            color: #00506c;
            font-size: 15px;
            text-decoration: none;
        }

        .rated-tour {
            background: #b7b7b738;
            border: 1px solid #cccccc2e;
            border-radius: 3px;
            padding: 15px;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .rated-tour ul {
            margin-left: 18px;
            margin-bottom: 0;
        }

        .rated-tour ul li{
            list-style: inside;
        }

        .rated-tour ul li a {
            color: #00759a;
            font-size: 14px;
        }
    </style>
@endpush
@section('content')
    <div class="container breadcrumb-head">
        @if($review)
            <h4 class="mt-4"><a href="{{route('frontend.home')}}">Home</a> / <a href="{{route('frontend.customer-review')}}">Cảm
                    nhận khách hàng</a> / <span> {{$review->title}}</span></h4>
        @endif
    </div>
    <section class="tour-infomation-2">
        @if($review)
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <aside>
                            <div class="tour-infomation__content">
                                <div class="tour-infomation__content__header py-2 border-bottom">
                                    <h2>{{$review->title}}</h2>
                                    <i class="fas fa-calendar-alt"></i> <span class="ml-2">{{$review->created_at}}</span>
                                </div>
                            </div>

                            <div class="blog-review">
                                <div class="my-3 d-flex">
                                    <div class="mr-3 blog-review__avatar">
                                        <img src="https://ui-avatars.com/api/?name={{$review->customer->name}}" alt="{{$review->customer->name}}">
                                    </div>
                                    <p><span class="name-customer">{{$review->customer->name}}</span>
                                        <span class="text-black-50">đã tham gia:</span>
                                        <span class="name-tour">{{$review->tour->title}}</span>
                                        <a href="{{route('frontend.tour-detail', $review->tour->id)}}"
                                           class="btn-link text-warning"> ( Xem tour ngay )</a>
                                    </p>
                                </div>
                                <p>{{$review->message}}</p>
                                <h5 class="title-block">Một số hình ảnh trong chuyến đi:</h5>
                                @if($images)
                                    @foreach($images as $keyImg => $image)
                                        <img src="{{asset('img/customer-review/' . $image)}}" alt="{{$image}}"
                                             class="mb-5">
                                    @endforeach
                                @endif
                            </div>

                            <div class="tour-infomation__content__schedule">
                                <h2 class="title-block">Các đánh giá cùng Tour</h2>
                                <div class="rated-tour">
                                    @if($similarReviews)
                                        <ul>
                                            @foreach($similarReviews as $review)
                                                <li>
                                                    <a href="{{route('frontend.blog-review', $review->id)}}">{{$review->title}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <div class="right-sidebar__item mt-5">
                            <div class="card">
                                <h5 class="card-header bg-warning font-weight-bold text-center text-white">Chăm sóc khách hàng</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Gọi ngay để được tư vấn</h5>
                                    <p class="card-text">Luxury travel luôn đem lại trải nghiệm tốt nhất cho khách hàng</p>
                                    <p><i class="fas fa-mobile-alt"></i><span class="ml-2">0974 667 645</span></p>
                                    <p><i class="fas fa-envelope"></i><span class="ml-2">luxurytravelvn21@gmail.com</span></p>
                                    <a href="{{route('frontend.contact')}}" style="letter-spacing: 5px;" class="btn btn-warning d-block text-uppercase text-white my-3">Liên hệ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!--start  similar-tour -->
        <div class="similar-tour" id="similar-tour">
            <div class="container">
                <div class="tour-infomation__content__descript">
                    <h2 class="title-block">Chuyến tham quan tương tự</h2>
                </div>
                <div class="row">
                    @if($similarTours)
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
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
