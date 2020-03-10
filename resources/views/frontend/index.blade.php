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
<div id="shop" class="section col-lg-12" style="background-color:#fef7e7; overflow:scroll;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <table style="margin-left: 25%; margin-right: 25%;">
                    <tr>
                        <td><img src="{{asset('frontend/img/main-logo.png')}}" alt=""></td>
                        <td style="padding-left: 10%;">
                            <h5> বাংলার মেলা</h5>
                            <p style="text-align:justify;">রঙ হতে রঙ বাংলাদেশ। সময়কে রাঙানোর অভিন্ন লক্ষে অবিচল আমরা। ২৪
                                বছরের লেগাসি অব্যাহত রেখেই পথ চলছে রঙ বাংলাদেশ। দেশজ
                                উপকরণ, উজ্জ্বল বর্ণ আর হৃদয়গ্রাহী নকশাবিন্যাসে সমুন্নত থাকবে আমাদের সাংস্কৃতিক ঐতিহ্য।
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top:2rem;">
            <div class="col-md-12">
                <table style="margin-left: 5%; margin-right: 5%;">
                    <tr>
                        <td><img src="{{asset('frontend/img/shroddhanjli.png')}}" alt=""></td>
                        <td style="padding-left: 2rem; padding-right:4rem;">
                            <h5> শ্রদ্ধাঞ্জলি</h5>
                            <p style="text-align:justify;">পরিবার ও সমাজে যাঁদের আমরা প্রতিদিন বিনম্র শ্রদ্ধা ও অনিশেষ
                                ভালোবাসায় সিক্ত করি তাদের জন্যই শ্রদ্ধাঞ্জলি। রঙ বাংলাদেশের
                                আন্তরিক নিবেদন। এই সাব-ব্র্যান্ডটি বয়োজ্যেষ্ঠদের আপন ভুবন। এর সৃষ্টিতে প্রতীয়মান
                                শ্রদ্ধাস্পদদের উপযোগী রঙ, ডিজাইন, আরাম,
                                মর্যাদা আর সামাজিক অবস্থান।</p>
                        </td>
                        <td><img src="{{asset('frontend/img/amar-bangladesh.png')}}" alt=""></td>
                        <td style="padding-left:2rem;">
                            <h5> আমার বাংলাদেশ</h5>
                            <p style="text-align:justify;">প্রতিটি পণ্যই এক টুকরো বাংলাদেশ। রঙ বাংলাদেশ-এর এই
                                সাব-ব্র্যান্ডে রয়েছে কান্ট্রি ব্র্যান্ডিংয়ের সচেতন প্রয়াস। স্মারক
                                উপহার বা সুভেনির সামগ্রীই এই কালেকশনের মূল বৈশিষ্ট্য। এর মাধ্যমে থাকছে দেশি এবং
                                বিদেশীদের কাছে পজিটিভ বাংলাদেশের
                                প্রতিচ্ছবিকে তুলে ধরার প্রচেষ্টা।</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="margin-top:2rem;">
            <div class="col-md-12">
                <table style="margin-left: 8%; margin-right: 5%;">
                    <tr>
                        <td><img src="{{asset('frontend/img/rang-junior.png')}}" alt=""></td>
                        <td style="padding-left: 5rem; width:45%">
                            <h5>বাংলার মেলা জুনিয়র</h5>
                            <p style="text-align:justify;">রঙ বাংলাদেশ-এর শিশুতোষ ফ্যাশন লাইন রঙ জুনিয়র। ছোটদের পোশাকের
                                বিশেষত্ব মেনেই তৈরি রঙ জুনিয়র-এর সংগ্রহ। প্রাত্যহিক আর
                                উৎসব পোশাকের ঋদ্ধ আয়োজনে রঙ জুনিয়র রাঙাবে শিশুদের আনন্দময় ভুবন। এই ব্র্যান্ডের সানন্দ
                                সংগ্রহে উজ্জ্বল হয়ে উঠবে
                                সববয়সী শিশুরা</p>
                        </td>
                        <td style="padding-left:2rem;"><img src="{{asset('frontend/img/west-rang-updated.png')}}"
                                alt=""></td>
                        <td style="padding-left:2rem;">
                            <h5> ওয়েস্ট বাংলার মেলা</h5>
                            <p style="text-align:justify;">সমসময়ের তারুণ্যময় ফ্যাশন লাইন। রঙ বাংলাদেশের সাব-ব্র্যান্ড।
                                হৃদয়ে তরুণ আর বয়সে তরুণদের জন্যই এই প্রয়াস। ট্রেন্ডি আর
                                ফ্যাশনেবল পোশাক ও পণ্যে সবাইকে প্রফুল্ল করতে বদ্ধপরিকর।</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- / section -->
@endsection
