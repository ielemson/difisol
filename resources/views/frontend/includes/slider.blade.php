
@if (count($sliders) > 0)

<section class="main-slider-three clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 5000
        }}'>
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <div class="image-layer-three"
                    style="background-image: url({{ asset('assets/images/sliders') }}/{{$slider->img}});"></div>
                <!-- /.image-layer -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-three__content">
                                <h2 class="main-slider-three__title">{{$slider->header}}</h2>
                                <div class="main-slider-three__sub-title-box">
                                   
                                    <p class="main-slider-three__sub-title">
                                        {{$slider->content}}
                                    </p>
                                </div>
                                
                                <div class="main-slider-three__btn-box">
                                    <a href="#" class="thm-btn main-slider-three__btn">
                                      UAES EU
                                        <i class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>

        <div class="swiper-pagination" id="main-slider-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section>


    {{-- <div class="hero-slider-area">
        <div class="hero-slider owl-carousel owl-theme">
            @foreach ($sliders as $slider)
            <div class="hero-item">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hero-content">
                             
                                <h1>{{$slider->header}}</h1>
                                <p>
                                    {{$slider->content}}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img">
                                <img src="{{ asset('assets/images/sliders') }}/{{$slider->img}}" class="hero"
                                    alt="fmap media" style="border-radius:10px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}
@endif
