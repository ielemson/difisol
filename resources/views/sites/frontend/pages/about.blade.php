@extends('layouts.front')

@php
    $setting = \App\Models\Setting::find(1);
@endphp
@section('content')
@section('title', 'About Us')
@include('frontend.include.innerBanner', ['banner_title' => 'About Us'])


<div class="enrolled-area-two pt-100 pb-70">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4" 
          >
                <div class="enrolled-img-three mb-30 pr-20">
                    <img src="assets/images/who-we-are.jpeg" alt="Who-we-are">
                   
                </div>
            </div>
            <div class="col-lg-8" 
            >
                <div class="enrolled-content mb-30">
                    <div class="section-title">
                        <span>WHO WE ARE</span>
                        <h2>{{$setting->about_title}}</h2>
                        {!!$setting->about!!}
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>


<div class="counter-area-three pb-70">
    <div class="container-fluid" 
    >
        <div class="row">
            <div class="col-lg-4 col-6" >
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Motto</h3>
                    <p>{{$setting->motto}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Mission</h3>
                    <p>
                    {{$setting->mission}}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Our Vision</h3>
                    <p>
                        {{$setting->vision}}
                    </p>
                </div>
            </div>
           
        </div>
    </div>
</div>

@include('frontend.include.team')

{{-- our core values --}}
<div class="featured-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row mb-45">
            <div class="col-lg-8 col-md-9">
                <div class="section-title mt-rs-20">
                    <h2>Our Core Values</h2>
                    <p>Our system is built on the values of proficiency, fidelity, humanity, vision and
                        service.</p>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 col-6" >
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Proficiency </h3>
                    <p>We bring expertise to work.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Fidelity</h3>
                    <p>We keep to our agreements</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Humanity</h3>
                    <p>We are considerate in our dealings and negotiations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Vision</h3>
                    <p>We help our clients see clearly and live their expectations
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="featured-item">
                    <i class="flaticon-effective"></i>
                    <h3>Service</h3>
                    <p>We give our best to the satisfaction of our clients
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>


@include('frontend.include.partner')
@endsection
