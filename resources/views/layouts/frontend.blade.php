<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="This is a three piece market place for women. We are providing best quality three piece at low cost. We deliver our product very fast.">
	<meta name="keywords" content="3 piece, shalwar kameez, best 3 piece, three piece">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title')</title>
	<link rel="icon" type="image/png" href="{{asset('frontend/img/logo.jpg')}}">

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
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149462793-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149462793-1');
	</script>
	<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
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
			{{-- <div id="header"> --}}
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<style>
						.logoPosition {
							position: absolute;
						}
					</style>
					<div id="logoPosition" class="header-logo logoPosition">
						<a class="logo" href="{{route('index')}}">
							<img src="{{asset('frontend/img/main-logo.png')}}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<style>
						.header-search1 {
							margin-left: 270px;
						}
					</style>
					<div id="search" class="header-search header-search1">

						<form id="searchForm" action="{{route('search.page')}}" method="get">
							{{-- @csrf --}}
							<input id="search_box" name="search_key" required class="input search-input" type="text" placeholder="Enter Your Keyword">

							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- wishlist -->

						<li class="header-cart dropdown default-dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<div class="header-btns-icon">
									<i class="fa fa-heart fa-2x"></i>
									{{-- wishlist --}}
									@php
									$userIdentity = "";
									if (Auth::check()) {
									$userIdentity = Auth::id();
									} else {
									$userIdentity = Request::ip();
									}
									@endphp

									<span id="cart_number"
										class="qty">{{App\Models\Cart::where('user_identity',$userIdentity)->where('status',1)->count()}}</span>
								</div>
								<br>


							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="dropdown-cart-list">
									@php
									if(Auth::check()){
									$userIdentity = Auth::id();
									}
									else{
									$userIdentity = Request::ip();
									}
									$carts =
									App\Models\Cart::where('user_identity',$userIdentity)->where('status',1)->with('product')->get();
									@endphp
									<div id="carts">
										@foreach ($carts as $cart)
										<div class="product product-widget">
											<a href="{{$cart->product->mypath()}}">
											<div class="product-thumb">
												<img src="{{asset('thumb_product_images/'.$cart->product->displayImage->image)}}" alt="">
											</div>
											</a>
											<div class="product-body">
												<h3 class="product-price">{{$cart->product->price}} <span
														class="qty">x{{$cart->quantity}}</span></h3>
												<h2 class="product-name"><a
														href="{{$cart->product->mypath()}}">{{$cart->product->title}}</a>
												</h2>
												@if($cart->product->deleted_at != NULL)
												<strong style="color:red"> This Product is out of stock.</strong>
												@endif
											</div>
										</div>
										@endforeach
									</div>
									<div id="no_product_added">
										@if(count($carts)<1) <h4 style="margin-top:10px">No Product added</h4>
											@endif
									</div>
								</div>
							</div>
						</li>
                        {{-- wishlist end here end --}}


						<!-- Cart -->

						<li class="header-cart dropdown default-dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart fa-2x"></i>
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
										class="qty">{{App\Models\Cart::where('user_identity',$userIdentity)->where('status',1)->count()}}</span>
								</div>
								{{-- <strong class="text-uppercase">My Cart:</strong> --}}
								<br>
								{{-- price --}}
								@php
								$carts =
								App\Models\Cart::where('user_identity',$userIdentity)->where('status',1)->get();
								$price = 0;
								foreach ($carts as $cart) {
								$price = $cart->product->price*$cart->quantity + $price;
								}

								@endphp
								<span id="cart_price" style="padding:1px;">{{$price}}</span><img style="display: inline" width="12px"
									src="{{asset('frontend/img/taka.png')}}" alt="">

							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="dropdown-cart-list">
									@php
									if(Auth::check()){
									$userIdentity = Auth::id();
									}
									else{
									$userIdentity = Request::ip();
									}
									$carts =
									App\Models\Cart::where('user_identity',$userIdentity)->where('status',1)->with('product')->get();
									@endphp
									<div id="carts">
										@foreach ($carts as $cart)
										<div class="product product-widget">
											<a href="{{$cart->product->mypath()}}">
											<div class="product-thumb">
												<img src="{{asset('thumb_product_images/'.$cart->product->displayImage->image)}}" alt="">
											</div>
											</a>
											<div class="product-body">
												<h3 class="product-price">{{$cart->product->price}} <span
														class="qty">x{{$cart->quantity}}</span></h3>
												<h2 class="product-name"><a
														href="{{$cart->product->mypath()}}">{{$cart->product->title}}</a>
												</h2>
												@if($cart->product->deleted_at != NULL)
												<strong style="color:red"> This Product is out of stock.</strong>
												@endif
											</div>
										</div>
										@endforeach
									</div>
									<div id="no_product_added">
										@if(count($carts)<1) <h4 style="margin-top:10px">No Product added</h4>
											@endif
									</div>
								</div>
								<div id="view_cart" class="shopping-cart-btns">
									<span style="margin-left:15px"></span>
									<a href="{{route('cart')}}" class="main-btn ">View Cart</a>
									<a href="{{route('checkout')}}" class="primary-btn ">Checkout <i
											class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</li>
						{{-- cart end --}}
						<!-- Account -->
						@if (Auth::check())

						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div>
									<i class="fa fa-user-o fa-2x" aria-hidden="true"> &nbsp;</i>
								</div>
							</div>
							<ul class="custom-menu">
								<li><a href="{{route('user.profile')}}"><i class="fa fa-user-o"></i>Profile</a></li>
								<li><a href="{{route('change.password')}}"><i class="fa fa-pencil"></i>Change
										Password</a></li>

								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
						        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a></li>
							</ul>
						</li>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						@else
						<li>

                            <strong><a href="{{route('login')}}" class="text-uppercase"><i class="fa fa-sign-in fa-2x" aria-hidden="true"> &nbsp;</i></a>
                                 <a	href="{{route('register')}}" class="text-uppercase"><i class="fa fa-user-plus fa-2x" aria-hidden="true">&nbsp;</i></a></strong>
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
				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list dropdown">
                        @php
                            $categories =  App\Models\Category::orderBy('priority', 'asc')->get();

                        @endphp
                        @foreach ($categories as $category)
                        <li class="dropdown">
                            <a href="{{$category->mypath()}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$category->name}}</a>
                            <ul class="dropdown-menu">
                                @php
                               $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('priority', 'asc')->get();
                               @endphp
                               @foreach ($subcategories as $item)
                               <li> <a href="{{$item->mypath()}}">{{$item->name}}</a></li>
                               <hr class="hr">
                               @endforeach
                               <li> <a  href="{{$category->mypath()}}">All</a></li>
                            </ul>
                        @endforeach
                    </ul>
                    </div>
				</div>

			</div>
		</div>
		<!-- /container -->
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
		var alterClass = function () {
		var ww = document.body.clientWidth;
		if (ww < 950) { $('#header').removeClass('header1'); $('#search').removeClass('header-search1');
			$('#navigation').removeClass('navigation'); $('#logoPosition').removeClass('logoPosition'); } };
			$(window).resize(function () { alterClass(); }); alterClass(); });
	</script>

	<!-- /NAVIGATION -->

	{{-- <div class="container">
		<div class="row">


		</div>
	</div> --}}
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
							<a class="logo" href="">
								<img src="{{asset('frontend/img/main-logo.png')}}" alt="">
							</a>
						</div>
						<!-- /footer logo -->

						<p style="margin-top:-25px">A trust worthy e-commerce platform to buy product from anywhere in Bangladesh.</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a target="_blank" href="https://facebook.com/kapor.com.bd"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/BdKapor" target="_blank"><i class="fa fa-twitter"></i></a></li>
							{{-- {{-- <li><a href="#"><i class="fa fa-instagram"></i></a></li> --}}
							<li><a target="_blank" href="https://www.youtube.com/channel/UCREk65vSf7WSoPq7yMhCmfg"><i class="fa fa-youtube"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Account</h3>
						<ul class="list-links">
							@if (Auth::check())
							<li><a href="{{route('user.profile')}}"><i class="fa fa-user-o"></i> Profile</a></li>
							<li><a href="{{route('change.password')}}"><i class="fa fa-pencil"></i> Change
									Password</a></li>

							<a><a href="{{ route('logout') }}" onclick="event.preventDefault();
													        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></a>
							@else
							<li><a href="{{route('register')}}"><i class="fa fa-registered"></i> Register</a></li>
							<li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Login</a></li>
							@endif
							<li><a href="{{route('cart')}}"> <i class="fa fa-shopping-cart"></i> Cart</a></li>
							<li><a href="{{route('checkout')}}"><i class="fa fa-arrow-circle-right"></i> Checkout</a>
							</li>
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
							<li><a href="{{route('about.us')}}">About Us</a></li>
							<li><a href="{{route('help')}}">Give Feedback</a></li>
							<li><a href="{{route('shiping.return')}}">Terms and Conditions</a></li>
							<li><a href="{{route('privacy.policy')}}">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Contact Us</h3>
						<ul class="list-links">
							<li><a href="{{route('quick.contact')}}">Quick Contact</a></li>
							<li><a href="#">Call us +880 1833996321</a></li>
							<li><a href="#">Email us</a> - support@kaporbd.com</li>
						</ul>


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
						</script> All rights reserved <a href="{{route('index')}}">@KaporBD</a> . Technology Partner <a style="color:#f8694a"
							href="http://skoder.co" target="_blank">Skoder</a>
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
	{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

	{{--automomplete--}}
	<script src="{{ asset('frontend/js/jquery.easy-autocomplete.min.js') }}" defer></script>
	{{-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script> --}}

	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/slick.min.js')}}"></script>
	<script src="{{asset('frontend/js/nouislider.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('frontend/js/main.js')}}"></script>

	<script>
		$( function() {
		    // $( "#search" ).autocomplete({
			//   source: "{{route('search')}}",

			//   select: function( event, ui ) {
			// 	  $("#searchForm").submit();
			// 	 }
		    // });
		});

		//autocomplete
		$(document).ready(function (e) {
		// csrf
		$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		});
		// autocomplete
		var options = {

		url: "/search",

		getValue: "title",

		list: {
			match: {
			enabled: true
			},
			onClickEvent: function () {
			$("#search_form").submit();
			},
			onKeyEnterEvent: function () {
			$("#search_form").submit();
			}
		},
		theme: "funky"

		};
		$("#search_box").easyAutocomplete(options);

	});
	</script>
	@include('scripts.add_to_cart')
	@yield('script')




</body>

</html>
