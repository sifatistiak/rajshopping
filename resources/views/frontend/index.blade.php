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
				@if($sliderImages)
				@foreach ($sliderImages as $sliderImage)
				<div class="banner banner-1">
					<img src="{{asset('slider_images/'.$sliderImage->image)}}" alt="">
					<div class="banner-caption text-center">
						{{-- <h3 style="color:black"> Up to 10% Discount</h3> --}}
					</div>
				</div>
				@endforeach
				@endif
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
			@if($threeCollections)
			@foreach($threeCollections as $threeCollection)
			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="{{route('products',encrypt($categoryProducts[$loop->index]->id))}}">
					<img src="{{asset('slider_images/'.$threeCollection->image)}}" alt="">
					<div class="banner-caption text-center">
						<h2 class="white-color">NEW COLLECTION</h2>
					</div>
				</a>
			</div>
			<!-- /banner -->
			@endforeach
			@endif

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
					<a href=" {{route('products',encrypt($categoryProduct->id))}} ">
						<h2 class="title">{{$categoryProduct->name}}</h2>
					</a>
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
					@if($bigCollection)
					<img src="{{asset('slider_images/'.$bigCollection->image)}}" alt="">
					@endif
					<div class="banner-caption text-center">
						<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 10%
								OFF</span></h1>
						<a href=" {{route('products',encrypt($categoryProducts[3]->id))}}" class="primary-btn">Shop
							Now</a>
					</div>
				</div>
			</div>
			<!-- /banner -->
			@if($twoCollections)
			@foreach($twoCollections as $twoCollection)
			<!-- banner -->
			<div class="col-md-4 col-sm-6">
				<a class="banner banner-1" href="{{route('products',encrypt($categoryProducts[$loop->index+4]->id))}}">
					<img src="{{asset('slider_images/'.$twoCollection->image)}}" alt="">
					<div class="banner-caption text-center">
					</div>
				</a>
			</div>
			<!-- /banner -->
			@endforeach
			@endif
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection