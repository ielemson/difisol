@extends('admin.layout')
@section('title', 'Update News')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Update News</h5>
                            <a href="{{ route("news.list") }}">News List</a>
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
                                <a href="#">Update News</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- start message area-->
                    @include('admin.include.message')
                    <!-- end message area-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data"
                            role="form" id="uploadForm">
                            @csrf

                            <div class="col-md-12" style="width: 100%">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="newstitle">News Title</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text" name="title" value="{{ $news->title }}"
                                                        class="form-control" id="newstitle" required>
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Categories</label><span class="text-danger">*</span>
                                                    <select name="category_id" class="form-control select2" required>
                                                        <option value="">Select New Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>News Content</label><span class="text-danger">*</span>
                                                    <textarea class="textarea html-editor form-control" name="details" id="summernote" required>
{{ $news->details }}
</textarea>
                                                </div>
                                                @error('details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Title</label>
                                                    <input type="text" name="meta_title" value="{{ $news->meta_title }}"
                                                        class="form-control" id="meta_title">
                                                    @error('meta_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Keywords</label>
                                                    <input type="text" name="meta_keywords"
                                                        value="{{ $news->meta_keywords }}" class="form-control"
                                                        id="meta_keywords">
                                                    @error('meta_keywords')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="newstitle">Meta Description</label>
                                                    <input type="text" name="meta_description"
                                                        value="{{ $news->meta_description }}" class="form-control"
                                                        id="meta_decription">
                                                    @error('meta_description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="status" id="status"
                                                        required="">
                                                        <option value="" selected="selected">-- Select an option --
                                                        </option>
                                                        <option value="1" {{ $news->status == 1 ? 'selected' : '' }}>
                                                            Published</option>
                                                        <option value="0" {{ $news->status == 0 ? 'selected' : '' }}>
                                                            Unpublished</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class=" col-4">
                                                <div class="form-group">
                                                    <label for="type">Type</label> <span class="text-danger">*</span>
                                                    <select class="form-control" name="type" id="type"
                                                        required="">
                                                        <option value="" selected="selected">-- Select an option --
                                                        </option>
                                                        <option value="article"
                                                            {{ $news->type == 'article' ? 'selected' : '' }}>Article
                                                        </option>
                                                        <option value="feature"
                                                            {{ $news->type == 'feature' ? 'selected' : '' }}>Feature
                                                        </option>
                                                        <option value="news"
                                                            {{ $news->type == 'news' ? 'selected' : '' }}>News</option>
                                                        <option value="activity"
                                                            {{ $news->type == 'activity' ? 'selected' : '' }}>Activities
                                                        </option>
                                                    </select>
                                                    @error('type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="published_at">Published At</label> <span
                                                        class="text-danger">*</span>
                                                    <input class="form-control" type="datetime-local" name="published_at"
                                                        id="published_at" value="{{ $news->published_at }}"
                                                        required="">
                                                    @error('published_at')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="box box-primary">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="newsimage">Featured Image</label>
                                                <input type="file" name="image" id="file">
                                                <p class="help-block">(Image must be in .png or .jpg format)</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <img src="{{ asset('assets/images/news') }}/{{ $news->image }}" alt=""
                                        style="width:50%" class="img-thumbnail">
                                </div>

                                <div class="col-md-4">
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">Update</button>
                                        <a href="{{ route("news.list") }}" class="btn btn-warning btn-flat">Cancel</a>
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
