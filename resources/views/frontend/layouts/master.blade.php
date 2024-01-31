@php
    $setting = \App\Models\Setting::find(1);
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | {{$setting->website_title}}</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$setting->meta_description}}">
    <meta name="keywords" content="{{$setting->meta_title}}">
    <link rel="canonical" href="{{url('/')}}">
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/settings/{{$setting->website_logo}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/settings/{{$setting->website_logo}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/settings/{{$setting->website_logo}}" />
    {{-- <link rel="manifest" href="assets/images/favicons/site.webmanifest" /> --}}
    <meta name="description" content="{{$setting->description}}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('eup/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/nouislider/nouislider.pips.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/agrion-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('eup/vendors/tiny-slider/tiny-slider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/reey-font/stylesheet.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/bxslider/jquery.bxslider.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/vegas/vegas.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('eup/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/vendors/timepicker/timePicker.css')}}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{asset('eup/css/agrion.css')}}" />
    <link rel="stylesheet" href="{{asset('eup/css/agrion-responsive.css')}}" />
</head>

<body class="custom-cursor">
    
        @yield('content')

    <script src="{{asset('eup/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('eup/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('eup/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('eup/vendors/odometer/odometer.min.js')}}"></script>
    <script src="{{asset('eup/vendors/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('eup/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
    <script src="{{asset('eup/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{asset('eup/vendors/wow/wow.js')}}"></script>
    <script src="{{asset('eup/vendors/isotope/isotope.js')}}"></script>
    <script src="{{asset('eup/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{asset('eup/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('eup/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('eup/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('eup/vendors/vegas/vegas.min.js')}}"></script>
    <script src="{{asset('eup/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('eup/vendors/timepicker/timePicker.js')}}"></script>
    <script src="{{asset('eup/vendors/circleType/jquery.circleType.js')}}"></script>
    <script src="{{asset('eup/vendors/circleType/jquery.lettering.min.js')}}"></script>




    <!-- template js -->
    <script src="{{asset('eup/js/agrion.js')}}"></script>

</body>

</html>