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
                            <p><a href="#">{!!$setting->phone!!}</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="fas fa-user"></span>
                        </div>
                        <div class="text">
                            @auth
                            <p><a href="{{route('login')}}">Dashboard</a> / <a href="{{url('logout')}}">Logout</a></p>
                            @else
                            <p><a href="{{route('login')}}">Login Account</a> </p>
                            @endauth
                           
                        </div>
                    </li>
                </ul>
                <div class="main-header-three__logo">
                <a href="{{url('/')}}"><img src="{{asset('assets/images/settings')}}/{{$setting->website_logo}}" alt="logo"></a>
                </div>
                <div class="main-menu-three__search-cart-btn-box">
                    <div class="main-menu-three__search-box">
                        <a href="#" class="main-menu-three__search search-toggler icon-magnifying-glass"></a>
                    </div>
                    
                    <div class="main-menu-three__btn-box">
                        <a href="mailto:{{$setting->email}}" class="thm-btn main-menu-three__btn">
                            {{$setting->email}}
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
                                <a href="{{url('/')}}">Home </a>
                               
                            </li>
                            <li>
                                <a href="{{route('about.us')}}">About</a>
                            </li>
                           @if (count($services) > 0)
                           <li class="dropdown">
                            <a href="#">Partners</a>
                            <ul class="shadow-box">
                              @foreach ($services as $partner)
                              <li><a href="/{{strtolower($partner->header)}}">{{$partner->header}}</a></li>
                              @endforeach
                                
                            </ul>
                        </li>
                           @endif
                            <li class="dropdown">
                                <a href="#">Activities</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="project-01.html">Projects 01</a></li>
                                    <li><a href="project-02.html">Projects 02</a></li>
                                    <li><a href="project-carousel.html">Project Carousel</a>
                                    </li>
                                    <li><a href="project-details.html">Project Details</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown">
                                <a href="{{route('all.news')}}">News</a>
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
                                <a href="#">Gallery</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-carousel.html">Blog Carousel</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul> --}}
                            </li>
                            <li class="dropdown">
                                <a href="#">Media</a>
                                {{-- <ul class="shadow-box">
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul> --}}
                            </li>
                            <li>
                                <a href="{{route('contact.us')}}">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('about.us')}}">Our Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>