@extends('admin.layout')

@php
$funnab_category = App\Models\NewsCategory::where('name','funnab')->first();
$funnab_news = App\Models\News::where('category_id',$funnab_category->id)->count();
$funnab_activities = App\Models\News::where('category_id',$funnab_category->id)->where('type','activity')->count();
$funnab_gallery = App\Models\Gallery::where("partner","funnab")->count();

// funnab
// $funnab_category = App\Models\NewsCategory::where('name','funnab')->first();
// $funnab_news = App\Models\News::where('category_id',$funnab_category->id)->count();


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
                                {{$funnab_activities}}
                            </h4>
                            <p class="mb-0">{{ __('FUNNAB ACTIVITIES')}}</p>
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
                                {{$funnab_news }}
                            </h4>
                            <p class="mb-0">{{ __('FUNNAB NEWS')}}</p>
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
                                {{ $funnab_gallery }}
                            </h4>
                            
                            <p class="mb-0">{{ __('FUNNAB GALLERY')}}</p>
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