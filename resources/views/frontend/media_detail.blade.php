@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Media')

<div class="page-wrapper">

    @section('content')
        @include('frontend.includes.banner', ['header1' => 'Media', 'header2' => 'Media'])

        @php            
        if ($media->media_type == "pdf") {
            $img = "eup/media/pdf.png";
            }elseif ($media->media_type == "word") {
                $img = "eup/media/word.jpg";
            }elseif ($media->media_type == "youtube") {
                $img = "eup/media/youtube.png";
            }elseif ($media->media_type == "video") {
                $img = "eup/media/video.png";
            }elseif ($media->media_type == "link") {
                $img = "eup/media/file_icon.jpg";
            }
            else{
                $img = "eup/media/placeholder.jpeg";
            }  
        @endphp

        <!--Project Details Start-->
        <section class="project-details mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 mx-auto">
                        <div class="project-details__top">
                            <div class="project-details__img">
                                <img src="{{ asset($img) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-details__content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12" style="text-align:center">
                            <div class="project-details__content-left">
                                <h3 class="project-details__title-1">{{ $media->title }}</h3>
                    <p class="project-details__text-1">
                                {!! $media->description!!}     
                                <br>
                    {{-- @php            
                    if ($media->media_type == "pdf") {
                    $img = "eup/media/pdf.png";
                    }elseif ($media->media_type == "word") {
                    $img = "eup/media/word.jpg";
                    }elseif ($media->media_type == "youtube") {
                    $img = "eup/media/youtube.png";
                    }elseif ($media->media_type == "video") {
                    $img = "eup/media/video.png";
                    }else{
                    $img = "eup/media/placeholder.jpeg";
                    }  
                    @endphp --}}
                    @if ($media->media_type === "video")
                    <div class="col-md-8 col-lg-8 mx-auto">
                        <video width="100%"  controls>
                            <source src="{{ asset("eup/media/$media->mediafile") }}" type="video/mp4">
                            <source src="{{ asset("eup/media/$media->mediafile") }}" type="video/ogg">
                          Your browser does not support the video tag.
                          </video>  
                    </div> 
                    @endif

                    @if ($media->media_type === "pdf")
                    <a href="{{ asset("eup/media/$media->mediafile") }}"><i class="fas fa-download"></i>Download File</a>
                    @endif
                    @if ($media->media_type === "youtube")
                    {{-- <a href="{{ asset("$media->video_link") }}" target="_blank"><i class="fas fa-video"></i>Watch Youtube</a> --}}
                            <iframe width="315" height="560"
                            src="https://www.youtube.com/embed/jL2ef75WfaM"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    @endif
                </p>
                              
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="project-details__btn-box">
                    <a href="{{ route("front.media") }}" class="thm-btn project-details__btn">Go back<i class="icon-right-arrow"></i> </a>
                </div>
            </div>
        </section>
        <!--Project Details End-->


        <!--Site Footer Start-->
        @include('frontend.includes.footer')
        <!--Site Footer End-->

    </div><!-- /.page-wrapper -->

@endsection
