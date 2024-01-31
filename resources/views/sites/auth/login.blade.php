@extends('layouts.front')


@section('content')
@section('title', 'Sign in')
@include('frontend.include.innerBanner', ['banner_title' => 'Sign in'])

<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-img">
                    <img src="assets/images/register.jpg" alt="login"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title">
                            Sign in</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                       
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password"   required>
                                       
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    
                                </div>
                               
                                <div class="col-lg-12 form-condition">
                                    <div class="agree-label">
                                        <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                        <label for="chb1">
                                            Remember Me
                                            <a class="forget" href="{{route('password.forget')}}">Forgot Password?</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        Login Now
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
