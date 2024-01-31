@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    {{-- <div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div> --}}
    
{{-- <div class="preloader">
<div class="preloader__image"></div>
</div> --}}
    <!-- /.preloader -->


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
                                <img src="eup/images/resources/about-one-1.jpg" alt="">
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="about-Two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">{{$setting->about_title}}</span>
                                <h5 class="section-title__title">{{$setting->motto}}</h5>
                                {{-- <div class="section-title__icon">
                                    <img src="eup/images/icon/section-title-icon-1.png" alt="">
                                </div> --}}
                            </div>
                            <p class="about-two__text" style="text-align: justify">
                                {{$setting->about}}
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
                                <img  src="{{asset('assets/images/news')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                
                                <div class="blog-one__date">
                                    <span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM DD YY') }}</span>
                                    {{-- <p>Aug</p> --}}
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="blog-one__meta list-unstyled">
                                    <li>
                                        <a href="{{route('front.single.news',$blog->slug)}}"><i class="fas fa-user-circle"></i>Admin</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{route('front.single.news',$blog->slug)}}"><i class="fas fa-comments"></i>2 Comments</a>
                                    </li> --}}
                                </ul>
                                <h3 class="blog-one__title">
                                <a href="{{route('front.single.news',$blog->slug)}}">
                                   {{$blog->title}}  
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
       
        <!--Brand One Start-->
        @include('frontend.includes.brand')
        <!--Brand One End-->
        <!--Site Footer Start-->
        @include('frontend.includes.footer')
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="eup/images/resources/logo-2.png" width="122"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="#">{{$setting->email}}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="#">{{$setting->phone}}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="{{$setting->twitter}}" class="fab fa-twitter"></a>
                    <a href="{{$setting->facebook}}" class="fab fa-facebook-square"></a>
                    {{-- <a href="#" class="fab fa-pinterest-p"></a> --}}
                    <a href="{{$setting->instagram}}" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
@endsection
