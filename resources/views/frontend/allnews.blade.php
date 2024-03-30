@php
$setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'General News')
<div class="page-wrapper">

@section('content')
@include('frontend.includes.banner',['header1'=>'All News','header2'=>'All News'])


@if (count($uaes_news)>0)
    
     <!-- UAES Blog Start-->
     <section class="blog-carousel-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">From UAES</span>
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

            @foreach ($uaes_news as $uaes_)
                <!--Blog One Single Start-->
                <div class="item">
                    <div class="blog-one__single">
                        <div class="blog-one__img">
                            <img src="{{asset('assets/images/news')}}/{{$uaes_->image}}" alt="{{$uaes_->title}}" style="height:15rem">
                            <div class="blog-one__date">
                              <p>{{ Carbon\Carbon::parse($uaes_->created_at)->isoFormat('MMM DD YY') }}</p>
                            </div>
                        </div>
                        <div class="blog-one__content">
                            <ul class="blog-one__meta list-unstyled">
                                <li>
                                    <a href="{{route('front.single.news',$uaes_->slug)}}"><i class="fas fa-user-circle"></i>{{$uaes_->type}}</a>
                                </li>
                                <li>
                                    <a href="{{route('front.single.news',$uaes_->slug)}}"><i class="fas fa-comments"></i>0 Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-one__title">
                            <a href="{{route('front.single.news',$uaes_->slug)}}">
                                {{-- {{$uaes_->title}} --}}
                                {!! Illuminate\Support\Str::limit($uaes_->title, 50) !!}
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
    <!--UAES Blog End-->

    
     <!--FUNNAB Blog Start-->
     <section class="blog-carousel-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">From FUNNAB</span>
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

           
           {{-- FUNNAB --}}
           @if (count($funnab_news)>0)
           @foreach ($funnab_news as $funnab_)
               <!--Blog One Single Start-->
               <div class="item">
                   <div class="blog-one__single">
                       <div class="blog-one__img">
                           <img src="{{asset('assets/images/news')}}/{{$funnab_->image}}" alt="{{$funnab_->title}}">
                           <div class="blog-one__date">
                             <p>{{ Carbon\Carbon::parse($funnab_->created_at)->isoFormat('MMM DD YY') }}</p>
                           </div>
                       </div>
                       <div class="blog-one__content">
                           <ul class="blog-one__meta list-unstyled">
                               <li>
                                   <a href="{{route('front.single.news',$funnab_->slug)}}"><i class="fas fa-user-circle"></i>{{$funnab_->type}}</a>
                               </li>
                               <li>
                                   <a href="{{route('front.single.news',$funnab_->slug)}}"><i class="fas fa-comments"></i>0 Comments</a>
                               </li>
                           </ul>
                           <h3 class="blog-one__title">
                           <a href="{{route('front.single.news',$funnab_->slug)}}">
                               {{-- {{$funnab_->title}} --}}
                               {!! Illuminate\Support\Str::limit($funnab_->title, 50) !!}
                           </a>
                       </h3>
                       </div>
                   </div>
               </div>
               <!--Blog One Single End-->
               @endforeach
              @endif
              {{-- FUNNAB --}}

            </div>
        </div>
    </section>
    <!--FUNNAB Blog End-->


     <!--ALHIKMAH Blog Start-->
     <section class="blog-carousel-page">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">From ALHIKMAH</span>
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

           
           {{-- FUNNAB --}}
           @if (count($alhikmah_news)>0)
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
                                   <a href="{{route('front.single.news',$alhikmah_->slug)}}"><i class="fas fa-user-circle"></i>{{$alhikmah_->type}}</a>
                               </li>
                               <li>
                                   <a href="{{route('front.single.news',$alhikmah_->slug)}}"><i class="fas fa-comments"></i>0 Comments</a>
                               </li>
                           </ul>
                           <h3 class="blog-one__title">
                           <a href="{{route('front.single.news',$alhikmah_->slug)}}">
                               {{-- {{$alhikmah_->title}} --}}
                               {!! Illuminate\Support\Str::limit($alhikmah_->title, 50) !!}
                           </a>
                       </h3>
                       </div>
                   </div>
               </div>
               <!--Blog One Single End-->
               @endforeach
              @endif
              {{-- FUNNAB --}}

            </div>
        </div>
    </section>
    <!--ALHIKMAH Blog End-->
     
@endif

<!--Site Footer Start-->
@include('frontend.includes.footer')
<!--Site Footer End-->


@endsection
