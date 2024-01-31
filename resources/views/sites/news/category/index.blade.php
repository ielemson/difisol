@extends('layouts.main')
@section('title', 'Categories')
@section('content')
    <!-- push external head elements to head -->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-list bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Categories') }}</h5>
                            <span>Add, remove or edit product categories</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Categories') }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="mb-2 clearfix">
                    <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions"
                        role="button" aria-expanded="true" aria-controls="displayOptions">
                        {{ __('Display Options') }}
                        <i class="ik ik-chevron-down align-middle"></i>
                    </a>
                    <div class="collapse d-md-block display-options" id="displayOptions">

                        <div class="d-block d-md-inline-block">

                        </div>
                        <div class="float-md-right">

                            <button class="btn btn-outline-primary btn-rounded-20" href="#categoryAdd" data-toggle="modal"
                                data-target="#categoryAdd">
                                Add Category
                            </button>
                        </div>
                    </div>
                </div>
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                                <div class="card d-flex flex-row mb-3">

                                    @if ($category->status == 1)
                                        <span
                                            class="badge badge-pill badge-success position-absolute badge-top-left">Published</span>
                                    @else
                                        <span
                                            class="badge badge-pill badge-warning position-absolute badge-top-left">Unpublished</span>
                                    @endif

                                    <a class="d-flex card-img catTray" href="#categoryView" data-toggle="modal"
                                        data-target="#categoryView" data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}" data-status="{{ $category->status }}">
                                        <span class="badge badge-pill badge-info  badge-top-left">Edit</span>
                                    </a>

                                    <div class="d-flex flex-grow-1 min-width-zero card-content">
                                        <div
                                            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center mb-0">
                                            <a class="mb-1 list-item-heading  truncate w-40 w-xs-100">
                                                <b>{{ $category->name }}
                                                </b>
                                                <span class="text-muted">
                                                </span>

                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- category add modal-->
    <div class="modal fade edit-layout-modal pr-0 " id="categoryAdd" tabindex="-1" role="dialog"
        aria-labelledby="categoryAddLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryAddLabel">{{ __('Add Category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.category.store') }}" method="POST">
                        @csrf
                        {{-- <div class="form-group">
<label class="d-block">Category Image</label>
<input type="file" name="category_image" class="form-control">
</div> --}}
                        <div class="form-group">
                            <label class="d-block">Category Title</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name="cat_name" class="form-control" placeholder="Enter Category Name"
                                required>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="status" value="1">
                                    Publish
                                </label>
                                <label>
                                    <input type="radio" name="status" value="0">
                                    UnPublish
                                </label>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- category edit modal -->
    <div class="modal fade edit-layout-modal pr-0 " id="categoryView" tabindex="-1" role="dialog"
        aria-labelledby="categoryViewLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryViewLabel">{{ __('Edit Category') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="updateCategoryForm" method="post" action="javascript:void(0)">
                        @csrf
                        <div class="form-group">
                            <label class="d-block">Category Title</label>
                            <input type="text" name="cat_name" class="form-control category_name"
                                placeholder="Enter Category Title" required>
                            <input type="hidden" class="categoryId" name="id">
                        </div>

                        {{-- <div class="form-group">
<div class="checkbox">
<label>
<input type="checkbox" name="status" class="category_status"  id="check_status"> Active
</label>
</div>
</div> --}}
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="status" id="publish" value="1">
                                    Publish
                                </label>
                                <label>
                                    <input type="radio" name="status" id="unpublish" value="0">
                                    UnPublish
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" id="Update" type="submit">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $(".catTray").on("click", function() {

                    var dataId = $(this).attr("data-id");
                    var dataName = $(this).attr("data-name")
                    var status = $(this).attr("data-status")
                    $('.category_name').val(dataName)
                    $('.categoryId').val(dataId)

                    if (status == 1) {
                        $('#publish')[0].checked = true;
                    } else {
                        $('#unpublish')[0].checked = false;
                    }
                });

                // Update category
                $("#Update").click(function(e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();

                    var type = "POST";
                    var ajaxurl = '/admin/news/category/update';
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: $('#updateCategoryForm').serialize(),
                        dataType: 'json',
                        success: function(data) {
                            if (data.status == 200) {
                                //  console.log(data)
                                location.reload()
                            } else {
                                alert('Error Occured')
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
