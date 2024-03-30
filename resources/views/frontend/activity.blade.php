@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Our News')
<div class="page-wrapper">
   
    @section('content')
    @include('frontend.includes.banner',['header1'=>'Our Activity','header2'=>'Our Activity'])
    
      <!--Blog Details Start-->
      <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{asset('assets/images/news')}}/{{$activity->image}}" alt="{{$activity->title}}">
                            <div class="blog-details__date">
                                <p>{{ Carbon\Carbon::parse($activity->created_at)->isoFormat('MMM DD YY') }}</p>
                           
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="#"><i class="fas fa-user-circle"></i> Admin</a>
                                </li>
                                <li><a href="#"><i class="fas fa-comments"></i> 0
                                        Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">{{$activity->title}}</h3>
                            
                                {!!$activity->details!!}
    
                        </div>
                    
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Latest Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($activity_latest as $latest)
                                    <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/images/news')}}/{{$activity->image}}" alt="{{$activity->title}}">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <span class="sidebar__post-content-meta"><i
                                                    class="fas fa-user-circle"></i>Admin</span>
                                            <a href="{{route('front.single.news',$latest->slug)}}">{{$latest->title}}</a>
                                        </h3>
                                    </div>
                                </li>
                                 
                                @endforeach
                               
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Details End-->
    <!--Site Footer Start-->
    @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
