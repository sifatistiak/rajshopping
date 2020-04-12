@extends('layouts.frontend')
@section('title','RAJSHOPPING | Best Online Shop in Rajshahi')
@section('content')
<div id="boxes">
    <div style="display: none;" id="dialog" class="window">
        {{-- <div id="col-12"> --}}
        <a href="#" class="close agree"><img src="{{asset('frontend/img/close-ic.png')}}" width="25"
                    style="float:right;"></a>
                    @if($pop_up)
                        <img src="{{asset('slider_images/'.$pop_up->image)}}" alt="" width="100%" height="90%">
                    @endif
        {{-- </div> --}}
    </div>
    <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask">
    </div>
</div>
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

<!-- /section -->
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
                        <h2 class="title">Groceries Collection</h2>
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
                            @foreach ($groceries as $product)
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
                            <h2 class="title">Home and Cleaning</h2>

                    </div>
                </div>
                <!-- section title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach ($home as $product)
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
                            <h2 class="title">Fruits and Vegitables</h2>

                    </div>
                </div>
                <!-- section title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-6 col-xs-6">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            @foreach ($fruits as $product)
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
<div class="section-category">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row" style="display:block;">
            <!-- banner -->
            <div class="col-md-6">
                <div class="banner banner-low">
                    @if($left)
                    <img src="{{asset('slider_images/'.$left->image)}}" alt="">
                    @endif
                    {{-- <div class="banner-caption text-center">
                        <h1 class="primary-color">{{$categoryProducts[3]->name}} DEAL<br><span
                        class="white-color font-weak">Up to {{$discount}}%
                        OFF</span></h1>
                    <a href="{{$categoryProducts[3]->mypath()}}" class="primary-btn">Shop
                        Now</a>
                </div> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="banner banner-low">
                @if($right)
                <img src="{{asset('slider_images/'.$right->image)}}" alt="">
                @endif
                {{-- <div class="banner-caption text-center">
                        <h1 class="primary-color">{{$categoryProducts[4]->name}} DEAL<br><span
                    class="white-color font-weak">Up to {{$discount}}%
                    OFF</span></h1>
                <a href="{{$categoryProducts[4]->mypath()}}" class="primary-btn">Shop
                    Now</a>
            </div> --}}
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>

<script>
    $(document).ready(function() {
        if (sessionStorage.getItem("loaded") == "ok") {
            $('#mask').hide();
            $('.window').hide();

        } else {
            var id = '#dialog';
                var maskHeight = $(document).height();
                var maskWidth = $(window).width();
                $('#mask').css({'width':maskWidth,'height':maskHeight});
                $('#mask').fadeIn(500);
                $('#mask').fadeTo("slow",0.9);
                var winH = $(window).height();
                var winW = $(window).width();
                $("#dialog").css('top', $(window).height()/2-$("#dialog").height()/2);
                $(id).css('left', winW/2-$(id).width()/2);
                $(id).fadeIn(2000);
                $('.window .close').click(function (e) {
                e.preventDefault();
                sessionStorage.setItem("loaded", "ok");
                $('#mask').hide();
                $('.window').hide();
                });
                $('#mask').click(function () {
                sessionStorage.setItem("loaded", "ok");
                $(this).hide();
                $('.window').hide();
                });

        }
    });
</script>
@endsection
