@extends('layouts.main') 
@section('title', 'Profile')
@section('content')
    

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Profile')}}</h5>
                            <span>{{ __('Edit Profile')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center"> 
                            <img src="../img/user.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ Auth::user()->name}}</h4>
                            <p class="card-subtitle">
                            @role('Admin')
                              Super Admin
                            @endrole 
                            @role('New Manager')
                              News Manager
                            @endrole 
                           
                            </p>
                            {{-- <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                            </div> --}}
                        </div>
                    </div>
                    <hr class="mb-0"> 
                    <div class="card-body"> 
                        <small class="text-muted d-block">{{ __('Email address')}} </small>
                        <h6>{{Auth::user()->email}}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Phone')}}</small>
                        <h6>{{Auth::user()->phone}}</h6> 
                        <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                        <h6>Abuja Nigeria</h6>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d61416027.02238448!2d51.2165195!3d-20.027946!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e745f4cd62fd9%3A0x53bd17b4a20ea12b!2sAbuja%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1703168269803!5m2!1sen!2sng" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <small class="text-muted d-block pt-30">{{ __('Social Profile')}}</small>
                        <br/>
                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{route('account.update')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="example-name">{{ __('Full Name')}}</label>
                                    <input type="text" class="form-control" name="name" id="example-name" value="{{Auth::user()->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="example-email">{{ __('Email')}}</label>
                                    <input type="email"  class="form-control" name="email" value="{{Auth::user()->email}}" id="example-email">
                                </div>
                               @hasrole('Super Admin')
                               <div class="form-group">
                                <label for="example-password">{{ __('Password')}}</label>
                                <input type="password"  class="form-control" name="password" id="example-password">
                            </div>
                            <div class="form-group">
                                <label for="example-password">{{ __('Confirm Password')}}</label>
                                <input type="password"  class="form-control" name="password_confirmation" id="example-password">
                            </div>
                               @endhasrole
                                <div class="form-group">
                                    <label for="example-phone">{{ __('Phone No')}}</label>
                                    <input type="text" placeholder="Phone number" id="example-phone" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                  
                                <button class="btn btn-success" type="submit">Update Profile</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
