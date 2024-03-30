@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', '404')

<div class="page-wrapper">
  
    
@section('content')
    {{-- @include('frontend.includes.banner',['header1'=>'404 ERROR PAGE','header2'=>'404']) --}}
    



    <!--Site Footer Start-->
  {{-- @include('frontend.includes.footer') --}}
    <!--Site Footer End-->
    <div class="page-wrapper">
    
        <!--Error Page Start-->
        <section class="error-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="error-page__inner">
                            <div class="error-page__title-box">
                                <h2 class="error-page__title">404</h2>
                            </div>
                            <h3 class="error-page__tagline">Sorry, We Can't Find that Page!</h3>
                            <p class="error-page__text">The page you are looking for was moved, removed, renamed or
                                never existed.</p>
                          
                            <div class="error-page__btn-box">
                                <a href="{{ url("/") }}" class="thm-btn error-page__btn">Back to Home<i
                                        class="icon-right-arrow"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Error Page End-->

    </div><!-- /.page-wrapper -->

</div><!-- /.page-wrapper -->

@endsection
