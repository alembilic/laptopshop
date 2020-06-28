<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LaptopShop &mdash; Best laptops in BiH</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    {{--<!-- Fonts -->--}}
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
</head>
<body>
<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="{{ route('home') }}">LaptopShop</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<li><a href="{{ route('products') }}">Products</a></li>
						<li><a href="{{ route('about') }}">About</a></li>
						<li><a href="{{ route('contact_us') }}">Contact us</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						@guest
							<li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
							@if (Route::has('register'))
								<li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
							@endif
						@else
							<li>{{ Auth::user()->name }}</li>
							<li class="shopping-cart mr-sm-5"><a href="{{ route('chart') }}" class="cart"><span><small id="items">{{ \App\Http\Controllers\Controller::orders() }}</small><i class="icon-shopping-cart"></i></span></a></li>
							<li class="shopping-cart"><a class="cart" href="{{ route('logout') }}"
														 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span><i class="icon-power"></i></span></a></li>
						@endguest
					</ul>
				</div>
			</div>

		</div>
    </nav>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>

		@yield('content')

		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-12 fh5co-widget">
						<h3>LaptopShop.</h3>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					</div>
				</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; 2020 LaptopShop. All Rights Reserved.</small>
							<small class="block">Made by Alem Bilić</small>
						</p>
						<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>

</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-waypoints@2.0.5/waypoints.min.js"></script>


<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Waypoints -->
{{--<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>--}}

<!-- Carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- countTo -->
<script src="{{ asset('js/jquery.countTo.js') }}"></script>

<!-- Flexslider -->
<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js') }}"></script>

<!-- Main -->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
