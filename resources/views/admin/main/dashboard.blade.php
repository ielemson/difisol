@extends('admin.layout')


@section('content')
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
                            <p class="mb-0">{{ __('UAES NEWS')}}</p>
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
                            <p class="mb-0">{{ __('FUNNAB NEWS')}}</p>
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
                            <p class="mb-0">{{ __('USERS')}}</p>
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
                            <p class="mb-0">{{ __('ALHIKMAH NEWS')}}</p>
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
       
     
    </div>
</div>
@endsection