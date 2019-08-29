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
				@foreach ($sliderImages as $sliderImage)
				<div class="banner banner-1">
					<img src="{{asset('slider_images/'.$sliderImage->image)}}" alt="">
					<div class="banner-caption text-center">
						<h3 class="white-color font-weak">Up to 10% Discount</h3>
					</div>
				</div>
				@endforeach
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
				<a class="banner banner-1" href="{{route('products',encrypt($categoryProducts[0]->id))}}">
					<img src="{{asset('frontend/img/banner10.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="{{route('products',encrypt($categoryProducts[1]->id))}}">
					<img src="{{asset('frontend/img/banner11.jpg')}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->

			<!-- banner -->
			<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
				<a class="banner banner-1" href="{{route('products',encrypt($categoryProducts[2]->id))}}">
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

@foreach ($categoryProducts as $categoryProduct)
@if (count($categoryProduct->products)>0)

<div class="section-category">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<a href=" {{route('products',encrypt($categoryProduct->id))}} "><h2 class="title">{{$categoryProduct->name}}</h2></a>
					<div class="pull-right">
						<a href=" {{route('products',encrypt($categoryProduct->id))}} ">
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
						@foreach ($categoryProduct->products as $product)
						@include('includes.product')
						@endforeach
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
@endif
@endforeach
<!-- /Cateory 1 section -->




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