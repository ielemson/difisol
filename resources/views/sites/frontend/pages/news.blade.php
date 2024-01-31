@extends('layouts.front')


@section('content')
@section('title', 'Our News')
@include('frontend.include.innerBanner', ['banner_title' => 'Our News'])


@if (count($news) > 0)
<div class="blog-widget-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
              <div class="row">
            @if (count($news)>0)
            @foreach ($news as $latest)
                <div class="col-lg-6 col-md-6">
                <div class="blog-card">
                    <a href="{{route('front.single.news',$latest->slug)}}">
                        <img src="{{asset('assets/images/news')}}/{{$latest->image}}" alt="{{$latest->title}}">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                {{-- Jan 12,2022 --}}
                                {{ Carbon\Carbon::parse($latest->created_at)->isoFormat('MMM DD YY') }}
                                {{-- {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }} --}}

                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="{{route('front.single.news',$latest->slug)}}">{{$latest->category->name}}</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="{{route('front.single.news',$latest->slug)}}">
                                {{$latest->title}}
                            </a>
                        </h3>
                        
                        <p>{!! Illuminate\Support\Str::limit($latest->details, 150) !!}</p>
                        <a href="{{route('front.single.news',$latest->slug)}}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
             
            @endif
          
            @if ($news->links()->paginator->hasPages())
        
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    {{ $news->links() }}
                </div>
            </div>
        @endif
           
        </div>
            </div>
            <div class="col-lg-4">
                <div class="side-bar-area pl-20">
                   
                    @if (count($categories) > 0)
                       <div class="side-bar-widget">
                        <h3 class="title">Categories</h3>
                        <div class="side-bar-categories">
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{route('front.news.category',$category->slug)}}">{{$category->name}}</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div> 
                    @endif
                   
                    <div class="side-bar-widget">
                        <h3 class="title">Popular post</h3>
                        <div class="widget-popular-post">
                            
                            @foreach ($topnewslist as $popular)
                            <article class="item">
                                <a href="{{route('front.single.news',$popular->slug)}}" class="thumb">
                                    <span class="full-image cover bg3" role="img" style="background-image:url('{{asset('assets/images/news')}}/{{$popular->image}}') "></span>
                                </a>
                                <div class="info">
                                    <p>  {{ Carbon\Carbon::parse($popular->created_at)->isoFormat('MMM DD YY') }}</p>
                                    <h4 class="title-text">
                                        <a href="{{route('front.single.news',$popular->slug)}}">
                                            {{$popular->title}}
                                        </a>
                                    </h4>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div> 
             
                   
                </div>
            </div>
        </div>
        
    </div>
</div>

@else
<div class="coming-soon-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="coming-soon-content">
                    <h1>Oops!</h1>
                    <p>
                       No news posted at the moment. Please check back at a later time
                    </p>
                  </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
