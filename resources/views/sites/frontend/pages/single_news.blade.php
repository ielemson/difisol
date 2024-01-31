@extends('layouts.front',['socialimage'=>$single_news->image,'news_title'=>$single_news->title,'meta_description'=>$single_news->meta_description,'news_slug'=>$single_news->slug])

@section('content')
@section('title', $single_news->title)
@include('frontend.include.innerBanner', ['banner_title' => 'Our News'])


<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content pr-20">
                    {{-- <div class="blog-preview-img-bg">
                        <a href="{{route('front.single.news',$single_news->slug)}}">
                            <img src="{{asset('assets/images/news')}}/{{$single_news->image}}" alt="{{$single_news->title}}">
                        </a>
                    </div> --}}
                    <div class="blog-preview-img-bg">
                        <a href="" class="play-btn">
                            {{-- <i class="flaticon-play-button-arrowhead"></i> --}}
                            <img src="{{asset('assets/images/news')}}/{{$single_news->image}}" alt="{{$single_news->title}}" style="height:35vw; width:100%">
                        </a>
                    </div>
                    <ul class="tag-list">
                        <li>
                            <i class="ri-calendar-todo-fill"></i>
                            {{ Carbon\Carbon::parse($single_news->created_at)->isoFormat('MMM DD YY') }}
                        </li>
                        <li>
                            <i class="ri-price-tag-3-fill"></i>
                            <a href="#">{{$single_news->category->name}}</a>
                        </li>
                    </ul>
                    <h2>{{$single_news->title}}</h2>
                    <p style="text-align: justify !mportant">{!!$single_news->details!!}</p>
                    <div class="article-share">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="article-tag">
                                    <ul>
                                        <li class="title">
                                            <i class="ri-price-tag-3-fill"></i>
                                        </li>
                                        @if (count($categories) > 0)
                                        
                                                 @foreach ($categories as $category)
                                                     <li><a href="{{route('front.news.category',$category->slug)}}">{{$category->name}}</a></li>
                                                 @endforeach      
                                     @endif
                                        
                                      
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="article-social-icon">
                                    <ul class="social-icon">
                                        <li class="title">Share :</li>
                                        <li>
                                            {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=http://fmapmedia.com/show/news/{{$single_news->slug}}" target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a> --}}
                                            <div class="fb-share-button btn btn-primary btn-sm" 
                                            data-href="{{route('front.single.news',$single_news->slug)}}"
                                            data-layout="button_count">
                                            </div>
                                        </li>
                                        <li>
                                            <a 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            href="https://twitter.com/intent/tweet?text={{route("front.single.news",$single_news->slug)}}"
                                            data-size="large"
                                            data-text="{{$single_news->slug}}"
                                            data-url="{{route("front.single.news",$single_news->slug)}}"
                                            data-hashtags=""
                                            data-via="{{url('/')}}"
                                            data-related="{{$single_news->category->name}}"
                                            >
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text={{route("front.single.news",$single_news->slug)}}" target="_blank">
                                                <i class="ri-whatsapp-fill"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="comments-form">
                        <div class="contact-form">
                            <h4>Leave A Reply</h4>
                            <p>Your email address will not be published. Required fields are marked</p>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Comment..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">
                                                Save my info for the next comment
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Post A Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="side-bar-area">
                    {{-- <div class="side-bar-widget">
                        <form class="search-form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button type="submit">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                    </div> --}}
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
                 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
