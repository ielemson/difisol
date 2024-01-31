@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')
@section('title', 'Account Login')
<div class="page-wrapper">
@section('content')
    @include('frontend.includes.banner',['header1'=>'Login','header2'=>'Login'])

      <!--Contact Two Start-->
      <section class="contact-two">
        <div class="contact-two__shape-1 float-bob-x">
            <img src="assets/images/shapes/contact-two-shape-1.png" alt="">
        </div>
        <div class="container">
            <div class="section-title text-center">
                {{-- <span class="section-title__tagline">Write a Message</span> --}}
                <h2 class="section-title__title">Account Login</h2>
                <div class="section-title__icon">
                    <img src="assets/images/icon/section-title-icon-1.png" alt="">
                </div>
            </div>
            <div class="contact-two__form-box">
                
                    <form method="POST" class="contact-two__form " action="{{ route('login') }}">
                        @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                       
                            </div>
                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-form__input-box">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="password" autofocus>
                                   
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                      
                       
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            
                            <div class="contact-form__btn-box">
                                <button type="submit" class="thm-btn contact-two__btn">Login<i
                                        class="icon-right-arrow"></i> </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Contact Two End-->

    @include('frontend.includes.footer')
</div>
@endsection

