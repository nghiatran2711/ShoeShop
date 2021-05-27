<!doctype html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
    
<!-- Nulled by http://www.baobinh.net by tieulonglanh -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home Variation 2</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		<!-- Favicon
		============================================ -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}">
		
		<!-- FONTS
		============================================ -->	
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">			
		
		<!-- FANCYBOX CSS
		============================================ -->			
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.css') }}">	
		
		<!-- BXSLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery.bxslider.css') }}">			
				
		<!-- MEANMENU CSS
		============================================ -->			
        <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">	
		
		<!-- JQUERY-UI-SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui-slider.css') }}">		
		
		<!-- NIVO SLIDER CSS
		============================================ -->			
        <link rel="stylesheet" href="{{ asset('frontend/css/nivo-slider.css') }}">
		
		<!-- OWL CAROUSEL CSS 	
		============================================ -->	
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
		
		<!-- OWL CAROUSEL THEME CSS 	
		============================================ -->	
         <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css') }}">
		
		<!-- BOOTSTRAP CSS 
		============================================ -->	
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
		
		<!-- FONT AWESOME CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
		
		<!-- NORMALIZE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/normalize.css') }}">
		
		<!-- MAIN CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
		
		<!-- STYLE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
		
		<!-- RESPONSIVE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
		
		<!-- IE CSS 
		============================================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/ie.css') }}">		
		
		<!-- MODERNIZR JS 
		============================================ -->
        <script src="{{ asset('frontend/js/vendor/modernizr-2.6.2.min.js') }}"></script>
		@stack('css')
    </head>
    <body class="index-2">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
		<!-- HEADER START -->
            @include('layouts.header')
		<!-- HEADER END -->
		
		<!-- MAIN-MENU-AREA START -->
            @include('layouts.menu')
		<!-- MAIN-MENU-AREA END -->

        
		<!-- CONTENT -->
            @yield('content')
		<!-- CONTENT END -->
		
		
		<!-- COPYRIGHT-AREA START -->
            @include('layouts.footer')
		<!-- COPYRIGHT-AREA END -->
		<!-- JS 
		===============================================-->
		<!-- jquery js -->
		<script src="{{ asset('frontend/js/vendor/jquery-1.11.3.min.js') }}"></script>
		
		<!-- fancybox js -->
        <script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
		
		<!-- bxslider js -->
        <script src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>
		
		<!-- meanmenu js -->
        <script src="{{ asset('frontend/js/jquery.meanmenu.js') }}"></script>
		
		<!-- owl carousel js -->
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		
		<!-- nivo slider js -->
        <script src="{{ asset('frontend/js/jquery.nivo.slider.js') }}"></script>
		
		<!-- jqueryui js -->
        <script src="{{ asset('frontend/js/jqueryui.js') }}"></script>
		
		<!-- bootstrap js -->
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		
		<!-- wow js -->
        <script src="{{ asset('js/wow.js') }}"></script>		
		<script>
			new WOW().init();
		</script>

		<!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>	
		<script>
			function initialize() {
			  var mapOptions = {
				zoom: 8,
				scrollwheel: false,
				center: new google.maps.LatLng(35.149868, -90.046678)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position: map.getCenter(),
				map: map
			  });

			}
			google.maps.event.addDomListener(window, 'load', initialize);				
		</script>
		<!-- main js -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
		<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
		@stack('js')
    </body>

<!-- Nulled by http://www.baobinh.net by tieulonglanh -->
</html>