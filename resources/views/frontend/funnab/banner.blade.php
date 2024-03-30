<header class="main-header">
    <div class="main-header__wrapper">
        <div class="main-header__wrapper-inner">
            <div class="main-header__logo">
                <a href="{{url('/')}}"><img src="{{asset('assets/images/settings')}}/{{$setting->website_logo}}"></a>
            </div>
            <div class="main-header__menu-box">
                <div class="main-header__menu-box-top">
                    <ul class="list-unstyled main-header__contact-list">
                        <li>
                            <div class="icon">
                                <i class="icon-email"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:info@eup-uaes.ng">{{__('info@eup-uaes.ng')}}</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="icon-pin"></i>
                            </div>
                            <div class="text">
                                <p>{{$setting->address}}</p>
                            </div>
                        </li>
                    </ul>
                    <div class="main-header__social">
                        <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a>
                        {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                        <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="main-header__menu-box-bottom">
                    <nav class="main-menu">
                        <div class="main-menu__wrapper">
                            <div class="main-menu__wrapper-inner">
                                <div class="main-menu__left">
                                    <div class="main-menu__main-menu-box">
                                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                        <ul class="main-menu__list">
                                            <li class="dropdown megamenu">
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
                                            <li class="">
                                                <a href="{{route('funnab.news')}}">News</a>
                                                
                                            </li>
                                            <li class="">
                                                <a href="{{route('funnab.gallery')}}">Gallery</a>
                                                
                                            </li>
                                            <li class="">
                                                <a href="#">Media</a>
                                                
                                            </li>
                                            <li class="">
                                                <a href="{{route('contact.us')}}">Contact</a>
                                               
                                            </li>
                                         
                                        </ul>
                                    </div>
                                </div>
                                <div class="main-menu__right">
                                    <div class="main-menu__search-cart-btn-box">
                                        <div class="main-menu__search-box">
                                            <a href="#"
                                                class="main-menu__search search-toggler icon-magnifying-glass"></a>
                                        </div>
                                        <div class="main-menu__cart-box">
                                            <a href="{{route('contact.us')}}" class="main-menu__cart icon-maps-and-flags"></a>
                                        </div>
                                        <div class="main-menu__btn-box">
                                            <a href="mailto:info@eup-uaes.ng" class="thm-btn main-menu__btn">info@eup-uaes.ng
                                                <i class="icon-email"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="main-header__phone-contact-box">
                <div class="main-header__phone-number">
                    <a href="#">{{$setting->phone}}</a>
                </div>
                <div class="main-header__call-box">
                    <div class="main-header__call-inner">
                        <div class="main-header__call-icon">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{asset('eup/images/resources/eu-uaes-banner.jpg')}})">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>/</span></li>
                <li>{{$header1 ?? ''}}</li>
            </ul>
            <h2>{{$header2 ?? ''}}</h2>
        </div>
    </div>
</section>
<!--Page Header End-->