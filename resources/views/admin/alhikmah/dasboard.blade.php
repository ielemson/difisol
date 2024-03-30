@extends('admin.layout')

@php
$alhikmah_category = App\Models\NewsCategory::where('name','alhikmah')->first();
$alhikmah_news = App\Models\News::where('category_id',$alhikmah_category->id)->count();
$alhikmah_activities = App\Models\News::where('category_id',$alhikmah_category->id)->where('type','activity')->count();
$alhikmah_gallery = App\Models\Gallery::where("partner","alhikmah")->count();

// funnab
// $alhikmah_category = App\Models\NewsCategory::where('name','funnab')->first();
// $alhikmah_news = App\Models\News::where('category_id',$alhikmah_category->id)->count();


// alhikmah
// $alhikmah_category = App\Models\NewsCategory::where('name','alhikmah')->first();
// $alhikmah_news = App\Models\News::where('category_id',$alhikmah_category->id)->count();
@endphp

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- page statustic chart start -->
        <div class="col-xl-4 col-md-6">
            <div class="card card-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">
                                {{-- @php
                                   $customers =  App\Models\User::whereHas("roles", function($q){ $q->where("name", "User"); })->count();
                                @endphp --}}
                                {{$alhikmah_activities}}
                            </h4>
                            <p class="mb-0">{{ __('ALHIKMAH ACTIVITIES')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ik ik-user f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card card-red text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">
                                {{$alhikmah_news }}
                            </h4>
                            <p class="mb-0">{{ __('ALHIKMAH NEWS')}}</p>
                        </div>
                       
                    </div>
                    <div id="Widget-line-chart1" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
     
        <div class="col-xl-4 col-md-6">
            <div class="card card-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="mb-0">
                                {{-- @php
                                   $customers =  App\Models\User::whereHas("roles", function($q){ $q->where("name", "User"); })->count();
                                @endphp
                                {{$customers}} --}}
                                {{ $alhikmah_gallery }}
                            </h4>
                            
                            <p class="mb-0">{{ __('ALHIKMAH GALLERY')}}</p>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ik ik-user f-30"></i>
                        </div>
                    </div>
                    <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                </div>
            </div>
        </div>
        <!-- page statustic chart end -->
    </div>
</div>
@endsection