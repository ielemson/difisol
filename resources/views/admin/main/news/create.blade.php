@extends('admin.layout')
@section('title', 'Create News')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Create News</h5>
                            <span>Add news</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Add Product</a>
                            </li>
                        </ol>
                    </nav>
                  
                </div>
            </div>
              <!-- start message area-->
              @include('admin.include.message')
              <!-- end message area-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" role="form"
                            id="uploadForm">
                            @csrf

                            <div class="col-md-12" style="width: 100%">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="newstitle">News Title</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" name="title" placeholder="News title"
                                                        class="form-control" id="newstitle" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categories</label><span class="text-danger">*</span>
                                                    <select name="category_id" class="form-control select2" required>
                                                        <option value="">Select New Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>News Content</label><span class="text-danger">*</span>
                                                    <textarea class="textarea html-editor form-control" name="details" id="summernote" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Title</label>
                                                    <input type="text" name="meta_title" placeholder="Meta  title"
                                                        class="form-control" id="meta_title">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Keywords</label>
                                                    <input type="text" name="meta_keywords" placeholder="Meta Keywords"
                                                        class="form-control" id="meta_keywords">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Description</label>
                                                    <input type="text" name="meta_description"
                                                        placeholder="Meta Description" class="form-control"
                                                        id="meta_decription">
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="status" id="status"
                                                        required="">
                                                        <option value="" selected="selected">-- Select an option --
                                                        </option>
                                                        <option value="1">Published</option>
                                                        <option value="0">Unpublished</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" col-4">
                                                <div class="form-group">
                                                    <label for="type">Type</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="type" id="type"
                                                        required="">
                                                        <option value="" selected="selected">-- Select an option --
                                                        </option>
                                                        <option value="article">Article</option>
                                                        <option value="feature">Feature</option>
                                                        <option value="news">News</option>
                                                        <option value="activity">Activities</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="published_at">Published At</label> <span
                                                        class="text-danger">*</span>
                                                    <input class="form-control" type="datetime-local" name="published_at"
                                                        id="published_at" placeholder="Published At" required="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="box box-primary">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="newsimage">Featured Image</label>
                                                <input type="file" name="image" id="file" required>
                                                <p class="help-block">(Image must be in .png or .jpg format)</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-body">
                                            
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="status" checked> Published
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="featured"> Featured
                                                    </label>
                                                </div>
                                            </div>
                            
                                           
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">CREATE</button>
                                        <a href="{{ route("news.list") }}"  class="btn btn-warning btn-flat">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        //$('#uploadForm + img').remove();
                        //$('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');
                        $('#uploadForm + embed').remove();
                        $('#uploadForm').after('<embed src="' + e.target.result + '" width="250" height="250">');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file").change(function() {
                filePreview(this);
            });
        </script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                placeholder: 'Please ensure to paste from MS word, Notepad. Avoid pasting directly from other websites.',
                tabsize: 2,
                height: 300,
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
