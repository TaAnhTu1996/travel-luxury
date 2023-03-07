@extends('layouts.frontend')
@section('title', 'Giới thiệu về Luxury Travel')
@push('styles')

@endpush
@section('content')
<section>
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__tittle">
                <p> <span></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="aboutus-descript">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>GIỚI THIỆU CHUNG</h3>
            </div>
        </div>
        <p>Luxury Travel được biết đến là công ty du lịch uy tín, tiên phong phát triển các tuyến tour mới mẻ trong thị
            trường du lịch nội địa. Dẫn đầu thị trường về sản phẩm tour khám phá Đông Tây Bắc, bao gồm: Mộc Châu, Hà
            Giang, hồ Ba Bể - Thác Bản Giốc, Mù Cang Chải… và các tour Biển miền Bắc như: Cô Tô, Quan Lạn, Hạ Long…< PYS Travel đã tham gia vào nhiều hội nhóm du lịch, thành viên tích cực, có trách nhiệm và uy tín trong nhiều diễn đàn, hiệp hội, sứ mệnh mang đến cho các bạn trẻ những trải nghiệm mới mẻ, thân thiện, cởi mở và những kỳ nghỉ dưỡng thú vị.</p>


    </div>
    <div class="aboutus-descript__img">
        <img src="/img/tours/ha-noi_buon-me-thuot.jpg" alt="abloutus1">
        <img src="/img/tours/bac-ha_thai-giang-pho_quang-binh.jpg" alt="abloutus2">
        <img src="/img/tours/da-lat_buon-me-thuot.jpg" alt="abloutus3">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="aboutus-descript__text aboutus-descript__text--left">
                    <div class="aboutus-descript__text__img"><img src="/img/aboutus1.png" alt="aboutuspng1"></div>
                    <h5>Tầm nhìn của chúng tôi</h5>
                    <p>Luxury Travel đặt mục tiêu trở thành lựa chọn hàng đầu của du khách Việt Nam với chất lượng dịch
                        vụ xuất sắc,Cung cấp các sản phẩm du lịch TIN CẬY với chi phí HỢP LÝ và hướng tới SỰ HÀI LÒNG
                        cao nhất của hách hàng</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="aboutus-descript__text aboutus-descript__text--right">
                    <div class="aboutus-descript__text__img"><img src="/img/aboutus2.png" alt="aboutuspng2"></div>
                    <h5>Nhiệm vụ của chúng tôi</h5>
                    <p>Luxury Travel theo đuổi các giá trị trung thực, tôn trọng đồng nghiệp tin cậy với tính
                        chuyên nghiệp
                        và đạo đức nghề nghiệp cao,luôn nghiêm túc trong việc lựa chọn các đối tác và công tác tổ chức,
                        điều hành, chăm sóc khách hàng, hậu mãi... để khách hàng có thể hoàn toàn yên tâm tận hưởng kỳ
                        nghỉ của mình.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">

        <div class="preview-video-aboutus">
            <img class="preview-video-aboutus__thumb" src="/img/preview-video.jpg" alt="preview-video">
            <span class="preview-video-aboutus__btn"><img src="/img/btn-popup2.png" alt="button-pop"></span>
        </div>
    </div>

    <div class="preview-video-aboutus-popup">
        <div class="preview-video-aboutus-popup__close"></div>
        <div class="preview-video-aboutus-popup__area">
            <span class="preview-video-aboutus-popup__btn-close">&times;</span>
            <iframe class="preview-video-aboutus-popup__iframe" src="#" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" data-src="https://www.youtube.com/embed/zEqpoEWNCRA?autoplay=1" allowfullscreen></iframe>
        </div>
    </div>
</section>


<section class="aboutus-status">

    <div class="container">
        <div class="page-figure">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <div class="page-figure__figure">
                        <div class="page-figure__figure__text">
                            <span>3+</span>
                            <p>Số năm kinh nghiệm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="page-figure__figure">
                        <div class="page-figure__figure__text">
                            <span>24/7</span>
                            <p>Hỗ trợ khách hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="page-figure__figure">
                        <div class="page-figure__figure__text">
                            <span>150+</span>
                            <p>Những dịch vụ chuyên nghiệp</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="our-team">
    <div class="container ">


        <div class="section-tittle-2">
            <p>Nhóm của chúng tôi<span> </span></p>
            <div class="section-tittle__line-under"></div>
        </div>
        <br />
        <div class="row px-5 py-4">
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/phuong.jpg" alt="ourteam1">
                    <div class="our-member__info">
                        <h5>Phương Nguyễn</h5>
                        <span> - Trưởng nhóm -</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/duc.jpg" alt="ourteam2">
                    <div class="our-member__info">
                        <h5>Anh Đức</h5>
                        <span> - Thành viên nhóm -</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/huy.jpg" alt="ourteam3">
                    <div class="our-member__info">
                        <h5>MaiCồ Huy</h5>
                        <span> - Thành viên nhóm -</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/minh.jpg" alt="ourteam4">
                    <div class="our-member__info">
                        <h5>Lê Minh</h5>
                        <span> - Thành viên nhóm -</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/tuoi.png" alt="ourteam4">
                    <div class="our-member__info">
                        <h5>Nguyễn Tươi</h5>
                        <span> - Thành viên nhóm -</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="our-member our-member-custom">
                    <img class="our-member__thumb" src="/img/dai.jpg" alt="ourteam4">
                    <div class="our-member__info">
                        <h5>Tống Đại</h5>
                        <span> - Thành viên nhóm -</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
