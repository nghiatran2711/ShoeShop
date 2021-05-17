<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>BRILLIANT Free Bootstrap Admin Template - WebThemez</title>
    <!-- Bootstrap Styles-->
    <link href="{{ asset('backend/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{ asset('backend/js/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{ asset('backend/css/custom-styles.css') }}" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('backend/js/Lightweight-Chart/cssCharts.css') }}"> 
</head>

<body>
    <div id="wrapper">
        @include('admin.layouts.nav')
        <!-- /. NAV TOP  -->
        @include('admin.layouts.nav-slide')
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
            {{-- @include('admin.layout.content') --}}
            @yield('content')
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{ asset('backend/js/jquery-1.10.2.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
	 
    <!-- Metis Menu Js -->
    <script src="{{ asset('backend/js/jquery.metisMenu.js') }}"></script>
    <!-- Morris Chart Js -->
    <script src="{{ asset('backend/js/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/morris/morris.js') }}"></script>
	
	
	<script src="{{ asset('backend/js/easypiechart.js') }}"></script>
	<script src="{{ asset('backend/js/easypiechart-data.js') }}"></script>
	
	 <script src="{{ asset('backend/js/Lightweight-Chart/jquery.chart.js') }}"></script>
	
    <!-- Custom Js -->
    <script src="{{ asset('backend/js/custom-scripts.js') }}"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('backend/js/chart.min.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('backend/js/chartjs.js') }}"></script> 

</body>

</html>