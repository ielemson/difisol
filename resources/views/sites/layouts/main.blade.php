<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') :: FMAPMEDIA</title>
    <!-- initiate head with meta tags, css and script -->
    {{-- @include('include.head') --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('favicon.png') }}" />
    <style>

    </style>
    <!-- font awesome library -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- themekit admin template asstes -->
    <link rel="stylesheet" href="{{ asset('all.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0&appId=425246619802571" nonce="Re2MbvMQ"></script>
    <!-- Stack array for including inline css or head elements -->
    @stack('head')

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}


</head>

<body id="app">

    <div class="wrapper">
        <!-- initiate header-->
        @include('include.header')
        <div class="page-wrap">
            <!-- initiate sidebar-->
            @include('include.sidebar')

            <div class="main-content">
                <!-- yeild contents here -->
                @yield('content')
            </div>

            <!-- initiate chat section-->
            @include('include.chat')


            <!-- initiate footer section-->
            @include('include.footer')

        </div>
    </div>
    <!-- initiate modal menu section-->
    @include('include.modalmenu')

    <!-- initiate scripts-->
    {{-- @include('include.script') --}}
     <script src="{{ asset('dist/js/jquery-3.6.4.min.js') }}"></script>
     {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('all.js') }}"></script>
    <!-- Stack array for including inline js or scripts -->
   
    <script src="{{ asset('dist/js/theme.js') }}"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    @stack('scripts')
</body>

</html>
