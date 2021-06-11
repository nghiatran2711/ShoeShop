<!--author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Login admin</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Magnificent login form a Flat Responsive Widget,Login form widgets, Sign up Web 	forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href="{{ asset('login/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-css-->
<link rel="stylesheet" href="{{ asset('login/css/font-awesome.css') }}"><!--fontawesome-->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"><!--online fonts-->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"><!--online fonts-->
</head>
<body>
	<div class="w3ls-main">
		<div class="wthree-heading">
			<h1>Shop Sales</h1>
		</div>
			<div class="wthree-container">
				<div class="wthree-form">
					<div class="agileits-2">
						<h2>login</h2>
					</div>
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif

						{{-- show message --}}
						@if(Session::has('success'))
						<p style="color: white;">{{ Session::get('success') }}</p>
						@endif

						{{-- show error message --}}
						@if(Session::has('error'))
						<p style="color: red">{{ Session::get('error') }}</p>
						@endif
					<form action="{{ route('admin.login.handle') }}" method="POST">
						@csrf
						<div class="w3-user">
							<span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							<input type="email" name="email" placeholder="Email" required="">
						</div>
						@error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
						<div class="clear"></div>
						<div class="w3-psw">
							<span><i class="fa fa-key" aria-hidden="true"></i></span>
							<input type="password" name="password" placeholder="Password" required="">
						</div>
						@error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
						<div class="clear"></div>
						{{-- <div class="w3l">
							<span><a href="#">forgot password ?</a></span>  
						</div> --}}
						<div class="clear"></div>
						<div class="w3l-submit">
							<input type="submit" value="login">
						</div>
						<div class="clear"></div>
					</form>
				</div>
			</div>
	</div>
		<div class="agileits-footer">
			<p>&copy; Magnificent login Form. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
</body>
</html>

					
					
					
