@if (count($sliders) > 0)
    <div class="hero-slider-area">
        <div class="hero-slider owl-carousel owl-theme">
            @foreach ($sliders as $slider)
            <div class="hero-item">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hero-content">
                                {{-- <span class="top-title">Welcome To</span> --}}
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
    </div>
@endif
