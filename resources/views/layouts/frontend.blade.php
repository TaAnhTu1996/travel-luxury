<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/slick.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.datepicker2.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/base/vendors.bundle.css?v='.time()) }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif !important;
        }
    </style>
    @stack('styles')
</head>

<body>
    @php
    use App\Models\Region;
    use App\Models\Setting;

    $setting = Setting::where('id', 1)->first();
    $regions = Region::all();
    $customerCheck = Auth::guard('customer')->check();
    $customer = Auth::guard('customer')->user();
    @endphp
    <header class="cd-auto-hide-header">
        <!-- menu-mobile -->
        <div class="menu-mobile d-block d-lg-none">
            <div class="d-flex align-items-center justify-content-between pt-2" style="padding-left: 16px;">
                <div>
                    <label for="chk" class="hide-menu-btn fs-24 text-">
                        <i class="fas fa-times" style="font-size: 20px;"></i>
                    </label>
                </div>
                <div class="col-7 col-sm-5 mx-auto px-0">
                    <a href="{{route('frontend.home')}}" class="d-flex align-items-center justify-content-center">
                        <div class="mob-logo">
                            <img src="/img/logo2(text-white).svg" class="w-auto h-100" alt="">
                        </div>
                        <p class="text-center h2-mon text-brown">travel</p>
                    </a>
                </div>
            </div>
            <!-- search menu mobile -->
            <form class="" style="z-index: 15" action="/?mod=archive&amp;act=search" method="GET">
                <div class="input-group dropdown-item bg-white pb-3 px-3">
                    <input type="hidden" name="mod" value="archive">
                    <input type="hidden" name="act" value="search">
                    <input type="text" name="search" class="form-control shadow-none" placeholder="Tìm kiếm..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- end search menu mobile -->
            <!-- menu mobile -->
            <nav class="navigation">
                <ul class="nav-list">
                    <li class="dropdown-list">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="dropdown-list__title">Trag chu</a>
                            <span><i class="fas fa-angle-down" style="font-size: 25px"></i></span>
                        </div>
                        <ul class="dropdown-list__menu">
                            <li class="openlistnewsmn_mb">
                                <a href="#">Gioi thieu</a>
                            </li>
                        </ul>
                    </li>
                    <li>xfd</li>
                </ul>
            </nav>
            <!-- end menu-mobile -->
        </div>
        <!-- menu-desktop -->
        <!--	<div class="position-absolute w-100 h-100 bg-white" style="z-index: 1"></div>-->
        <div class="w-100 d-none d-lg-block position-relative shadow" style="z-index: 3; background:#2f4d73">
            <div class="container mx-auto row">
                <div class="col-3 d-flex align-items-center px-0 py-3">
                    <div class="d-flex align-items-center px-sm-3 col-8">
                        <a href="{{route('frontend.home')}}"><img src="/img/logo2(text-white).svg" alt=""> </a>
                    </div>
                </div>
                <div class="col-9 px-0 ">
                    <div class="d-flex justify-content-end h-100">
                        <ul class="d-flex nav_desktop bg-transparent justify-content-between w-100 mb-0">
                            <li class="nav_item {{ request()->is('/') ? 'active' : '' }}"> <a href="{{route('frontend.home')}}" class="nav_item_name">Trang chủ</a></li>
                            <li class="nav_item"> <a href="{{route('frontend.home')}}" class="nav_item_name">Tour theo miền</a>
                                <ul class="dropdown-menu fade-up">
                                @foreach($regions as $region)
                                    <li><a class="dropdown-item" href="{{route('frontend.tour-list', $region->id)}}">{{$region->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                            <li class="nav_item {{ request()->is('about-us') ? 'active' : '' }}"><a href="{{route('frontend.about-us')}}" class="nav_item_name">Giới thiệu</a></li>
                            <!-- <li class="nav_item {{ request()->is('contact') ? 'active' : '' }}"><a href="{{route('frontend.contact')}}" class="nav_item_name">Liên hệ</a></li> -->
                            <li class="nav_item {{ request()->is('library') ? 'active' : '' }}"><a href="{{route('frontend.library')}}" class="nav_item_name">Thư viện</a></li>
                            <li class="nav_item {{ request()->is('customer-review') ? 'active' : '' }}"><a href="{{route('frontend.customer-review')}}" class="nav_item_name">Cảm nhận khách hàng</a></li>
                            <ul class="nav navbar-nav navbar-right my-auto">
                                @if ($customerCheck)
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            <img src="https://ui-avatars.com/api/?name={{$customer->name}}" class="m--img-rounded m--marginless m--img-centered" width="35" height="35">
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url({{asset('/assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="https://ui-avatars.com/api/?name={{$customer->name}}" class="m--img-rounded m--marginless" alt="" />
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <a data-tooltip="tooltip" data-placement="top" title="Sửa tài khoàn" href="{{route('customer.profile')}}" class="m-card-user__name m--font-weight-500">
                                                            Hi, {{$customer->name}} <i class="fas fa-pen fs-16"></i>
                                                        </a>
                                                        <a data-tooltip="tooltip" data-placement="top" title="Sửa tài khoàn" href="{{route('customer.profile')}}" class="m-card-user__email m--font-weight-300 m-link">
                                                            {{$customer->email}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__item text-center">
                                                            <a href="{{ route('customer.history') }}" class="btn m-btn--pill btn-outline-warning m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Lịch sử
                                                            </a>
                                                            <a href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-primary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Đăng xuất
                                                            </a>
                                                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item nav-action mx-2 text-decoration-none">
                                    <a href="{{route('customer.login')}}" class="text-white"><i class="fas fa-user pr-2 w-auto"></i>
                                        Tài khoản</a>
                                </li>
                                @endif
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer id="footer-1" class="d-flex align-items-center">
        <div class="footer-banner">
            <img src="/img/footer-banner.jpg" alt="">
        </div>
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
        <div class="container position-relative" style="z-index: 2;">
            @if($setting)
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="footer-widget-1 footer-widget-1--margin ">
                                <a href="{{route('frontend.home')}}"><img src="{{asset('img/'. $setting->logo)}}" alt="logo"></a>
                                <div class="footer-widget-1__text my-3">
                                    <p class="text-lightgray">{{$setting->information}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="remove-padding" class="col-lg-6 col-md-7">
                    <div class="footer-widget-1">
                        <div class="footer-widget-1__lists">
                            <div class="footer-widget-1__list">
                                <div class="footer-widget-1__tittle">
                                    <h5>Các trang</h5>
                                    <div class="footer-widget-1__tittle__line-under"></div>
                                </div>
                                <ul>
                                    <li><a href="{{route('frontend.home')}}">Trang chủ</a></li>
                                    <li><a href="{{route('frontend.contact')}}">Liên hệ</a></li>
                                    <li><a href="{{route('frontend.library')}}">Thư viện</a></li>
                                    <li><a href="{{route('frontend.customer-review')}}">Cảm nhận khách hàng</a></li>
                                </ul>
                            </div>

                            <div class="footer-widget-1__list">
                                <div class="footer-widget-1__tittle">
                                    <h5>Các miền</h5>
                                    <div class="footer-widget-1__tittle__line-under"></div>
                                </div>
                                <ul>
                                    @foreach($regions as $region)
                                    <li><a href="{{route('frontend.tour-list', $region->id)}}">{{$region->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="footer-widget-1__list">
                                <div class="footer-widget-1__tittle">
                                    <h5>Thông tin liên lạc</h5>
                                    <div class="footer-widget-1__tittle__line-under"></div>
                                </div>
                                <ul>
                                    <li><a href="javascript:;">Công ty TNHH du lịch Luxury Travel</a></li>
                                    <li><a href="javascript:;"><i class="fas fa-phone-alt"></i> {{$setting->phone_number}}</a></li>
                                    <li><a href="javascript:;"><i class="fas fa-map-marker-alt"></i> {{$setting->address}}</a></li>
                                    <li><a href="javascript:;"><i class="far fa-envelope"></i> {{$setting->email}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </footer>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-search-pseudo-elements></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/base/vendors.bundle.js?v='.time()) }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js?v='.time()) }}" type="text/javascript"></script>

    <script src="{{ asset('js/app.js?v='.time()) }}"></script>
    <script src="{{ asset('js/app-theme.js?v='.time()) }}"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    <script src="{{ asset('js/header.js?v='.time()) }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ("{{Session::has('message')}}") {
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 5000;
                    toastr.info("{{Session::get('message')}}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 5000;
                    toastr.success("{{Session::get('message')}}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 5000;
                    toastr.warning("{{Session::get('message')}}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 5000;
                    toastr.error("{{Session::get('message')}}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        }

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            focusOnSelect: true,
            nextArrow: '<button class="slick-custom-next"><i class="fas fa-chevron-right"></i></button>',
            prevArrow: '<button class="slick-custom-previous"><i class="fas fa-chevron-left"></i></button>'
        });

        $('a[data-slide]').click(function(e) {
            e.preventDefault();
            var slideno = $(this).data('slide');
            $('.slider-nav').slick('slickGoTo', slideno - 1);
        });

        $('.opnav_tran').click(function(event) {
            if ($('.header-pc').hasClass('active_im')) {
                $(".header-pc").removeClass('active');
                $(".header-pc").removeClass('active_im');
                $(".cd-auto-hide-header").removeClass('active_menuauto');
                $('body').css('overflow-y', 'auto');
            } else {
                $(".header-pc").addClass('active');
                $(".header-pc").addClass('active_im');
                $(".cd-auto-hide-header").addClass('active_menuauto');
                $('body').css('overflow-y', 'hidden');
            }
        });
        $('.btn_out').click(function(event) {
            $(".header-pc").removeClass('active');
            $(".header-pc").removeClass('active_im');
            $(".cd-auto-hide-header").removeClass('active_menuauto');
            $('body').css('overflow-y', 'auto');
        });

        $('[data-tooltip="tooltip"]').tooltip();
    </script>


    @stack('scripts')

</body>

</html>
