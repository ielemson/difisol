@php
$setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Ahikmah News')
<div class="page-wrapper">

@section('content')
@include('frontend.alhikmah.banner',['header1'=>'ALHIKMAH News','header2'=>'ALHIKMAH News'])

@if (count($activities)>0)
<!--Blog Page Start-->
<section class="blog-page">
   <div class="container">
       <div class="row">
           @foreach ($activities as $activity)
               <!--Blog One Single Start-->
           <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
               <div class="blog-one__single">
                   <div class="blog-one__img">
                       <img src="{{asset('assets/images/news')}}/{{$activity->image}}" alt="{{$activity->title}}" alt="">
                       <div class="blog-one__date">
                        <p>
                           {{ Carbon\Carbon::parse($activity->created_at)->isoFormat('MMM DD YY') }}
                        </p>
                       </div>
                   </div>
                   <div class="blog-one__content">
                       <ul class="blog-one__meta list-unstyled">
                           <li>
                               <a href="{{route('front.single.news',$activity->slug)}}"><i class="fas fa-user-circle"></i>Admin</a>
                           </li>
                           <li>
                               <a href="{{route('front.single.news',$activity->slug)}}"><i class="fas fa-comments"></i>0 Comments</a>
                           </li>
                       </ul>
                       <h3 class="blog-one__title">
                       <a href="{{route('front.activity',$activity->slug)}}">
                           {{$activity->title}}    
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
<!--Blog Page End-->
@endif

<!--Site Footer Start-->
@include('frontend.includes.footer')
<!--Site Footer End-->


@endsection
