@extends('admin.layout')
@section('title', 'Profile')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Profile') }}</h5>
                            <span>{{ __('Edit Profile') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Pages') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @include('admin.include.message')
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/users') }}/{{ Auth::user()->image }}" class="rounded-circle"
                                width="150" />
                            <h4 class="card-title mt-10">{{ Auth::user()->name }}</h4>
                            <p class="card-subtitle">
                                @role('Super Admin')
                                    Super Admin
                                @endrole
                                @role('New Manager')
                                    News Manager
                                @endrole
                            </p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block">{{ __('Email address') }} </small>
                        <h6>{{ Auth::user()->email }}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Phone') }}</small>
                        <h6>{{ Auth::user()->phone }}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Address') }}</small>
                        <h6>Abuja Nigeria</h6>
                        {{-- <small class="text-muted d-block pt-30">{{ __('Social Profile') }}</small>
                        <br /> --}}
                        {{-- <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('account.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="example-name">{{ __('Full Name') }}</label>
                                <input type="text" class="form-control" name="name" id="example-name"
                                    value="{{ Auth::user()->name }}" required>
                            </div>
                            

                            @if(auth()->user()->hasRole('Super Admin'))
                            <div class="form-group">
                                <label for="example-email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    id="example-email" >
                            </div>
                            @elseif (auth()->user()->hasRole(["funnab","alhikmah"]))
                            <div class="form-group">
                                <label for="example-email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"
                                    id="example-email" readonly>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="example-password">{{ __('Profile Picture') }}</label>
                                <input type="file" class="form-control" name="image" id="img">
                            </div>
                            @hasrole('Super Admin')
                                <div class="form-group">
                                    <label for="example-password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" name="password" id="example-password">
                                </div>
                                <div class="form-group">
                                    <label for="example-password">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="example-password">
                                </div>

                            @endhasrole
                            <div class="form-group">
                                <label for="example-phone">{{ __('Phone No') }}</label>
                                <input type="text" placeholder="Phone number" id="example-phone" name="phone"
                                    value="{{ Auth::user()->phone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
