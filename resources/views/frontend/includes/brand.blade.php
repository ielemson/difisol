 @if (count($services) > 0)
   <!--Brand One Start-->
 <section class="brand-two">
    <div class="brand-one__inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                        "margin": 0,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":false,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "600":{
                                "items":2
                            },
                            "800":{
                                "items":3
                            },
                            "1024":{
                                "items": 4
                            },
                            "1200":{
                                "items": 5
                            }
                        }
                    }'>
                        <!--Brand One Single-->
                     @foreach ($services as $partner)
                     <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="assets/images/partners/{{$partner->image}}" alt="">
                        </div>
                    </div>
                     @endforeach
                        <!--Brand One Single-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand One End-->  
 @endif
 