@extends('layouts.frontend')
@section('title','WishList')
@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form id="checkout-form" class="clearfix">

				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Wishlist Review</h3>
						</div>
						@if (count($wishlists)>0)
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
								@foreach ($wishlists as $wishlist)

								<tr class="rows">
									<td class="thumb"><a href="{{$wishlist->attributes->url}}">
											<img src="{{asset($wishlist->attributes->image)}}" height="80px"
												width="100px" alt=""></a></td>
									<td class="details">
										<a href="{{$wishlist->attributes->url}}">{{$wishlist->name}}</a>
									</td>
									<td class="text-center product_price"><strong>{{$wishlist->price}} <img
												style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

									{{-- Quantity --}}
									<td class="qty text-center"><input min="1" disabled class="input quantity"
											type="number" onkeydown="return event.key != 'Enter';"
											data-value="{{$wishlist->id}}" value="{{$wishlist->quantity}}">
									</td>
									<td class="total1 text-center"><strong class="primary-color">
											<div style="display:inline" class="view">
												{{$wishlist->price * $wishlist->quantity}}
											</div>
											<img style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt="">
										</strong></td>

									<td class="text-right"><a href="{{route('remove.wishlist',$wishlist->id)}}"
											data-value="{{$wishlist->id}}" class="closebtn main-btn icon-btn"><i
												class="fa fa-close"></i></a></td>
								</tr>
								@endforeach
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>Grand Total</td>
									<td>{{ CartPackage::getSubTotal() }}<img style="display: inline" width="15px"
										src="{{asset('frontend/img/taka.png')}}" alt=""></td>
								</tr>

							</tbody>

						</table>
						@else
						<h1>Nothing has added to Wishlist.</h1>
						@endif
					</div>
					<div id="showde"></div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection