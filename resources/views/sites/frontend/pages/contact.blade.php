@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('layouts.front')

@section('content')
@section('title', 'Contact Us')  
@include('frontend.include.innerBanner',['banner_title'=>'Contact Us'])

<div class="contact-info-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4  col-12 col-sm-12">
                <div class="contact-info-card">
                    <i class="ri-map-pin-fill"></i>
                    <h3>Our location
                    </h3>
                    <p>
                    {{$setting->address}}
                    </p>
                    
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-card">
                    <i class="ri-mail-fill"></i>
                    <h3>Email us</h3>
                    <p>
                        <a href="#">
                            <span class="__cf_email__">{{$setting->email}}</span>
                        </a>
                    </p>
                    {{-- <p>
                        <a href="mailto:info@fmapmedia.com">
                            <span class="__cf_email__">info@fmapmedia.com</span>
                        </a>
                    </p> --}}
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-card">
                    <i class="ri-phone-fill"></i>
                    <h3note>Phone</h3note>
                    <p>
                        <a href="#">{!!$setting->phone!!}</a>
                    </p>
                    {{-- <p>
                        <a href="tel:+08035082149">08035082149</a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact-widget-area pb-70" 
data-aos="fade-up"
data-aos-offset="300"
data-aos-easing="ease-in-sine">
    <div class="container">
        <div class="section-title text-center mb-45">
            <span>SEND MESSAGE</span>
            <h2>Ready to get started?</h2>
        </div>
        <div class="contact-form">
            <form action="{{ route('contact.form') }}" method="POST"  id="contactForm">
                @csrf
        
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required data-error="Please Enter Your Name" placeholder="Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required data-error="Please Enter Your Email" placeholder="Email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number" required data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please Enter Your Subject" placeholder="Your Subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                   

                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" cols="30" rows="7" required data-error="Write your message" placeholder="Your Message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="agree-label">
                            <input type="checkbox" id="chb1">
                            <label for="chb1">
                                Accept
                                <a href="#">Terms & Conditions</a>
                                And
                                <a href="#">Privacy Policy.</a>
                            </label>
                        </div>
                    </div> --}}

                    <div class="form-group col-lg-6">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" required data-error="Captcha cannot be empty" name="captcha" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <button type="submit" class="default-btn sendMesg">
                            Send Message
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="contact-map-area pb-100">
    <div class="container">
        <div class="contact-map">
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.1650774673894!2d7.4563310751687455!3d9.048702488679933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b3fe921e773%3A0x24aae5d3f2e56fa9!2s60%20Lome%20Cres%2C%20Wuse%20900211%2C%20Abuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1687967772150!5m2!1sen!2sng" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.972641599872!2d-122.40869708532713!3d37.790680919018435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808bfb7cb35b%3A0x9b649f6a7d9c50e8!2s560%20Bush%20St%20%235%2C%20San%20Francisco%2C%20CA%2094108%2C%20USA!5e0!3m2!1sen!2sbd!4v1641381557316!5m2!1sen!2sbd"></iframe> --}}
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3939.9653016057837!2d7.437712275168928!3d9.066925588393872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSuite%20B11%204%20Real%20tower%20center%20No%2026%20A%20E%20%20Ekukinam%20Street%2C%20Utako%20Abuja!5e0!3m2!1sen!2sng!4v1691174866744!5m2!1sen!2sng"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@push('extra-scripts')
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endpush
@endsection