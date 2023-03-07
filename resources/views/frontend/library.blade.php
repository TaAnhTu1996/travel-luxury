@extends('layouts.frontend')
@section('title', 'Thư viện ảnh')
@push('styles')

@endpush
@section('content')
{{--<div class='loading'>
    <div class='lds-dual-ring'></div>
</div>--}}
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                <!-- <h1>Thư viện ảnh</h1> -->
                <p> <span></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="destination-grid-layout">
    <div class="container">
        @foreach($regions as $region)
        <div class="section-tittle-2 mb-5">
            <p>{{$region->name}}</p>
            <div class="section-tittle__line-under"></div>
        </div>
        <div class="row">
            @foreach($region->getTour as $tour)
            <div class="col-lg-4 col-md-6">
                <a href="{{route('frontend.tour-detail', $tour->id)}}" class="top-desti__item">
                    <img src="img/tours/{{$tour->image}}" alt="{{$tour->title}}">
                    <div class="top-desti__ammout">
                        <span><i class="fa fa-map-marker" style="color: #ffc600"></i> {{$tour->title}}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection
