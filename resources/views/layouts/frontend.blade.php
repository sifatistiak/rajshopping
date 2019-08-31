<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/slick-theme.css')}}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/nouislider.min.css')}}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />

	{{-- autocomplete --}}
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->



	<header>
		<style>
			/* Style the header */
			.header1 {
				position: fixed;
				z-index: 100;
				top: 0px;
				width: 100%;

			}
		</style>

		<div id="header" class="navbar-default header1">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{route('index')}}">
							<img src="{{asset('frontend/img/logo.png')}}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">

						<form id="searchForm" action="{{route('search.page')}}" method="get">
							{{-- @csrf --}}
							<input id="search" name="search" required class="input search-input" type="text"
								placeholder="Enter your keyword">

							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									{{-- cart --}}
									@php
									$userIdentity = "";
									if (Auth::check()) {
									$userIdentity = Auth::id();
									} else {
									$userIdentity = Request::ip();
									}
									@endphp

									<span id="cart_number"
										class="qty">{{App\Models\Cart::where('user_identity',$userIdentity)->count()}}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								{{-- price --}}
								@php
								$carts = App\Models\Cart::where('user_identity',$userIdentity)->get();
								$price = 0;
								foreach ($carts as $cart) {
								$price = $cart->product->price*$cart->quantity + $price;
								}

								@endphp
								<span id="cart_price">{{$price}}</span><img style="display: inline" width="12px"
									src="{{asset('frontend/img/taka.png')}}" alt="">
							</a>
							<div style="margin-left:90px" class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										@php
										if(Auth::check()){
										$userIdentity = Auth::id();
										}
										else{
										$userIdentity = Request::ip();
										}
										$carts = App\Models\Cart::where('user_identity',$userIdentity)->get();
										@endphp
										<div id="carts">
											@foreach ($carts as $cart)
											<div class="product product-widget">
												<div class="product-thumb">
													<img src="{{asset('thumb_product_images/'.$cart->product->displayImage->image)}}"
														alt="">
												</div>
												<div class="product-body">
													<h3 class="product-price">{{$cart->product->price}} <span
															class="qty">x{{$cart->quantity}}</span></h3>
													<h2 class="product-name"><a href="#">{{$cart->product->title}}</a>
													</h2>
												</div>
											</div>
											@endforeach

										</div>
									</div>
									<div id="no_product_added">
										@if(count($carts)<1) <h4>No Product added</h4>
											@endif
									</div>
									<div id="view_cart" class="shopping-cart-btns">
										<a href="{{route('cart')}}" class="main-btn">View Cart</a>
										<a href="{{route('checkout')}}" class="primary-btn">Checkout <i
												class="fa fa-arrow-circle-right"></i></a>
									</div>

								</div>
							</div>
						</li>
						<!-- /Cart -->
						<!-- Account -->
						@if (Auth::check())

						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>

								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>

							</div>
							<ul class="custom-menu">
								<li><a href="{{route('user.profile')}}"><i class="fa fa-user-o"></i>Profile</a></li>
								<li><a href="{{route('change.password')}}"><i class="fa fa-pencil"></i>Change
										Password</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
						        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
							</ul>
						</li>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						@else
						<li>
							<div class="header-btns-icon">
								<i class="fa fa-sign-in"></i>
							</div>
							<strong><a href="{{route('login')}}" class="text-uppercase">Login</a> / <a
									href="{{route('register')}}" class="text-uppercase">Join</a></strong>
						</li>
						@endif
						<!-- /Account -->
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
	<!-- NAVIGATION -->
	<div id="navigation" class="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav 
			@if(Request::path() != '/')
			show-on-click
			@endif
		">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						@foreach (App\Models\Category::all() as $category)
						<li><a href="{{route('products',encrypt($category->id))}}">{{$category->name}}</a></li>
						@endforeach
					</ul>

				</div>
				<!-- /category nav -->

			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<div class="container">
		<div class="row">


		</div>
	</div>
	@yield('content')





	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
								<img src="{{asset('frontend/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved @Touhedul Islam
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	{{-- <script src="{{asset('frontend/js/jquery.min.js')}}"></script> --}}
	<!-- jQuery 3 -->
	<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/slick.min.js')}}"></script>
	<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('frontend/js/main.js')}}"></script>

	<script>
		$( function() {
		    $( "#search" ).autocomplete({
			  source: "{{route('search')}}",
			  select: function( event, ui ) {
				  $("#searchForm").submit();			 
				 }
		    });
		  } );
	</script>
	@include('scripts.add_to_cart')
	@yield('script')




</body>

</html>