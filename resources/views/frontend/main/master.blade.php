@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
   


    <div class="page-wrapper">
        @include('frontend.includes.header')

        <div class="stricky-header stricked-menu main-menu main-menu-three">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Main Slider Start-->
        @include('frontend.includes.slider')
        <!--Main Slider End-->

        <section class="about-two" id="about">
            <div class="about-two__bg float-bob-x">
                {{-- <img src="eup/images/backgrounds/about-two-bg-1.png" alt=""> --}}
            </div>
            <div class="container">
                
                <div class="row">
                    <div class="col-xl-5">
                        <div class="about-two__left">
                            <div class="about-two__img wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                                <img src="eup/images/resources/about_main.jpg" alt="">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="about-Two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">{{ $setting->about_title }}</span>
                                <h5 class="section-title__title">{{ $setting->motto }}</h5>
                                {{-- <div class="section-title__icon">
<img src="eup/images/icon/section-title-icon-1.png" alt="">
</div> --}}
                            </div>
                            <p class="about-two__text" style="text-align: justify">
                                {{ $setting->about }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
         
        @if (count($news) > 0)
            <!--Blog One Start-->
            <section class="blog-one blog-three">
                <div class="container">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">From the Blog Post</span>
                        <h2 class="section-title__title">blog News & Articles</h2>
                        <div class="section-title__icon">
                            <img src="eup/images/icon/section-title-icon-1.png" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <!--Blog One Single Start-->
                        @foreach ($news as $blog)
                            <!--Blog One Single Start-->
                            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                                <div class="blog-one__single">
                                    <div class="blog-one__img">
                                        <img src="{{ asset('assets/images/news') }}/{{ $blog->image }}"
                                            alt="{{ $blog->title }}">

                                        <div class="blog-one__date">
                                            <span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM DD YY') }}</span>
                                            {{-- <p>Aug</p> --}}
                                        </div>
                                    </div>
                                    <div class="blog-one__content">
                                        <ul class="blog-one__meta list-unstyled">
                                            <li>
                                                <a href="{{ route('front.single.news', $blog->slug) }}"><i
                                                        class="fas fa-user-circle"></i>Admin</a>
                                            </li>
                                            {{-- <li>
<a href="{{route('front.single.news',$blog->slug)}}"><i class="fas fa-comments"></i>2 Comments</a>
</li> --}}
                                        </ul>
                                        <h3 class="blog-one__title">
                                            <a href="{{ route('front.single.news', $blog->slug) }}" style="font-size: 1rem">
                                                {{ strtolower($blog->title) }}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!--Blog One Single End-->
                        @endforeach
                    </div>
                </div>
            </section>
            <!--Blog One End-->

            
        @endif
        @include('frontend.includes.beneficiary')
        <section class="testimonial-two mb-5">
            <div class="testimonial-two__shape-1 float-bob-x"
                style="background-image: url(assets/images/shapes/testimonial-two-shape-1.png);"></div>
            <div class="container">
                <div class="row">
                
                    <div class="col-xl-12 col-lg-12">
                        <div class="testimonial-two__right">
                            <ul class="testimonial-two__counter list-unstyled">
                                <li>
                                    <div class="testimonial-two__counter-icon">
                                        <span class="fa fa-university"></span>
                                    </div>
                                    <div class="testimonial-two__counter-content-box">
                                        <div class="testimonial-two__counter-count-box">
                                            <h3 class="odometer" data-count="12">00</h3>
                                            {{-- <span class="counter-one__plus">+</span> --}}
                                        </div>
                                        <p class="testimonial-two__counter-text">Agencies
                                            partner
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-two__counter-icon">
                                        <span class="fa fa-users"></span>
                                    </div>
                                    <div class="testimonial-two__counter-content-box">
                                        <div class="testimonial-two__counter-count-box">
                                            <h3 class="odometer" data-count="03">00</h3>
                                            {{-- <span class="counter-one__plus">+</span> --}}
                                        </div>
                                        <p class="testimonial-two__counter-text">Civil Society Organisations
                                            Partners
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-two__counter-icon">
                                        <span class="fa fa-university"></span>
                                    </div>
                                    <div class="testimonial-two__counter-content-box">
                                        <div class="testimonial-two__counter-count-box">
                                            <h3 class="odometer" data-count="04">00</h3>
                                            {{-- <span class="counter-one__plus">+</span> --}}
                                        </div>
                                        <p class="testimonial-two__counter-text">Financial Institutions
                                            Partner</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-two__counter-icon">
                                        <span class="icon-customer"></span>
                                    </div>
                                    <div class="testimonial-two__counter-content-box">
                                        <div class="testimonial-two__counter-count-box">
                                            <h3 class="odometer" data-count="01">00</h3>
                                            {{-- <span class="counter-one__plus">+</span> --}}
                                        </div>
                                        <p class="testimonial-two__counter-text">
                                            E.U  Delegates in Nigeria
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One Start-->
        @include('frontend.includes.brand')
        <!--Brand One End-->

                <!--Cta One Start-->
                <section class="cta-one">
                    <div class="cta-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                        style="background-image: url({{ asset("eup/images/shapes/contact-one-shape-1.png") }});"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="cta-one__inner">
                                    <div class="cta-one__left">
                                        <div class="cta-one__icon">
                                            <span class="icon-agriculture-2"></span>
                                        </div>
                                        <h3 class="cta-one__title">Promoting digital solutions for farmers!
                                        </h3>
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


    </div>
@endsection
