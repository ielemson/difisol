@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Contact')
<div class="page-wrapper">
   
    @section('content')
    @include('frontend.includes.banner',['header1'=>'Contact Us','header2'=>'Contact Us'])
    
    <!--Google Map Start-->
    <section class="google-map">
        <div class="container">
            <div class="google-map-box">
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd"
                    class="google-map__one" allowfullscreen>
                </iframe> --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31781.26149593684!2d6.93232730098382!3d5.315982119128238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10426789e5886ce3%3A0x71b6ffb2f4a6fa39!2sUniversity%20of%20Agriculture%20and%20Environmental%20Sciences%20Imo%20State!5e0!3m2!1sen!2sng!4v1706654783804!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="google-map__one">
                </iframe>
            </div>
            <div class="contact-details">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="contact-details__single">
                            <div class="contact-details__icon">
                                <span class="icon-help"></span>
                            </div>
                            <div class="contact-details__text">
                                <p>Have Question?</p>
                                <h3><a href="#">Call {{$setting->phone}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="contact-details__single">
                            <div class="contact-details__icon">
                                <span class="icon-mailbox"></span>
                            </div>
                            <div class="contact-details__text">
                                <p>Write Email</p>
                                <h3><a href="#">{{$setting->email}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="contact-details__single contact-details__single-last">
                            <div class="contact-details__icon">
                                <span class="icon-maps-and-flags"></span>
                            </div>
                            <div class="contact-details__text">
                                <p>Visit Office</p>
                                <h3>{{$setting->address}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="contact-details__single">
                            <div class="contact-details__social">
                                <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a>
                                {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                                <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Google Map End-->

    <!--Contact Two Start-->
    <section class="contact-two">
        
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Write a Message</span>
                <h2 class="section-title__title">Fill and submit form </h2>
                
            </div>
            <div class="contact-two__form-box">
                <form action="" class="contact-two__form contact-form-validated"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Your Name" name="name">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="email" placeholder="Email Address" name="email">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Phone" name="Phone Number">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input type="text" placeholder="Subject" name="Subject">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-form__input-box text-message-box">
                                <textarea name="message" placeholder="Write a Comment"></textarea>
                            </div>
                            <div class="contact-form__btn-box">
                                <button type="submit" class="thm-btn contact-two__btn">Send a Message<i
                                        class="icon-right-arrow"></i> </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Contact Two End-->

    <!--Site Footer Start-->
    @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
