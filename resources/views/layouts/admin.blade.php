<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/base/vendors.bundle.css?v='.time()) }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    @stack('css')
    @stack('styles')
</head>

<body>
    <div class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" style="height: 100%">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page" style="height: 100%">
            <!-- BEGIN: Header -->
            <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
                <div class="m-container m-container--fluid m-container--full-height">
                    <div class="m-stack m-stack--ver m-stack--desktop">
                        <!-- BEGIN: Brand -->
                        <div class="m-stack__item m-brand  m-brand--skin-dark ">
                            <div class="m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                    <a href="{{route('backend.admin')}}" style="text-decoration: none" class="m-brand__logo-wrapper">
                                        <img src="/img/logo2(text-white).svg" style="height:80px;width:auto">
                                    </a>
                                </div>
                                <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                    <!-- BEGIN: Left Aside Minimize Toggle -->
                                    <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                    <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Responsive Header Menu Toggler -->
                                    <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>
                                    <!-- END -->
                                    <!-- BEGIN: Topbar Toggler -->
                                    <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                        <i class="flaticon-more"></i>
                                    </a>
                                    <!-- BEGIN: Topbar Toggler -->
                                </div>
                            </div>
                        </div>
                        <!-- END: Brand -->
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <!-- BEGIN: Horizontal Menu -->
                            <!-- END: Horizontal Menu -->
                            <!-- BEGIN: Topbar -->
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <a href="{{route('frontend.home')}}" class="btn btn-outline-warning">Trang chủ Luxury Travel</a>
                                    @if (Auth::check())
                                    <ul class="m-topbar__nav m-nav m-nav--inline">
                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__userpic">
                                                    <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class="m--img-rounded m--marginless m--img-centered">
                                                </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center" style="background: url({{asset('/assets/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__pic">
                                                                <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class="m--img-rounded m--marginless" alt="" />
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                <span class="m-card-user__name m--font-weight-500">
                                                                    Hi, {{Auth::user()->name}}
                                                                </span>
                                                                <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                    {{Auth::user()->email}}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__item text-center">
                                                                    <a href="" class="btn m-btn--pill btn-outline-primary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                        {{ __('Đăng xuất') }}
                                                                    </a>

                                                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                                                        {{ csrf_field() }}
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            <!-- END: Topbar -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: Header -->
            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
                    <!-- BEGIN: Aside Menu -->
                    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/user') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.user.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-user"></i>
                                    <span class="m-menu__link-text">
                                        Quản trị viên
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/customer') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.customer.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-users"></i>
                                    <span class="m-menu__link-text">
                                        Khách hàng
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/region') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.region.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-map-location"></i>
                                    <span class="m-menu__link-text">
                                        Vùng miền
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/tour') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.tour.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-map"></i>
                                    <span class="m-menu__link-text">
                                        Tours
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/image-library') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.image-library.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-list-3"></i>
                                    <span class="m-menu__link-text">
                                        Thư viện ảnh
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/contact') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.contact.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-list-3"></i>
                                    <span class="m-menu__link-text">
                                        Liên hệ
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/schedule') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.schedule.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-list"></i>
                                    <span class="m-menu__link-text">
                                        Lịch trình
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/booking') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.booking.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-calendar"></i>
                                    <span class="m-menu__link-text">
                                        Bookings
                                    </span>
                                </a>
                            </li>

                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/setting') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.setting.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-settings"></i>
                                    <span class="m-menu__link-text">
                                        Cấu hình trang web
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/comment') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.comment.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-comment"></i>
                                    <span class="m-menu__link-text">
                                        Bình luận
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu {{ request()->is('admin/customer-review') ? 'm-menu__item--open m-menu__item--expanded' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <a href="{{route('backend.customer-review.index')}}" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-user-settings"></i>
                                    <span class="m-menu__link-text">
                                        Đánh giá của khách hàng
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <!-- END: Subheader -->
                    <div class="m-content">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <!-- begin::Footer -->
            <footer class="m-grid__item		m-footer ">
                <div class="m-container m-container--fluid m-container--full-height m-page__container">
                    <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                            <span class="m-footer__copyright">
                                2021 &copy; Bản quyền của Luxury Travel
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end::Footer -->
        </div>
        <!--end::Base Scripts -->
    </div>
    <!-- end::Body -->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" data-search-pseudo-elements></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/base/vendors.bundle.js?v='.time()) }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js?v='.time()) }}" type="text/javascript"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea.description',
            width: 900,
            height: 300
        });

        // TOASTR
        if ("{{Session::has('message')}}") {
            var type = "{{ Session::get('alert-type', 'info') }}";
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

        let language = {
            "sProcessing":    "Xử lý...",
            "sLengthMenu":    "Hiển thị _MENU_ mục nhập",
            "sZeroRecords":   "Không tim được kêt quả",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Hiển thị _START_ đến _END_ trong số _TOTAL_ mục nhập",
            "sInfoEmpty":     "Hiển thị 0 đến 0 trong số 0 mục nhập",
            "sInfoFiltered":  "(được lọc từ tổng số _MAX_ mục nhập)",
            "sInfoPostFix":   "",
            "sSearch":        "Tìm kiếm:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Sạc...",
            "oPaginate": {
                "sFirst":    "Ngày thứ nhất",
                "sLast":    "Muộn nhất",
                "sNext":    "Tiếp",
                "sPrevious": "Trước"
            },
            "oAria": {
                "sSortAscending":  ": Kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                "sSortDescending": ": Kích hoạt để sắp xếp cột theo thứ tự giảm dần"
            }
        };

        // DATATABLE
        $('#users-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#customers-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3, 4]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#regions-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#tours-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3, 4, 5, 7]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#librarys-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 3]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#contacts-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#schedules-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#bookings-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3, 4]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#comments-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3, 4, 5]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
        $('#customer-review-table').DataTable({
            rowReorder: true,
            columnDefs: [{
                    orderable: true,
                    targets: [1, 2, 3, 4]
                },
                {
                    orderable: false,
                    targets: '_all'
                }
            ],
            "language": language
        });
    </script>
    @stack('scripts')
</body>

</html>
