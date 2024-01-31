  <!--Site Footer Start-->
  @php
    $setting = \App\Models\Setting::find(1);
@endphp
  <footer class="site-footer">
    <div class="site-footer__top">
        <div class="container">
            <div class="site-footer__top-inner">
                <div class="site-footer-shape-1 float-bob-x"
                    style="background-image: url(assets/images/shapes/site-footer-shape-1.png);"></div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="footer-widget__column footer-widget__about">
                            <div class="footer-widget__logo">
                                <a href="#"><img src="{{asset('eup/images/resources/footer-logo.png')}}"
                                        alt=""></a>
                            </div>
                            <div class="footer-widget__about-text-box">
                                <p class="footer-widget__about-text">
                                    {{$setting->website_description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="footer-widget__column footer-widget__Explore">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">Explore</h3>
                            </div>
                            <ul class="footer-widget__Explore-list list-unstyled">
                                <li><a href="">About</a></li>
                                <li><a href="">Contact Us</a></li>
                                <li><a href="">News</a></li>
                            </ul>
                        </div>
                    </div>
                    @if (count($NewsFooter) > 0)
                         <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="footer-widget__column footer-widget__news">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">News</h3>
                            </div>
                            <ul class="footer-widget__news-list list-unstyled">
                                @foreach ($NewsFooter as $news)
                                     <li>
                                    <div class="footer-widget__news-img">
                                        <img src="{{asset('assets/images/news')}}/{{$news->image}}" alt="{{$news->title}}">
                                    </div>
                                    <div class="footer-widget__news-content">
                                        <p class="footer-widget__news-date">
                                            {{ Carbon\Carbon::parse($news->created_at)->isoFormat('MMM DD YY') }}
                                        </p>
                                        <h5 class="footer-widget__news-sub-title"><a href="#">
                                        {{$news->title}}
                                        </a></h5>
                                    </div>
                                </li>
                                @endforeach
                               
                                
                                
                            </ul>
                        </div>
                    </div>
                    @endif
                   
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="footer-widget__column footer-widget__Contact">
                            <div class="footer-widget__title-box">
                                <h3 class="footer-widget__title">Contact</h3>
                            </div>
                            <ul class="footer-widget__Contact-list list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-phone-square-alt"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">{{$setting->phone}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">{{$setting->email}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-pin"></span>
                                    </div>
                                    <div class="text">
                                        <p>
                                            {{$setting->address}}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            {{-- <form class="footer-widget__Contact-form">
                                <div class="footer-widget__Contact-input-box">
                                    <input type="email" placeholder="Email Address" name="email">
                                    <button type="submit" class="footer-widget__Contact-btn"><i
                                            class="icon-right-arrow"></i></button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright {{Date('Y')}} by <a href="#">EU UAES</a></p>
                        <div class="site-footer__social">
                            <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$setting->facebook}}"><i class="fab fa-facebook"></i></a>
                            {{-- <a href="#"><i class="fab fa-pinterest-p"></i></a> --}}
                            <a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="site-footer__bottom-scroll">
                            <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i
                                    class="icon-up-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->