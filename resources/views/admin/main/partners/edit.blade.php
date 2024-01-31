@extends('admin.layout') 
@section('title', 'Edit Partner')
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
                            <h5>{{ __('Edit Partner ')}}</h5>
                            <span>{{ __('Edit Partner')}}</span>
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
                                <a href="#">{{ __('Add Service')}}</a>
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
                        <h3>{{ __('Update Partner')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('partner.update',$service->id)}}" method="POST" enctype="multipart/form-data" role="form" id="">
                        @csrf
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label for="header">{{ __('Partner Name')}}<span class="text-red">*</span></label>
                                        <input id="header" type="text" value="{{$service->header}}" class="form-control @error('header') is-invalid @enderror" name="header" value="" placeholder="Enter Partner" required>
                                        <div class="help-block with-errors"></div>

                                        @error('header')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label for="header">{{ __('Status')}}<span class="text-red">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="1" {{$service->status == 1 ? 'selected': '' }}>Publish</option>
                                        <option value="0" {{$service->status == 0 ? 'selected': '' }}>Unpublish</option>
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
                                        <label>{{ __('image')}}</label>
                                       
                                        <div class="form-group col-xs-12">
                                            <input type="file" class="form-control" name="image">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Content')}}<span class="text-red">*</span></label>
                                        <textarea  type="text" class="form-control html-editor @error('content') is-invalid @enderror" name="content"  placeholder="Enter service content" required id="summernote">
                                        {{$service->content}}
                                        </textarea>
                                        <div class="help-block with-errors"></div>

                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                           
                                <div class="col-md-6">
                                    <img src="{{asset('assets/images/partners')}}/{{$service->image}}" alt="" style="width: 50%">
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Update')}}</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('script')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Please ensure to paste from MS word, Notepad. Avoid pasting directly from other websites.',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endpush
