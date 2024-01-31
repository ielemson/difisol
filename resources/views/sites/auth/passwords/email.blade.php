@extends('layouts.front')


@section('content')
@section('title', 'Reset your password')
@include('frontend.include.innerBanner', ['banner_title' => 'Reset your password'])

<div class="user-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="user-img">
                    <img src="{{asset('assets/images/reset.jpeg')}}" alt="login"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="user-all-form">
                    <div class="contact-form">
                        <h3 class="user-title">
                            Reset Your Password</h3>
                          
                    <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                            <div class="row">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                       
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                             
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        {{ __('Send Password Reset Link') }}
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
