@extends('layouts.main') 
@section('title', 'Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-red text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">
                            @php
							$products = App\Models\Product::all();
							// dd($orders);
						    @endphp
                            {{count($products)}}
                                </h4>
                                <p class="mb-0">{{ __('Products')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart1" class="chart-line chart-shadow"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-blue text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">
                                    @php
                                    $orders = App\Models\Orders::where('status','Successful')->count();
                                    // dd($orders);
                                    @endphp
                                    {{$orders}}
                                </h4>
                                <p class="mb-0">{{ __('Orders')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-shopping-cart f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart2" class="chart-line chart-shadow" ></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-green text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">
                                    @php
                                       $customers =  App\Models\User::whereHas("roles", function($q){ $q->where("name", "User"); })->count();
                                    @endphp
                                    {{$customers}}
                                </h4>
                                <p class="mb-0">{{ __('Customers')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-yellow text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">
                                @php
                                $total = 0;
                                // $attribute_price = 0;
                               $orders =  App\Models\Orders::where('status','Successful')->get();
                                foreach ($orders as $key => $order) {
                                $total += $order->price * $order->qty;
                                 }
                                 @endphp
                                 {{$total}}
                                </h4>
                                <p class="mb-0">{{ __('Sales')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik f-30">₦</i>
                            </div>
                        </div>
                        <div id="Widget-line-chart4" class="chart-line chart-shadow" ></div>
                    </div>
                </div>
            </div>
            <!-- page statustic chart end -->
    
            <!-- product and new customar start -->

            <div class="col-xl-12 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>{{ __('All Products')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product Name')}}</th>
                                        <th>{{ __('Image')}}</th>
                                        <th>{{ __('Status')}}</th>
                                        <th>{{ __('Price')}}</th>
                                        <th>{{ __('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @php
                                    $products = App\Models\Product::all();
                                    // dd($orders);
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                        <td>{{ $product->name}}</td>
                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" class="img-fluid img-20"></td>
                                        <td>
                                            <div class="p-status bg-green"></div>
                                        </td>
                                        <td>₦{{$product->price}}</td>
                                        <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                                    </tr> 
                                    @endforeach
                                   
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>{{ __('Registered Customers')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Full Name')}}</th>
                                        <th>{{ __('Email')}}</th>
                                        <th>{{ __('Date Registered')}}</th>
                                        <th>{{ __('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $customers =  App\Models\User::whereHas("roles", function($q){ $q->where("name", "User"); })->get();
                                @endphp
                                 @foreach ($customers as $user)
                                      
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <button class="btn btn-danger">Delete</button>
                                            <button class="btn btn-info">Edit</button>
                                            <button class="btn btn-default">View</button>
                                        </td>
                                    </tr>
                                 @endforeach
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
           
            
            <!-- product and new customar end -->
            <!-- Application Sales start -->
            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>{{ __('Product Sales')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block p-b-0">
                        <div class="table-responsive scroll-widget">
                            <table class="table table-hover table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Application')}}</th>
                                        <th>{{ __('Sales')}}</th>
                                        <th>{{ __('QTY')}}</th>
                                        {{-- <th>{{ __('Change')}}</th> --}}
                                        <th>{{ __('Total')}}</th>
                                        <th>{{ __('Transaction Date')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $total = 0;
                                   $orders =  App\Models\Orders::where('status','Successful')->get();
                                   @endphp
                                    @foreach ($orders as $orders)
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <h6>{{$orders->product->name}}</h6>
                                            </div>
                                        </td>
                                        <td>&#8358; {{$orders->price}}</td>
                                        
                                        <td>{{$order->qty}}</td>
                                        <td class="text-blue">&#8358; {{$order->qty * $order->price}}</td>
                                        <td class="text-red">{{$order->created_at->format('D M Y')}}</td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#!" class=" b-b-primary text-primary">{{ __('View all Projects')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Application Sales end -->
    	</div>
    </div>
	<!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
       
        
        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
        
    @endpush
@endsection