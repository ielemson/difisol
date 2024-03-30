@php
    $setting = \App\Models\Setting::find(1);
@endphp
<header class="main-header-three">
    <div class="main-header-three__top">
        <div class="container">
            <div class="main-header-three__top-inner">
                <ul class="main-header-three__contact list-unstyled">
                    <li>
                        <div class="icon">
                            <span class="fas fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><a href="#">{!! $setting->phone !!}</a></p>
                        </div>
                    </li>

                </ul>
                <div class="main-header-three__logo">
                    <a href="{{ url('/') }}"><img
                            src="{{ asset('assets/images/settings') }}/{{ $setting->website_logo }}" alt="logo"></a>
                </div>
                <ul class="main-header-three__contact list-unstyled">
                    <li>
                        <div class="icon">
                            <span class="fas fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><a href="#">{!! \Illuminate\Support\Str::words($setting->address, 8)  !!}</a></p>
                        </div>
                    </li>

                </ul>
                <div class="main-menu-three__search-cart-btn-box">
                    <div class="main-menu-three__search-box">
                        <a href="#" class=""></a>
                    </div>

                    <div class="main-menu-three__btn-box">
                        <a href="mailto:info@eup-uaes.ng" class="thm-btn main-menu-three__btn">
                            {{ __('info@eup-uaes.ng') }}
                            <i class="fa fa-envelope"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu main-menu-three">
        <div class="main-menu-three__wrapper">
            <div class="container">
                <div class="main-menu-three__wrapper-inner">
                    <div class="main-menu-three__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="dropdown current megamenu">
                                <a href="{{ url('/') }}">Home </a>

                            </li>
                            <li>
                                <a href="{{ route('about.us') }}">About</a>
                            </li>
                            @if (count($services) > 0)
                                <li class="dropdown">
                                    <a href="#">Partners</a>
                                    <ul class="shadow-box">
                                        @foreach ($services as $partner)
                                        <li><a href="/{{ strtolower($partner->slug) }}">{{ $partner->header }}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endif
                            <li class="dropdown">
                                <a href="{{ route("alhikmah.activities") }}">Activities</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="project-01.html">Projects 01</a></li>
                                    <li><a href="project-02.html">Projects 02</a></li>
                                    <li><a href="project-carousel.html">Project Carousel</a>
                                    </li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown">
                                <a href="{{ route("alhikmah.news") }}">News</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="farmers.html">Farmers</a></li>
                                    <li><a href="farmers-carousel.html">Farmers Carousel</a>
                                    </li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="testimonials-carousel.html">Testimonial
                                            Carousel</a></li>
                                    <li><a href="faq.html">FAQs</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown">
                                <a href="{{ route("alhikmah.gallery") }}">Gallery</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-carousel.html">Blog Carousel</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul> --}}
                            </li>
                            {{-- <li class="dropdown">
                              
                            <ul class="shadow-box">
                                   
                                    @auth
                                    <a href="">Dashboard</a> / <a href="{{url('logout')}}">Logout</a>
                                    <li><a href="{{route('login')}}">Dashboard</a></li>
                                    @else
                                     <a href="{{route('login')}}">Account</a> 
                                     @endauth
                                </ul>
                            </li> --}}

                            <li class="dropdown">
                                <a href="{{ route('front.gallery') }}">Account</a>
                                <ul class="shadow-box">
                                    @auth
                                        <li><a href="{{ route('login') }}">Dashboard</a></li>
                                        <li><a href="{{ url('logout') }}">Logout</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endauth

                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('contact.us') }}">Contact</a>
                            </li>
                            <li>
                                <a href="https://www.eup-uaes.ng/webmail/" target="_blank">Webmail</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>




