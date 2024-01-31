@extends('layouts.front')


@section('content')
@section('title', 'Our Top Management Team')  
@include('frontend.include.innerBanner',['banner_title'=>'Our Top Management Team'])


<div class="instructors-area instructors-area-rs pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center mb-45">
            <h2>MEET OUR TOP MANAGEMENT TEAM</h2>
        </div>
        <div class="row justify-content-center">
      @foreach ($members as $member)
      <div class="col-lg-3 col-md-6">
        <div class="instructors-card">
            <a href="{{route('company.profile',$member->id)}}">
                <img src="{{asset('assets/images/members')}}/{{$member->image}}" alt="{{$member->name}}">
            </a>
            <div class="content">
              
                <h3>
                    <a href="">{{$member->name}}</a>
                </h3>
                <span>{{$member->portfolio}}</span>
            </div>
        </div>
    </div>
      @endforeach
            
           
        </div>
    </div>
</div>

@endsection