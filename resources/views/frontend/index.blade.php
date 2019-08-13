@extends('layouts.frontend')
@section('title','Salwar Kameez')
@section('content')
<!-- Slide HOME -->
<div id="home">
	<!-- container -->
	<div class="container">
		<!-- home wrap -->
		<div class="home-wrap">
			<!-- home slick -->
			<div id="home-slick">
				<!-- banner -->
				<div class="banner banner-1">
					<img src="{{asset('frontend/img/banner01.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h1>Bags sale</h1>
						<h3 class="white-color font-weak">Up to 50% Discount</h3>
						<button class="primary-btn">Shop Now</button>
					</div>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="banner banner-1">
					<img src="{{asset('frontend/img/banner02.jpg')}}" alt="">
					<div class="banner-caption">
						<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50%
								OFF</span></h1>
						<button class="primary-btn">Shop Now</button>
					</div>
				</div>
				<!-- /banner -->

				<!-- banner -->
				<div class="banner banner-1">
					<img src="{{asset('frontend/img/banner03.jpg')}}" alt="">
					<div class="banner-caption">
						<h1 class="white-color">New Product <span>Collection</span></h1>
						<button class="primary-btn">Shop Now</button>
					</div>
				</div>
				<!-- /banner -->
			</div>
			<!-- /home slick -->
		</div>
		<!-- /container -->
	</div>
</div>
<!-- /Slide HOME -->
<br>
<!--  section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="#">
					<img src="{{asset('frontend/img/banner10.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="#">
					<img src="{{asset('frontend/img/banner11.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
				<a class="banner banner-1" href="#">
					<img src="{{asset('frontend/img/banner12.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- / section -->
<!-- Cateory 1 section -->
<div class="section-category">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Category 1</h2>
					<div class="pull-right">
						<a href="#">
							<h3 style="color: #F8694A" class="title">View All</h3>
						</a>
						<div class="product-slick-dots-1 custom-dots">
						</div>
					</div>
				</div>
			</div>
			<!-- section title -->

			<!-- Product Slick -->
			<div class="col-md-12 col-sm-6 col-xs-6">
				<div class="row">

					<div id="product-slick-1" class="product-slick">
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product01.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product02.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my2.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product04.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product05.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product06.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->

					</div>
				</div>
			</div>
			<!-- /Product Slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Cateory 1 section -->



<!-- Cateory 2 section -->
<div class="section-category">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Category 2</h2>
					<div class="pull-right">
						<a href="#">
							<h3 style="color: #F8694A" class="title">View All</h3>
						</a>
						<div class="product-slick-dots-2 custom-dots">
						</div>
					</div>
				</div>
			</div>
			<!-- section title -->

			<!-- Product Slick -->
			<div class="col-md-12 col-sm-6 col-xs-6">
				<div class="row">

					<div id="product-slick-2" class="product-slick">
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
						<!-- Product Single -->
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/my1.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add
										to Cart</button>
								</div>
							</div>
						</div>
						<!-- /Product Single -->

					</div>
				</div>
			</div>
			<!-- /Product Slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Cateory 2 section -->



<!-- section -->
<div class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- banner -->
			<div class="col-md-8">
				<div class="banner banner-1">
					<img src="{{asset('frontend/img/banner13.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50%
								OFF</span></h1>
						<button class="primary-btn">Shop Now</button>
					</div>
				</div>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="#">
					<img src="{{asset('frontend/img/banner11.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="#">
					<img src="{{asset('frontend/img/banner12.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection