@extends('admin.layout') 
@section('title', 'Edit Media')
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
                            <h5>{{ __('Edit Media')}}</h5>
                            <a href="{{ route("media.index") }}">{{ __('Go to media list')}}</a>
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
                                <a href="#">{{ __('Edit Media')}}</a>
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
                        <h3>{{ __('Edit Media')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('media.update',$media->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="header">{{ __('Partner List')}}<span class="text-red">*</span></label>
                                        <select name="partner" class="form-control" required>
                                            <option value="">Select Status</option>
                                            @foreach ($partners as $partner)
                                                <option value="{{strtolower($partner->slug)}}" {{strtolower($partner->slug) == $media->partner ?'selected':''}}>{{$partner->header}}</option> 
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
                                            <option value="1"{{$media->status == 1 ? 'selected': ''}}>Published</option>
                                            <option value="2" {{$media->status == 2 ? 'selected': ''}}>Unpublished</option>
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
                                    <label for="header">{{ __('Media Type')}}<span class="text-red">*</span></label>
                                    <select name="media_type" class="form-control" required>
                                        <option value="">Select Media Type</option>
                                        <option value="video" {{$media->media_type == "video" ? 'selected': ''}}>video</option>
                                        <option value="link" {{$media->media_type == "link" ? 'selected': ''}}>link</option>
                                        <option value="pdf" {{$media->media_type == "pdf" ? 'selected': ''}}>pdf</option>
                                        {{-- <option value="word" {{$media->media_type == "link" ? 'selected': ''}}>word</option> --}}
                                        <option value="word" {{$media->media_type == "youtube" ? 'selected': ''}}>Youtube</option>
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
                                        <label>{{ __('Media File')}}</label>
                                        {{-- <input type="file" name="image" class="file-upload-default" required> --}}
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="mediafile">
                                            {{-- <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload')}}</button>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Youtube Link')}}</label>
                                        {{-- <input type="file" name="image" class="file-upload-default" required> --}}
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="video_link" value="{{ $media->video_link }}">
                                            {{-- <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload')}}</button>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for="name">{{ __('Title')}}<span class="text-red">*</span></label>
                                        <input id="" type="text" class="form-control html-editor @error('content') is-invalid @enderror" name="title" rows="2" value=" {{$media->title}} " required/>
                                        <div class="help-block with-errors"></div>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Media Description</label><span class="text-danger">*</span>
                                        <textarea class="textarea html-editor form-control" name="description" id="summernote" required>{{$media->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
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

@endsection

