@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'About')

<div class="page-wrapper">
  
    @section('content')
    @include('frontend.includes.banner',['header1'=>'About Us','header2'=>'About Us'])
    

    <!--About Three Start-->
    <section class="about-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-three__left">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-three__left-single">
                                    <div class="about-three__left-img">
                                        <img src="{{asset('eup/images/resources/about-three-img-1.jpg')}}" alt="">
                                    </div>
                                    <div class="about-three__left-img about-three__left-img--2">
                                        <img src="{{asset('eup/images/resources/about-three-img-2.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-three__left-single">
                                    <div class="about-three__left-img">
                                        <img src="{{asset('eup/images/resources/about-three-img-3.jpg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-three__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">About DIFISOL</span>
                            <h2 class="section-title__title">We’re DIFISOL</h2>
                          
                        </div>
                        <p class="about-three__text-1" style="text-align: justify">{!!$setting->about!!}</p>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Three End-->



    <!--Cta One Start-->
    <section class="cta-one">
        <div class="cta-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
            style="background-image: url(eup/eup/images/backgrounds/cta-one-bg.jpg);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one__inner">
                        <div class="cta-one__left">
                            <div class="cta-one__icon">
                                <span class="icon-agriculture-2"></span>
                            </div>
                            <h3 class="cta-one__title">We’re Digital Financial Solution for Farmes in Rural Areas
                            </h3>
                        </div>
                        <div class="cta-one__right">
                            <a href="about.html" class="thm-btn cta-one__btn">Discover More <i
                                    class="icon-right-arrow"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Cta One End-->

    <!--Site Footer Start-->
  @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
