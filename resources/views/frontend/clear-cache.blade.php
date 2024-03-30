@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Clear Cache')

<div class="page-wrapper">
  
    @section('content')
    @include('frontend.includes.banner',['header1'=>'Clear Cache','header2'=>'Clear Cache'])
    

    <!--About Three Start-->
    <section class="about-three">
        <div class="container">
            <section class="cta-one">
                <div class="cta-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                    style="background-image: url(eup/eup/images/backgrounds/cta-one-bg.jpg);"></div>
                <div class="container">
                    <div class="row">
                        <!-- start message area-->
                        @include("frontend.includes.message")
                        <!-- end message area-->
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="text-center">
                                        <i class="ik ik-battery-charging text-green font-150"></i>
                                        <h4 class="text-center">WOW! Cache Cleared!!</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--About Three End-->



    <!--Cta One Start-->
   
    <!--Cta One End-->

    <!--Site Footer Start-->
  @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
