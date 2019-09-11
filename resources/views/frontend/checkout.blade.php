@extends('layouts.frontend')
@section('title','Salwar Kameez')
@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->

		<div class="row">
			<form action="{{route('place.order')}}" method="POST" id="checkout-form" class="clearfix">
				@csrf
				<div class="col-md-12"> @include('includes.message')</div>
				<div class="col-md-6">
					<div class="billing-details">
						@if (Auth::check())
						@else
						<p>Already a customer ? <a href="{{route('login')}}">Login</a></p>
						
						@endif
						<div class="section-title">
							<h3 class="title">Billing Details</h3>
						</div>
						<input type="hidden" name="user_identity"
							value="@if($address){{$address->user_identity}}@endif">
						<div class=" form-group">
							<h4>Name</h4>
							<input required class="input"
								value="@if($address){{$address->name}}@else{{ old('name') }} @endif" type="text"
								name="name" placeholder=" Name">
						</div>
						<div class="form-group">
							<h4>Email</h4>
							<input required class="input"
								value="@if ($address){{$address->email}}@else{{ old('email') }} @endif"" type=" email"
								name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<h4>Phone</h4>
							<input required class="input"
								value="@if ($address){{$address->phone}}@else{{ old('phone') }} @endif" type="number"
								name="phone" placeholder="Phone">
						</div>
						<div class="form-group">
							<h4>Devision</h4>
							<select required name="division" class="form-control">
								<option value="">Select Division</option>
								<option @if ($address) @if ($address->division == "Dhaka") selected @endif @endif
									value="Dhaka">Dhaka </option>
								<option @if ($address) @if ($address->division == "Barishal") selected @endif @endif
									value="Barishal">Barishal</option>
								<option @if ($address) @if ($address->division == "Chittagong") selected @endif @endif
									value="Chittagong">Chittagong</option>
								<option @if ($address) @if ($address->division == "Khulna") selected @endif @endif
									value="Khulna">Khulna</option>
								<option @if ($address) @if ($address->division == "Mymensingh") selected @endif @endif
									value="Mymensingh">Mymensingh</option>
								<option @if ($address) @if ($address->division == "Rajshahi") selected @endif @endif
									value="Rajshahi">Rajshahi </option>
								<option @if ($address) @if ($address->division == "Sylhet") selected @endif @endif
									value="Sylhet">Sylhet </option>
								<option @if ($address) @if ($address->division == "Rangpur") selected @endif @endif
									value="Rangpur">Rangpur</option>
							</select>
						</div>
						<div class="form-group">
							<h4>Address</h4>
							<textarea required class="form-control" rows="5" placeholder="Your Shipping Address"
								name="address">@if ($address){{$address->address}}@else{{ old('address') }}@endif</textarea>
						</div>
						@if(!Auth::check())
						<div class="form-group">
							<div class="input-checkbox">
								<input type="checkbox" id="register">
								<label class="font-weak" for="register">Create Account?</label>
								<div class="caption">
									<div class="form-group">
										<h4>Password</h4>
										<input class="input" type="password" name="password" placeholder="Password">
									</div>
									<div class="form-group">
										<h4>Confirm Password</h4>
										<input class="input" type="password" name="password_confirmation"
											placeholder="Confirm Password">
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>

				<div class="col-md-6">

					<div class="payments-methods">
						<div class="section-title">
							<h4 class="title">Payments Methods</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-1" checked>
							<label for="payments-1">Cash on Delivery</label>
							<div class="caption">
								<p>Please provide cash on receiving your product. Thank you.
									<p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Cart Review</h3>
						</div>
						@if (count($carts)>0)
						<table id="cart_table" class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Image</th>
									<th> Name </th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
								@php
								$total = 0;
								@endphp
								@foreach ($carts as $cart)

								<tr class="rows">
									<td class="thumb"><img
											src="{{asset('thumb_product_images/'.$cart->product->displayImage->image)}}"
											alt="">
									</td>
									<input type="hidden" name="carts[]" value="{{$cart->id}}">
									<td class="details">
										<a href="#">{{$cart->product->title}}</a>
									</td>
									<td class="text-center product_price"><strong>{{$cart->product->price}} <img
												style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

									{{-- Quantity --}}
									<td class="qty text-center"><input min="1" class="input quantity" type="number"
											disabled data-value="{{$cart->id}}" value="{{$cart->quantity}}">
									</td>
									{{-- price --}}
									<td class="total1 text-center"><strong class="primary-color">
											@php
											$total += $cart->product->price * $cart->quantity;
											@endphp
											<div style="display:inline" class="view">
												{{$cart->product->price * $cart->quantity}}
											</div>
											<img style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

								</tr>
								@endforeach

							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SUBTOTAL</th>
									<th colspan="2" id="" class="sub-total">
										<div style="display:inline" id="sub_total">{{$total}}</div><img
											style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt="">
									</th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SHIPING</th>
									<th colspan="2" class="sub-total">50<img style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt=""></th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total">
										<div style="display:inline" id="total">{{$total+50}}</div>
										<img style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt="">
									</th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<button id="checkout" type="submit" class="primary-btn">Place Order</button>
						</div>
						@else
						<h1>Nothing has added to cart.</h1>
						@endif
					</div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


<!-- policy section -->
@include('includes.policy')
<!-- policy /section -->
@endsection