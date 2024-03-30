@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Media')

<div class="page-wrapper">

    @section('content')
        @include('frontend.includes.banner', ['header1' => 'Media', 'header2' => 'Media'])

     
      <!--Project Page One Start-->
      <section class="project-page-one">
        <div class="container">
            <div class="row">
                @if (count($medias) > 0)
                @foreach ($medias as $media)
                <!--Project Page One Single Start-->
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="600ms">
                    <div class="project-one__single">
                        <div class="project-one__inner">
                            @php
                            
                            if ($media->media_type == "pdf") {
                                $img = "eup/media/pdf.png";
                                }elseif ($media->media_type == "word") {
                                    $img = "eup/media/word.jpg";
                                }elseif ($media->media_type == "youtube") {
                                    $img = "eup/media/youtube.png";
                                }elseif ($media->media_type == "video") {
                                    $img = "eup/media/video.png";
                                }elseif ($media->media_type == "link")  {
                                    $img = "eup/media/file_icon.jpg";
                                }
                                else{
                                    $img = "eup/media/placeholder.jpeg";
                                }
                                
                            @endphp

                            <div class="project-one__img">

                                <img src="{{ asset("$img") }}" alt="">
                            </div>
                            <div class="project-one__arrow">
                                <a href="{{ route("front.media.details",$media->id) }}"><i class="icon-right-arrow"></i></a>
                            </div>
                            <div class="project-one__content">
                                <span class="project-one__tagline">{{ $media->media_type }}</span>
                                <h3 class="project-one__title"><a href="{{ route("front.media.details",$media->id) }}" style="font-size:1rem">
                                {{ $media->title }}
                                </a>
                            </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Project Page One Single Start--> 
                @endforeach
                @endif
               
            </div>
            {{-- <div class="project-page-one__btn">
                <a href="project-details.html" class="thm-btn project-page__btn">Load More <i
                        class="icon-right-arrow"></i>
                </a>
            </div> --}}
        </div>
    </section>
    <!--Project Page One End-->


        <!--Site Footer Start-->
        @include('frontend.includes.footer')
        <!--Site Footer End-->

    </div><!-- /.page-wrapper -->

@endsection
