@extends('layouts.frontend')
@section('title','Checkout')
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
							<h4>Phone</h4>
							<input required class="input"
								value="@if ($address){{$address->phone}}@else{{ old('phone') }} @endif" type="number"
								name="phone" placeholder="Phone">
						</div>
						<div class="form-group">
							<h4>Devision</h4>
							<select required id="division" name="division" class="form-control">
								<option value="">Select Division for Shipping</option>
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
							<h4>City</h4>
							<select required name="city" class="form-control">
								@if($address)
								<option value="{{$address->city}}">{{$address->city}}</option>
								@else
								<option value="">Select City for Shipping</option>
								@endif
								<option value="Bagerhat">Bagerhat</option>
								<option value="Bandarban">Bandarban</option>
								<option value="Barguna">Barguna</option>
								<option value="Barishal">Barishal</option>
								<option value="B. Baria">B. Baria</option>
								<option value="Bhola">Bhola </option>
								<option value="Bogra">Bogra </option>
								<option value="Chadpur">Chadpur</option>
								<option value="Chapainawabganj">Chapainawabganj</option>
								<option value="Chittagong">Chittagong</option>
								<option value="Chuadanga">Chuadanga</option>
								<option value="Cox's Bazar">Cox's Bazar</option>
								<option value="Cumilla">Cumilla</option>
								<option value="Dhaka">Dhaka</option>
								<option value="Dinajpur">Dinajpur</option>
								<option value="Faridpur">Faridpur</option>
								<option value="Feni">Feni</option>
								<option value="Gaibandha">Gaibandha</option>
								<option value="Gazipur">Gazipur</option>
								<option value="Gopalgonj">Gopalgonj</option>
								<option value="Hobigonj">Hobigonj</option>
								<option value="Jamalpur">Jamalpur</option>
								<option value="Joshore">Joshore</option>
								<option value="Jhalkathi">Jhalkathi</option>
								<option value="Jinaidah">Jinaidah</option>
								<option value="Jaypurhat">Jaypurhat</option>
								<option value="Khagrachori">Khagrachori</option>
								<option value="Khulna">Khulna</option>
								<option value="Kishorgonj">Kishorgonj</option>
								<option value="Kurigram">Kurigram</option>
								<option value="Kustia">Kustia</option>
								<option value="Lakhsmipur">Lakhsmipur</option>
								<option value="Lalmonirhat">Lalmonirhat</option>
								<option value="Madaripur">Madaripur</option>
								<option value="Magura">Magura</option>
								<option value="Manikganj">Manikganj</option>
								<option value="Meherpur">Meherpur</option>
								<option value="Moulubi bazar">Moulubi bazar</option>
								<option value="Munsiganj">Munsiganj</option>
								<option value="Mymensingh">Mymensingh</option>
								<option value="Naogaon">Naogaon</option>
								<option value="Narail">Narail</option>
								<option value="Narayanganj">Narayanganj</option>
								<option value="Norshingdi">Norshingdi</option>
								<option value="Nator">Nator</option>
								<option value="Netrokona">Netrokona</option>
								<option value="Nilphamari">Nilphamari</option>
								<option value="Noakhali">Noakhali</option>
								<option value="Pabna">Pabna</option>
								<option value="Panchagar">Panchagar</option>
								<option value="Potuakhali">Potuakhali</option>
								<option value="Pirojpur">Pirojpur</option>
								<option value="Rajbari">Rajbari</option>
								<option value="Rangamati">Rangamati</option>
								<option value="Rangpur">Rangpur</option>
								<option value="Satkhira">Satkhira</option>
								<option value="Soriatpur">Soriatpur</option>
								<option value="Sherpur">Sherpur</option>
								<option value="Sirajganj">Sirajganj</option>
								<option value="Sunamganj">Sunamganj</option>
								<option value="Sylhet">Sylhet</option>
								<option value="Tangail">Tangail</option>
								<option value="Thakurgonj">Thakurgonj</option>
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
										<h4>Email</h4>
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
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
								</p><br><br>
								<h4>
									Free delivery inside Dhaka
								</h4>
								<h4>
									Shipping Charge outside Dhaka : 50 <img style="display: inline" width="15px"
										src="{{asset('frontend/img/taka.png')}}" alt="">
								</h4>
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
								@php
								$product = $cart->product;
								@endphp

								<tr class="rows">
									<td class="thumb"><a href="{{$product->mypath()}}"><img src="{{asset('thumb_product_images/'.$product->displayImage->image)}}" height="80px" width="100px" alt=""></a></td>
									<input type="hidden" name="carts[]" value="{{$cart->id}}">
									<td class="details">
										<a href="{{$cart->product->mypath()}}">{{$cart->product->title}}</a>
										@if($cart->product->deleted_at != NULL)
										<strong style="color:red"> This Product is out of stock.</strong>
										@endif
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
									<th colspan="2" class="sub-total"><span id="shipping">
											@if ($address)
											@if ($address->division == "Dhaka")
											0
											@else
											50
											@endif
											@endif

										</span><img style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt=""></th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total">
										<div style="display:inline" id="total">{{$total}}</div>
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
@section('script')
<script>
	$(document).ready(function(){
			$("#division").change(function(e){
				var division = $("#division").val();
				var shipping = 0;
				if(division == "Dhaka"){
					shipping = 0;
				}else{
					shipping = 50;
				}
				$("#shipping").text(shipping);
				var subTotal = parseInt($("#sub_total").text());
				$("#total").text(subTotal+shipping);

			});
		});
</script>
@endsection