<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
	<title>@yield('title','Dashboard') | UAES EU PROJECT</title>
	<!-- initiate head with meta tags, css and script -->
	@include('admin.include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('admin.include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('admin.include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->
	    	{{-- @include('include.chat') --}}

	    	<!-- initiate footer section-->
	    	@include('admin.include.footer')

    	</div>
    </div>
    
	<!-- initiate modal menu section-->
	@include('admin.include.modalmenu')

	<!-- initiate scripts-->
	<script src="{{ asset('all.js') }}"></script>
<!-- Stack array for including inline js or scripts -->
@stack('script')

<script src="{{ asset('dist/js/theme.js') }}"></script>
{{-- <script src="{{ asset('js/chat.js') }}"></script> --}}
</body>
</html>