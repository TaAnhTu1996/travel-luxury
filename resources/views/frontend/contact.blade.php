@extends('layouts.frontend')
@section('title', 'Liên hệ với chúng tôi')
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
                <!-- <h1>LIÊN HỆ</h1> -->
                <p> <span></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="contact-infomation">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="contact-infomation__item contact-infomation__form">
                    <h5>Liên hệ</h5>
                    <form action="{{route('backend.contact.store')}}" method="post">
                        @csrf
                        <label>Tên của bạn *</label>
                        <input type="text" name="name" placeholder="Nhập tên" value="{{old('name')}}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        <label>Email *</label>
                        <input type="email" name="email" placeholder="Nhập email" value="{{old('email')}}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        <label>Lời nhắn *</label>
                        <textarea name="message" cols="30" rows="8" value="{{old('message')}}"></textarea>
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                        <button class="footer-form__submit" type="submit">GỬI</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="contact-infomation__item contact-infomation__item--padding">
                    <div class=" contact-infomation__info">
                        <h5>Thông tin liên lạc</h5>
                        <div style="font-size:18px;font-weight:bold;line-height: 35px;padding-bottom: 16px">
                            <p>Công ty TNHH Du lịch Luxury Travel
                                <br>
                            <p>Địa chỉ ĐKKD: Quận Hà Đông,Thành phố Hà Nội</p>
                            <p>Số tài khoản: 0414 0939 701</p>
                            <p>Ngân hàng: TPBANK </p>
                            <p>Người nhận: NGUYỄN THANH PHƯƠNG</p>
                        </div>
                        <div class="contact-infomation__info__address">
                            <div class="contact-infomation__info__address-item">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span>Quận Hà Đông,Thành phố Hà Nội</span>
                            </div>
                            <div class="contact-infomation__info__address-item">
                                <i class="fas fa-mail-bulk mr-2"></i>
                                <span>luxurytravelvn21@gmail.com</span>
                            </div>
                            <div class="contact-infomation__info__address-item">
                                <i class="fas fa-mobile-alt mr-2"></i>
                                <span>0974.667.645</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-infomation__working-time">
                        <h5>GIỜ LÀM VIỆC</h5>
                        <p>Thứ 2 - thứ 7: 8h - 18h30</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-infomation__map">
            <i class="fas fa-map-marker-alt"></i>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59615.843487499194!2d105.71730847201096!3d20.952907975988357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532bef4bcdb7%3A0xbcc7a679fcba07f6!2zSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1630329234024!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection
