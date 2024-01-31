@php
    $setting = \App\Models\Setting::find(1);
@endphp
@extends('frontend.layouts.master')

@section('title', 'Our News')
<div class="page-wrapper">
   
    @section('content')
    @include('frontend.includes.banner',['header1'=>'Our News','header2'=>'Our News'])
    
      <!--Blog Details Start-->
      <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{asset('assets/images/news')}}/{{$news->image}}" alt="{{$news->title}}">
                            <div class="blog-details__date">
                                <p>{{ Carbon\Carbon::parse($news->created_at)->isoFormat('MMM DD YY') }}</p>
                           
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="#"><i class="fas fa-user-circle"></i> Admin</a>
                                </li>
                                <li><a href="#"><i class="fas fa-comments"></i> 0
                                        Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">{{$news->title}}</h3>
                            
                                {!!$news->details!!}
    
                        </div>
                        {{-- <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Tags</span>
                                <a href="#">Agriculture</a>
                                <a href="#">Farm</a>
                            </p>
                            <div class="blog-details__social-list">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="blog-details__pagenation-box">
                            <ul class="list-unstyled blog-details__pagenation">
                                <li>Wheat Harvest Organic Gather nice Moment</li>
                                <li>Survived not only five centuries</li>
                            </ul>
                        </div> --}}
                        {{-- <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="eup/images/blog/comment-1-1.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia nulla.
                                        Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla,
                                        sollicitudin at euismod.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="eup/images/blog/comment-1-2.jpg" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Sarah Albert</h3>
                                    <p>Mauris non dignissim purus, ac commodo diam. Donec sit amet lacinia nulla.
                                        Aliquam quis purus in justo pulvinar tempor. Aliquam tellus nulla,
                                        sollicitudin at euismod.</p>
                                    <a href="#" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-form__title">Leave a Comment</h3>
                                <form action="https://pixydrops.com/agrionhtml/main-html/eup/inc/sendemail.php"
                                    class="comment-one__form contact-form-validated" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="text" placeholder="Your Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="email" placeholder="Email Address" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment-form__input-box text-message-box">
                                                <textarea name="message" placeholder="Write a Comment"></textarea>
                                            </div>
                                            <div class="comment-form__btn-box">
                                                <a href="#" class="thm-btn">Submit Comment <i
                                                        class="icon-right-arrow"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Latest Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($news_latest as $latest)
                                    <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{asset('assets/images/news')}}/{{$news->image}}" alt="{{$news->title}}">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <span class="sidebar__post-content-meta"><i
                                                    class="fas fa-user-circle"></i>Admin</span>
                                            <a href="{{route('front.single.news',$latest->slug)}}">{{$latest->title}}</a>
                                        </h3>
                                    </div>
                                </li>
                                 
                                @endforeach
                               
                                
                            </ul>
                        </div>
                        {{-- <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categories</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                <li><a href="#">Agriculture<span
                                            class="icon-right-arrow"></span></a>
                                </li>
                                <li class="active"><a href="#">Dairy Farm<span
                                            class="icon-right-arrow"></span></a></li>
                                <li><a href="#">Economy Solution<span
                                            class="icon-right-arrow"></span></a>
                                </li>
                                <li><a href="#">Harvests Innovations<span
                                            class="icon-right-arrow"></span></a>
                                </li>
                                <li><a href="#">Organic Food<span
                                            class="icon-right-arrow"></span></a>
                                </li>
                                <li><a href="#">Fresh Vegetables<span
                                            class="icon-right-arrow"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">
                                <a href="#">Agriculture</a>
                                <a href="#">Farm</a>
                                <a href="#">Eco</a>
                                <a href="#">Milk</a>
                                <a href="#">Dairy</a>
                                <a href="#">Organic</a>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">Recent Comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p> <span>John Doe</span> on template:</p>
                                        <h5>comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p> <span>John Doe</span> on template:</p>
                                        <h5>comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Details End-->
    <!--Site Footer Start-->
    @include('frontend.includes.footer')
    <!--Site Footer End-->


</div><!-- /.page-wrapper -->

@endsection
