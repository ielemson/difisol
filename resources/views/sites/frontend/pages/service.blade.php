@extends('layouts.front')

@section('content')
@section('title', $service->header)
@include('frontend.include.innerBanner', ['banner_title' => $service->header])

<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="blog-details-content pr-20 justify-content-center align-items-center">
                    <h2>{{$service->header}}</h2>
                    <div class="blog-preview-img">
                        <img src="{{asset('assets/images/services')}}/{{$service->image}}" alt="{{$service->header}}">
                    </div>
                   
                    <p>
                        {!!$service->content!!}
                    </p>
                    
                   </div>
            </div>
          
        </div>
    </div>
</div>


@endsection
