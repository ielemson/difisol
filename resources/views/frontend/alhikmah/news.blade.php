@php
$setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Ahikmah News')
<div class="page-wrapper">

@section('content')
@include('frontend.alhikmah.banner',['header1'=>'ALHIKMAH News','header2'=>'ALHIKMAH News'])

        {{-- FUNNAB --}}
        @if (count($alhikmah_news)>0)
     <!--Blog Start-->
     <section class="blog-carousel-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">From Alhikmah University</span>
                <h2 class="section-title__title">blog News & Articles</h2>
                <div class="section-title__icon">
                    <img src="eup/images/icon/section-title-icon-1.png" alt="">
                </div>
            </div>
            <div class="blog-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                "items": 3,
                "margin": 30,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":false,
                "dots":true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "responsive":{
                    "0":{
                        "items":1
                    },
                    "768":{
                        "items":2
                    },
                    "992":{
                        "items": 3
                    }
                }
            }'>

           @foreach ($alhikmah_news as $alhikmah_)
               <!--Blog One Single Start-->
               <div class="item">
                   <div class="blog-one__single">
                       <div class="blog-one__img">
                           <img src="{{asset('assets/images/news')}}/{{$alhikmah_->image}}" alt="{{$alhikmah_->title}}">
                           <div class="blog-one__date">
                             <p>{{ Carbon\Carbon::parse($alhikmah_->created_at)->isoFormat('MMM DD YY') }}</p>
                           </div>
                       </div>
                       <div class="blog-one__content">
                           <ul class="blog-one__meta list-unstyled">
                               <li>
                                   <a href="{{route('front.single.news',$alhikmah_->slug)}}"><i class="fas fa-user-circle"></i>Admin</a>
                               </li>
                               <li>
                                   <a href="{{route('front.single.news',$alhikmah_->slug)}}"><i class="fas fa-comments"></i>0 Comments</a>
                               </li>
                           </ul>
                           <h3 class="blog-one__title">
                           <a href="{{route('front.single.news',$alhikmah_->slug)}}">
                               {{$alhikmah_->title}}
                           </a>
                       </h3>
                       </div>
                   </div>
               </div>
               <!--Blog One Single End-->
               @endforeach
           
              {{-- FUNNAB --}}

            </div>
        </div>
    </section>
    <!--Blog End-->
    @endif


<!--Site Footer Start-->
@include('frontend.includes.footer')
<!--Site Footer End-->


@endsection
