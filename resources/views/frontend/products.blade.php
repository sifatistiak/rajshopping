@extends('layouts.frontend')
@section('title','Products')
@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- MAIN -->
			<div id="main" class="col-md-12">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="row-filter">
							<a href="#"><i class="fa fa-th-large"></i></a>
							<a href="#" class="active"><i class="fa fa-bars"></i></a>
						</div>
						<div class="sort-filter">
							<span class="text-uppercase">Sort By Price:</span>
							<select class="input">
								<option value="0">High to Low</option>
								<option value="0">Low to High</option>
							</select>
							<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
					<div class="pull-right">
						<div class="page-filter">
							<span class="text-uppercase">Show:</span>
							<select class="input">
								<option value="0">10</option>
								<option value="1">20</option>
								<option value="2">30</option>
							</select>
						</div>
						<ul class="store-pages">
							<li><span class="text-uppercase">Page:</span></li>
							<li class="active">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /store top filter -->
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Category Name</h2>
						</div>
					</div>
					<!-- section title -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
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
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product03.jpg')}}" alt="">
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
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product02.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
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
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product01.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
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
					</div>
					<!-- /Product Single -->
					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>New</span>
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick
									view</button>
								<img src="{{asset('frontend/img/product01.jpg')}}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
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
					</div>
					<!-- /Product Single -->
				</div>
			</div>
		</div>

		<!-- store bottom filter -->
		<div class="store-filter clearfix">
			<div class="pull-left">
				<div class="row-filter">
					<a href="#"><i class="fa fa-th-large"></i></a>
					<a href="#" class="active"><i class="fa fa-bars"></i></a>
				</div>
				<div class="sort-filter">
					<span class="text-uppercase">Sort By:</span>
					<select class="input">
						<option value="0">Position</option>
						<option value="0">Price</option>
						<option value="0">Rating</option>
					</select>
					<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
				</div>
			</div>
			<div class="pull-right">
				<div class="page-filter">
					<span class="text-uppercase">Show:</span>
					<select class="input">
						<option value="0">10</option>
						<option value="1">20</option>
						<option value="2">30</option>
					</select>
				</div>
				<ul class="store-pages">
					<li><span class="text-uppercase">Page:</span></li>
					<li class="active">1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- /store bottom filter -->
	</div>
	<!-- /MAIN -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->
@endsection