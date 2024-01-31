@extends('inventory.layout')
@section('title', 'Products')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-green"></i>
                        <div class="d-inline">
                            <h5>Products</h5>
                            <span>View, delete and update products</span>
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
                                <a href="#">Products</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- list layout 1 end -->
        <div class="col-md-12">
                          <!-- start message area-->
                          @include('include.message')
                          <!-- end message area-->
            <hr>
        </div>
        <!-- list layout 2 -->
        <div class="col-md-12">
            <div class="mb-2 clearfix">
                <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions" role="button"
                    aria-expanded="true" aria-controls="displayOptions">
                    Display Options
                    <i class="ik ik-chevron-down align-middle"></i>
                </a>
                <div class="collapse d-md-block display-options" id="displayOptions">
                    <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                        <a href="#" class="mr-1 view-thumb ">
                            <i class="ik ik-list view-icon"></i>
                        </a>
                        <a href="#" class="mr-1 view-grid active">
                            <i class="ik ik-grid view-icon"></i>
                        </a>
                    </span>
                    <div class="d-block d-md-inline-block">
                        <div class="btn-group float-md-left mr-1 mb-1">
                            <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Order By
                                <i class="ik ik-chevron-down mr-0 align-middle"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            </div>
                        </div>
                        <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                            <form action="">
                                <input type="text" class="form-control" placeholder="Search.." required="">
                                <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                <button type="button" id="adv_wrap_toggler"
                                    class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"></button>
                                <div class="adv-search-wrap dropdown-menu dropdown-menu-right"
                                    aria-labelledby="adv_wrap_toggler">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <button class="btn btn-theme">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="float-md-right">
                        <span class="text-muted text-small mr-2">Displaying 1-10 of 210 items </span>
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            20
                            <i class="ik ik-chevron-down mr-0 align-middle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">10</a>
                            <a class="dropdown-item" href="#">20</a>
                            <a class="dropdown-item" href="#">30</a>
                            <a class="dropdown-item" href="#">50</a>
                            <a class="dropdown-item" href="#">100</a>
                        </div>
                        <a href="/products/create" class="btn btn-outline-primary btn-rounded-20">
                            Add Product
                        </a>
                    </div>
                </div>
            </div>
            <div class="separator mb-20"></div>

            <div class="row layout-wrap" id="layout-wrap">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                            <div class="card d-flex flex-row mb-3">
                                <a class="d-flex card-img productViewTab"  data-id="{{ $product->id }}" href="#productView" data-toggle="modal"
                                    data-target="#productView">
                                    <img src="{{ asset('assets/images/products') }}/{{ $product->image }}"
                                        alt="{{ $product->image }}" class="list-thumbnail responsive border-0">

                                </a>
                                <div class="d-flex flex-grow-1 min-width-zero card-content">
                                    <div
                                        class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                        <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#productView"
                                            data-toggle="modal" data-target="#productView">
                                            <b>{{ $product->name }} </b><br>
                                            Status: {{ $product->status }}
                                        </a>
                                        {{-- <p class="mb-1 text-muted text-small category w-15 w-xs-100">
                						Electronics,
                						Computers,
                					</p> --}}
                                        <p class="mb-1 text-muted text-small date w-15 w-xs-100">
                                            {{ __('₦') }}{{ $product->price }}</p>
                                        {{-- <div class="w-15 w-xs-100">
                						<span class="badge badge-pill badge-secondary">50</span>
                					</div> --}}
                                    </div>
                                    <div class="list-actions">
                                        <a href="#productView" data-toggle="modal" data-target="#productView"
                                            data-id="{{ $product->id }}" class="productViewTab"><i
                                                class="ik ik-eye"></i></a>
                                        <a href="{{ route('product.edit', $product->id) }}"><i
                                                class="ik ik-edit-2"></i></a>
                                        <a href="{{ route('product.delete', $product->id) }}" class="list-delete"><i class="ik ik-trash-2"></i></a>
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
            </div>
            <!-- list layout 2 end -->
        </div>
    </div>
    <div class="modal fade edit-layout-modal pr-0" id="productView" tabindex="-1" role="dialog"
        aria-labelledby="productViewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title productName" id="productViewLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8 prodImg">

                        </div>
                        <div class="col-4">
                            <p>
                            </p>
                            <div class="badge badge-pill badge-dark categoryName"></div>
                            {{-- <div class="badge badge-pill badge-dark">Accesories &amp; Gadgets</div> --}}
                            <p class="productName mt-10" style="font-size:2rem"></p>
                            <h3 class="text-green price">
                               
                                {{-- <del class="text-muted f-16">$ 1250</del> --}}
                            </h3>
                            {{-- <p class="text-green">Purchase Price:</p> --}}
                            <p class="desc">

                            </p>
                            <p class="status"></p>
                            {{-- <p>Spplier: PZ Tech</p> --}}
                        </div>
                    </div>
                   </div>
            </div>
        </div>

        @push('script')
            <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
            <script src="{{ asset('plugins/amcharts/gauge.js') }}"></script>
            <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
            <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
            <script src="{{ asset('plugins/amcharts/animate.min.js') }}"></script>
            <script src="{{ asset('plugins/amcharts/pie.js') }}"></script>
            <script src="{{ asset('plugins/ammap3/ammap/ammap.js') }}"></script>
            <script src="{{ asset('plugins/ammap3/ammap/maps/js/usaLow.js') }}"></script>
            <script src="{{ asset('js/product.js') }}"></script>

            <script>
                $(document).ready(function() {

                    $(".productViewTab").on("click", function() {
                        
                        var dataId = $(this).attr("data-id");
                        var type = "GET";
                        var ajaxurl = 'product/show/' + dataId;
                        $.ajax({
                            type: "GET",
                            url: ajaxurl,
                            dataType: 'json',
                            success: function(data) {
                         
                                $(".productName").html(data.product.name)
                                $(".price").html('₦'+data.product.price)
                                $(".desc").html(data.product.desc)
                                $(".categoryName").html(data.category.cat_name)
                                $(".prodImg").html(`<img src="/assets/images/products/${data.product.image}" class="img-fluid" alt="">`)
                               
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
