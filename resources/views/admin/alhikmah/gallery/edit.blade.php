@extends('admin.layout') 
@section('title', 'Add Gallery')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Create Gallery')}}</h5>
                            <span>{{ __('Create new gallery')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Create Gallery')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('admin.include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Create Gallery')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('gallery.update',$gallery->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">

                                   
                                    <div class="form-group">
                                        <label for="header">{{ __('Partner List')}}<span class="text-red">*</span></label>
                                        <select name="partner" class="form-control" required>
                                            <option value="">Select Status</option>
                                            @foreach ($partners as $partner)
                                            <option value="{{strtolower($partner->header)}}" {{ $partner->header == "AlHIKMAH" ? "selected" : "disabled" }}>{{$partner->header}}</option> 
                                            @endforeach
                                           
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('partner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label for="header">{{ __('Status')}}<span class="text-red">*</span></label>
                                        <select name="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="1"{{$gallery->status == 1 ? 'selected': ''}}>Published</option>
                                            <option value="2" {{$gallery->status == 2 ? 'selected': ''}}>Unpublished</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Image')}}</label>
                                        {{-- <input type="file" name="image" class="file-upload-default" required> --}}
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image">
                                            {{-- <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload')}}</button>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for="name">{{ __('Gallery Title')}}<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control html-editor @error('title') is-invalid @enderror" name="title" value=" {{$gallery->title}}" />
                                     
                                        <div class="help-block with-errors"></div>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img src="{{ asset('eup/images/gallery') }}/{{ $gallery->image }}" alt="">
                                </div>
                           
                                
                                <div class="col-md-12 mt-10">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
   
    
@endsection

