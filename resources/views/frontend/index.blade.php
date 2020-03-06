@extends('layouts.frontend')
@section('title','KaporBd - 3 piece for women')
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

<div style="margin:10rem;"></div>
<!-- /Slide HOME -->
<!-- Cateory 1 section -->
{{-- {{count($categoryProducts)}} --}}
{{-- @foreach ($categoryProducts as $categoryProduct) --}}
<div class="section-category">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title flex-center">
                        {{-- <h2 class="title">{{$allProducts[$i]}}</h2> --}}
                        <h2 class="title">NEW ARRIVALS</h2>
                        {{-- <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots">
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- section title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach ($allProducts as $product)
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


    <div class="section-category">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                            {{-- <h2 class="title">{{$allProducts[$i]}}</h2> --}}
                            <h2 class="title">HOT COLLECTIONS</h2>

                    </div>
                </div>
                <!-- section title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach ($hotProducts as $product)
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


    {{-- @endforeach --}}
    <!-- /Cateory 1 section -->

<!-- section -->
<div class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row" style="height:50rem;">
			<!-- banner -->
			<div class="col-md-6">
				<div class="banner banner-1">
					@if($bigCollection)
					<img src="{{asset('slider_images/'.$bigCollection->image)}}" alt="">
					@endif
					<div class="banner-caption text-center">
						<h1 class="primary-color">{{$categoryProducts[3]->name}} DEAL<br><span class="white-color font-weak">Up to {{$discount}}%
								OFF</span></h1>
						<a href="{{$categoryProducts[3]->mypath()}}" class="primary-btn">Shop
							Now</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="banner banner-1">
					@if($twoCollections)
					<img src="{{asset('slider_images/'.$bigCollection->image)}}" alt="">
					@endif
					<div class="banner-caption text-center">
						<h1 class="primary-color">{{$categoryProducts[4]->name}} DEAL<br><span class="white-color font-weak">Up to {{$discount}}%
								OFF</span></h1>
						<a href="{{$categoryProducts[4]->mypath()}}" class="primary-btn">Shop
							Now</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
<!--  section -->
<div id="shop" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner1 banner-1"><br><br><br>
                    <img height="130px" src="{{asset('frontend/img/delivery.jpg')}}" alt="">
                    <div class="banner-caption text-center">
                        {{-- <h2 class="white-color">NEW COLLECTION</h2> --}}
                    </div><br>

                    <h3 style="margin-top:8rem;">Free Delivery in Dhaka</h3>
                    <p style="text-align: justify;">We provide free delivery within Dhaka city and 50tk for outside of
                        Dhaka. We deliver our product within 24-48 hours in Dhaka city and 48-72 hours outside of Dhaka.
                    </p>
                </a>

            </div>
            <!-- /banner -->
            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner1 banner-1">
                    <img src="{{asset('frontend/img/pathao.jpg')}}" alt="">
                    <div class="banner-caption text-center">
                        {{-- <h2 class="white-color">NEW COLLECTION</h2> --}}
                    </div><br>
                    <h3>Our Delivery Partner</h3>
                    <p style="text-align: justify;">Pathao helps us to deliver your product at your home. They provide
                        fast delivery. Pathao is our fast, safe and secure delivery partner.</p>
                </a>

            </div><br><br><br>
            <!-- /banner -->
            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner1 banner-1">
                    <img src="{{asset('frontend/img/cash.jpg')}}" alt="">
                    <div class="banner-caption text-center">
                        {{-- <h2 class="white-color">NEW COLLECTION</h2> --}}
                    </div><br><br>
                    <h3 style="margin-top:4rem;">Safe Payment System</h3>
                    <p style="text-align: justify;"> We receive cash when we deliver your product so that you don't have
                        to worry about your money. We also return your cash if any accident occurs.</p>
                </a><br>

            </div>
            <!-- /banner -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- / section -->
@endsection
