@extends('layouts.front')


@section('content')
@section('title', 'Register Account')
@include('frontend.include.innerBanner', ['banner_title' => 'Register Account'])

<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-img">
                    <img src="assets/images/register.jpg" alt="faq"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title">
                            Register Account</h3>
                            <form action="{{url('register')}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input id="name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                                        <i class="ik ik-user"></i>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                        <i class="ik ik-user"></i>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"   required>
                                        <i class="ik ik-lock"></i>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    </div>
                                    <div class="form-group">
                                        <input id="password_confirmation" type="password" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"   required>
                                        <i class="ik ik-lock"></i>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col text-left">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                                <span class="custom-control-label">&nbsp;Remember Me</span>
                                            </label>
                                        </div>
                                        <div class="col text-right">
                                            <a class="btn text-danger" href="{{url('password/forget')}}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                         
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-rounded">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
