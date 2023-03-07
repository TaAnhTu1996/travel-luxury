@extends('layouts.frontend')
@section('title',$regionTitle)
@push('styles')
<style>
.content {
    display: none;
}

.title-region {
    margin-bottom: 20px;
    border-left: 3px solid #0998c8;
    padding: 5px 0 5px 10px;
}

.section-tittle-2 p {
    margin-bottom: 18px !important;
}

.rotate {
    transform: rotate(180deg);
}
</style>
@endpush
@section('content')
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                <!-- <h1>List Left Sidebar</h1> -->
                <p> <span></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="grid-left-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <h2 class="title-region">Tất cả vùng miền</h2>
                <div class="dropdown-container ">
                    @foreach($regions as $region)
                    <div class="dropdown-title region">
                        <span>{{$region->name}}</span>
                        <i class="fas fa-angle-down text-white float-right mt-2"></i>
                    </div>
                    <div class="dropdown-content">
                        <ul>
                            @foreach($region->getTour as $tour)
                            <li><a href="{{route('frontend.tour-detail', $tour->id)}}">{{$tour->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="section-tittle-2">
                    <p>{{$regionTitle}}</p>
                    <div class="section-tittle__line-under"></div>
                </div>

                <!-- tour-list -->

                <div class="list-left-sidebar">
                    @if($tours)
                        @foreach($tours as $tour)
                        <div class="trending-tour-item">
                            <!-- <div class="trending-tour-item__sale"></div> -->
                            <div class="list-left-sidebar__grid">
                                <div class="list-left-sidebar__grid-img">
                                    <a href="{{route('frontend.tour-detail', $tour->id)}}">
                                        <img class="trending-tour-item__thumnail"
                                            src="{{asset('img/tours/' . $tour->image)}}" alt="tour1">
                                    </a>
                                </div>
                                <div class="trending-tour-item__info">
                                    <a href="{{route('frontend.tour-detail', $tour->id)}}">
                                        <h3 class="trending-tour-item__name">
                                            {{$tour->title}}
                                        </h3>
                                    </a>
                                    <p class="pt-3"><i class="fas fa-home"></i> <span class="text-black-50">Khởi hành
                                            từ:</span> {{$tour->departure_from}}</p>
                                    <p class="pt-1"><i class="fas fa-map-marked-alt"></i> <span class="text-black-50">Điểm
                                            đến:</span> {{$tour->destination}}</p>
                                    <p class="pt-1"><i class="fas fa-clock"></i> <span class="text-black-50">Lịch
                                            trình:</span> {{$tour->schedule}}</p>
                                    <p class="pt-1"><i class="fas fa-calendar-alt"></i> <span class="text-black-50">Khởi
                                            hành:</span> {{$tour->start}}</p>
                                </div>
                                <div class="list-left-sidebar__price">
                                    {{--<div class="list-left-sidebar__price__discount">
                                                <span>From</span> <span class="trending-tour-item__group-infor__sale-price"> $999</span>
                                            </div>--}}
                                    <span class="trending-tour-item__group-infor__price">{{number_format($tour->price)}}
                                        <sup>đ</sup></span>
                                    <a href="{{route('frontend.tour-detail', $tour->id)}}"
                                        class="list-left-sidebar__price__view-detail">Xem Tour</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif

                    <!-- pagination -->
                    {{--<div class="wander-pagination__pagination">
                        <div class="wander-pagination__pagination__paging current">1</div>
                        <div class="wander-pagination__pagination__paging">2</div>
                        <div class="wander-pagination__pagination__paging">3</div>
                        <div class="wander-pagination__pagination__paging"><i class="fa fa-angle-right"></i></div>
                    </div>--}}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(".region").click(function() {

    const toggle = $(this).next();
    const icon = $(this).children().last();
    icon.toggleClass('rotate');
    toggle.slideToggle(500, function() {});

});
</script>
@endpush
