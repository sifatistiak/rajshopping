@extends('layouts.frontend')
@section('title','Product')
@section('content')

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!--  Product Details -->
			<div class="product product-details clearfix">
				<div class="col-md-6">

					<div id="product-main-view">
						@foreach ($singleProduct->images as $image)
						<div class="product-view">
							<img src="{{asset('main_product_images/'.$image->image)}}" alt="">
						</div>
						@endforeach

					</div>
					<div id="product-view">
						@foreach ($singleProduct->images as $image)
						<div class="product-view">
							<img src="{{asset('thumb_product_images/'.$image->image)}}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-6">
					<div class="product-body">
						<div class="product-label">
							<span>New</span>
							<span class="sale">-{{$singleProduct->discount}}%</span>
						</div>
						<h2 class="product-name">{{$singleProduct->title}}</h2>
						<h3 class="product-price">{{$singleProduct->price}}<img style="display: inline" width="15px"
								src="{{asset('frontend/img/taka.png')}}" alt="">
							<del class="product-old-price">@php
							$price = $singleProduct->price;
							$oldPrice = round($price+($price*$singleProduct->discount/100));
							@endphp
								{{$oldPrice}}<img style="display: inline" width="15px"
									src="{{asset('frontend/img/taka.png')}}" alt="">
							</del></h3>
						<div>
							@if (count($reviews)>0)
							<div class="product-rating">

								@php
								$totalReview = 0;
								foreach($reviews as $review){
								$totalReview = $review->rating+$totalReview;
								}
								$totalReview = round($totalReview/count($reviews));
								@endphp

								@for($i=0; $i<$totalReview; $i++) <i class="fa fa-star"></i>
									@endfor
									@for($i=0; $i<5-$totalReview; $i++) <i class="fa fa-star-o empty"></i>
										@endfor
							</div>
							@endif
							<a href="#review">{{count($reviews)}} Review(s) / Add Review</a>

						</div><br>
						<p><strong>Availability:</strong> @if ($singleProduct->quantity > 0)
							In Stock
							@else
							Not Available
							@endif</p>
						<p><strong>Category:</strong> {{$singleProduct->category->name }} </p>
						<p>{!!$singleProduct->desc!!}</p><br>

						<div class="product-btns">

							<a href="{{route('checkout',encrypt($singleProduct->id))}}" class="primary-btn"><i
									class="fa fa-shopping-basket"></i> Buy Now
							</a>
							<button id="add_to_cart" value="{{$singleProduct->id}}" class="primary-btn add_to_cart"><i
									class="fa fa-shopping-cart"></i>
									Add to Cart
									</button>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="review" class="product-tab">
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab2">Reviews ({{count($reviews)}})</a></li>
							<li><a data-toggle="tab" href="#tab1">Description</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in ">
								<p>
									{!!$singleProduct->desc!!}
								</p>
							</div>
							<div id="tab2" class="tab-pane fade in active">

								<div class="row">
									<div class="col-md-6">
										<div class="product-reviews">
											@foreach ($reviews as $review)

											<div class="single-review">
												<div class="review-heading">
													<div><a href="#"><i class="fa fa-user-o"></i> {{$review->name}}</a>
													</div>
													<div><a href="#"><i class="fa fa-clock-o"></i>
															{{$review->created_at->toFormattedDateString()}}</a></div>
													<div class="review-rating pull-right">
														@for($i=0; $i<$review->rating; $i++)
															<i class="fa fa-star"></i>
															@endfor
															@for($i=0; $i<5-$review->rating; $i++)
																<i class="fa fa-star-o empty"></i>
																@endfor
													</div>
												</div>
												<div class="review-body">
													<p>{{$review->message}}</p>
												</div>
											</div>
											@endforeach
											{{$reviews->links()}}

										</div>
									</div>
									<div class="col-md-6">
										<h4 class="text-uppercase">Write Your Review</h4>
										@include('includes.message')

										<form class="review-form" action="{{route('add.review')}}" method="POST">
											@csrf
											<input type="hidden" required name="product_id"
												value="{{$singleProduct->id}}" />

											<div class="form-group">
											<input placeholder="Your Name" value="{{old('name')}}" required class="input" type="text"	name="name" />
											</div>

											<div class="form-group">
												<textarea class="input" required name="message"
													placeholder="Your review">{{old('message')}}</textarea>
											</div>
											<div class="form-group">
												<div class="input-rating">
													<strong class="text-uppercase">Your Rating: </strong>
													<div class="stars">
														<input type="radio" id="star5" name="rating" value="5" /><label
															for="star5"></label>
														<input type="radio" id="star4" name="rating" value="4" /><label
															for="star4"></label>
														<input type="radio" id="star3" name="rating" value="3" /><label
															for="star3"></label>
														<input type="radio" id="star2" name="rating" value="2" /><label
															for="star2"></label>
														<input type="radio" id="star1" name="rating" value="1" /><label
															for="star1"></label>
													</div>
												</div>
											</div>
											<button class="primary-btn">Submit</button>
										</form>
									</div>

								</div>



							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- /Product Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- policy section -->
@include('includes.policy')
<!-- policy /section -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Picked For You</h2>
				</div>
			</div>
			<!-- section title -->

			<!-- Product Single -->
			@if (count($products)>0)
			@foreach ($products as $product)

			@if($product->id == $singleProduct->id)
			@else
			<div class="col-md-3 col-sm-6 col-xs-6">
				@include('includes.product')
			</div>
			@endif
			<!-- /Product Single -->
			@endforeach
			@else
			<h3 style="color:red">No Product Found</h3>
			@endif
			<!-- /Product Single -->

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

@endsection