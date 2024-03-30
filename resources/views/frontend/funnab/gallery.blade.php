@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Gallery')
<div class="page-wrapper">
   
    @section('content')
    @include('frontend.funnab.banner',['header1'=>'FUNNAB Gallery','header2'=>'FUNNAB Gallery'])
    
  <!--Project Page Two Start-->
  @if (count($galleries) > 0)
  <section class="project-page-two">
      <div class="container">
          <div class="section-title text-center">
              {{-- <span class="section-title__tagline">From the Blog Post</span> --}}
              <h3 class="section-title__title">Funnab Gallery</h3>
              <div class="section-title__icon">
                  <img src="{{ asset("eup/images/icon/section-title-icon-1.png") }}" alt="">
              </div>
          </div>
          <div class="row">
              @foreach ($galleries as $gallery)
                  <!--Project Page Two Single Start-->
              <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                  <div class="project-two__single">
                      <div class="project-two__img">
                          <img src="{{asset('eup/images/gallery')}}/{{$gallery->image}}" alt="">
                          <div class="project-two__content">
                              <h3 class="project-two__title">
                                  <a href="{{asset('eup/images/gallery')}}/{{$gallery->image}}" style="font-size:1rem" data-lightbox="{{$gallery->partner}}" data-title="{{$gallery->title}}">
                                 {{$gallery->title}} 
                              </a>
                          </h3>
                              <div class="project-two__arrow">
                                  <a href="{{asset('eup/images/gallery')}}/{{$gallery->image}}" data-lightbox="{{$gallery->partner}}" data-title="{{$gallery->title}}"><span class="icon-right-arrow"></span></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--Project Page Two Single Start-->
              @endforeach
              
            
          </div>
         
      </div>
  </section>
  @endif
  <!--Project Page Two End-->

    <!--Site Footer Start-->
    @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
