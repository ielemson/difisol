@extends('layouts.main') 
@section('title', 'Form Components')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Components')}}</h5>
                            <span>{{ __('Create Slider')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Slider')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-md-8 mx-auto">
                @include('include.message')
                <div class="card">
                    <div class="card-header"><h3>{{ __('Create Slider')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('slider.update',$slider->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">{{ __('Header')}}</label>
                                        <input type="text" class="form-control " id="exampleInputName1" placeholder="Enter Header" name="header" value="{{$slider->header}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('File upload')}}</label>
                                    <input type="file" name="img" class="form-control">
                                </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ __('Content')}}</label>
                                        <textarea  class="form-control" id="" placeholder="Enter Slider Content" name="content" required>{{$slider->content}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-30">
                                   
                                    <div class="form-radio">
                                    
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="status" value="1" checked="checked" {{$slider->status == 1 ? 'checked':''}}>
                                                    <i class="helper"></i>{{ __('Publish')}}
                                                </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <label>
                                                    <input type="radio" name="status" value="0" {{$slider->status == 0 ? 'checked':''}}>
                                                    <i class="helper"></i>{{ __('Unpublish')}}
                                                </label>
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <img src="{{asset('assets/images/sliders')}}/{{$slider->img}}" alt="" style="width: 80%">
                                </div>
                                <div class="col-sm-12 mt-5">
                                    <div class="form-group">
                                   
                                        <button class="btn btn-info btn-lg">Update Slider</button>
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
    @push('script')
        <script src="{{ asset('js/form-components.js') }}"></script>
    @endpush
@endsection