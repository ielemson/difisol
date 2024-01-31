@extends('layouts.main')
@section('title', 'Layouts')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-iSlidernline">
                            <h5>{{ __('Slider List') }}</h5>
                            <span>{{ __('List of homepage slider') }}</span>
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
                                <a href="#">{{ __('Slider') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-2 clearfix">
                    <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions"
                        role="button" aria-expanded="true" aria-controls="displayOptions">
                        {{ __('Select product category') }}
                        {{-- <i class="ik ik-chevron-down align-middle"></i> --}}
                    </a>
                   
                </div>
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">

                    @if (count($sliders) > 0)
                        @foreach ($sliders as $slider)
                            <div class="col-xl-4 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                                <div class="card d-flex flex-row mb-3">
                                    <a class="d-flex card-img newsViewTab" data-id="{{ $slider->id }}" href="#!">
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $slider->img }}"
                                            alt="Donec sit amet est at sem iaculis aliquam."
                                            class="list-thumbnail responsive border-0">
                                        @if ($slider->status == 1)
                                            <span
                                                class="badge badge-pill badge-success position-absolute badge-top-left">{{ __('Active') }}
                                            </span>
                                        @else
                                            <span
                                                class="badge badge-pill badge-warning position-absolute badge-top-left">{{ __('Unpublished') }}</span>
                                        @endif
                                        
                                    </a>
                                    <div class="d-flex flex-grow-1 min-width-zero card-content">
                                        <div
                                            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                            <a class="list-item-heading mb-1 truncate w-40 w-xs-100 newsViewTab"
                                                data-id="{{ $slider->id }}" href="#editLayoutItem" data-toggle="modal"
                                                data-target="#editLayoutItem">
                                                <b>{{ $slider->header }}</b>
                                            </a>
                                            <p class="mb-1 text-muted text-small category w-15 w-xs-100">
                                                {!! substr($slider->content, 0, 100) !!}</p>
                                            <p class="mb-1 text-muted text-small date w-15 w-xs-100">
                                                {{ \Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}
                                            </p>
                                           
                                        </div>
                                        <div class="list-actions">
                                            <a href="#!"><i class="ik ik-eye newsViewTab"
                                                    data-id="{{ $slider->id }}"></i></a>
                                            <a href="{{ route('slider.edit', $slider->id) }}"><i
                                                    class="ik ik-edit-2"></i></a>
                                            {{-- <a href="#" class="list-delete" data-id="{{ $slider->id }}"><i
                                                    class="ik ik-trash-2"></i></a>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://fmapmedia.com/show/news/{{ $slider->slug }}"
                                                target="_blank"><i class="ik ik-facebook"></i></a>
                                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                                            <a href="#"><i class="ik ik-twitter"></i></a>
                                            {!! Share::page(url('/post/'. $newlist->slug))->facebook()->twitter()->whatsapp() !!} --}}
                                        </div>
                                        <div class="custom-control custom-checkbox pl-1 align-self-center">
                                            <label class="custom-control custom-checkbox mb-0">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    {{-- {{ $news->links() }} --}}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade edit-layout-modal" id="editLayoutItem" tabindex="-1" role="dialog"
        aria-labelledby="editLayoutItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title header-title" id="editLayoutItemLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    {{-- <p class="lead header-title"></p> --}}
                    {{-- <p class="body-title"></p> --}}
                    <div class="row">
                        <div class="col-md-6 news-image"></div>
                        {{-- <div class="col-md-6"><img src="../img/portfolio-8.jpg" class="img-fluid" alt=""></div> --}}
                    </div>
                    <div class="jumbotron pt-30 pb-30 mt-30">
                        {{-- <h2 class="mt-0 body-title"></h2> --}}
                        {{-- <p class="lead">{{ __('This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.')}}</p> --}}
                    </div>
                    <p class="body-title"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <a href="#" class="btn btn-primary">{{ __('Edit') }}</a>
                    <button type="button" class="btn btn-danger">{{ __('Delete') }}</button>

                    {{-- {!! $shareComponent !!} --}}
                </div>
            </div>
        </div>
    </div>

    <!-- push external js -->
    {{-- @push('scripts')
        <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('js/layouts.js') }}"></script>
        <script>
            $(document).ready(function() {
                $(".newsViewTab").on("click", function() {

                    var dataId = $(this).attr("data-id");
                    var type = "GET";
                    var ajaxurl = '/news/show/' + dataId;
                    $.ajax({
                        type: "GET",
                        url: ajaxurl,
                        dataType: 'json',
                        success: function(data) {
                            //  console.log(data.news.title)
                            $(".header-title").html(data.news.title)
                            $(".body-title").html(data.news.details)
                            // $(".desc").html(data.product.desc)
                            // $(".categoryName").html(data.category.cat_name)
                            $(".news-image").html(
                                `<img src="/assets/images/news/${data.news.image}" class="img-fluid" alt="">`
                            )

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                });
                $(".list-delete").on("click", function() {
                    console.log('clicked')
                    var dataId = $(this).attr("data-id");
                    $.confirm({
                        title: 'Confirm!',
                        content: 'Delete Item!',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Delete',
                                btnClass: 'btn-red',
                                action: function() {
                                    var type = "GET";
                                    var ajaxurl = '/news/delete/' + dataId;
                                    $.ajax({
                                        type: type,
                                        url: ajaxurl,
                                        dataType: 'json',
                                        success: function(data) {
                                            location.reload()
                                        },
                                        error: function(data) {
                                            console.log(data);
                                        }
                                    });
                                }
                            },
                            close: function() {}
                        }
                    });

                });
            });
        </script>
        <script src="{{ asset('js/share.js') }}"></script>
    @endpush --}}
@endsection
