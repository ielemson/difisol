@extends('layouts.front')


@section('content')
@section('title', 'Our Top Management Team')  
@include('frontend.include.innerBanner',['banner_title'=>'Our Top Management Team'])


<div class="instructors-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="instructors-details-img">
                    <img src="{{asset('assets/images/members')}}/{{$member->image}}" alt="{{$member->name}}"/>
                    <ul class="social-link">
                        <li class="social-title">Follow me:</li>
                        <li>
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="instructors-details-content pl-20">
                    <h3>{{$member->name}}</h3>
                    <span class="sub-title">{{$member->portfolio}}</span>
                    {{-- <ul>
                        <li>Phone number:
                            <span>
                                <a href="tel:+1(135)19842020">+1(135) 1984 2020
                                </a>
                            </span>
                        </li>
                        <li>Email:
                            <span>
                                <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#a4ccc1c8c8cbe4c8c1c0d18ac7cbc9">
                                    <span class="__cf_email__" data-cfemail="6f070a0303002f030a0b1a410c0002">[email&#160;protected]</span>
                                </a>
                            </span>
                        </li>
                        <li>Website:
                            <span>
                                <a href="www.ledu.html">www.ledu.com</a>
                            </span>
                        </li>
                        <li>Total students:
                            <span>500</span>
                        </li>
                        <li>Reviews:
                            <span>
                                <i class="ri-star-fill"></i>4k+ rating</span>
                        </li>
                        <li>Courses taken:
                            <span>20</span>
                        </li>
                    </ul> --}}
                   {!!$member->details!!}
                </div>
            </div>
        </div>
    </div>
</div>


<footer 

@endsection