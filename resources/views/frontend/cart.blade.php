@extends('layouts.frontend')
@section('title','Cart')
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
								@foreach($carts as $cart)
								@php
									$product = $cart->product;
								@endphp
								<tr class="rows">
									<td class="thumb"><img
											src="{{asset('thumb_product_images/'.$product->displayImage->image)}}"
											alt=""></td>
									<td class="details">
										<a href="{{$product->mypath()}}">{{$product->title}}</a>
										@if($product->deleted_at != NULL)
										<strong style="color:red"> This Product is out of stock.</strong>
										@endif
									</td>
									<td class="text-center product_price"><strong>{{$product->price}} <img
												style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

									{{-- Quantity --}}
									<td class="qty text-center"><input min="1" class="input quantity" type="number"
											onkeydown="return event.key != 'Enter';" data-value="{{$cart->id}}"
											value="{{$cart->quantity}}">
									</td>
									{{-- price --}}
									<td class="total1 text-center"><strong class="primary-color">
											@php
											$total += $product->price * $cart->quantity;
											@endphp
											<div style="display:inline" class="view">
												{{$product->price * $cart->quantity}}
											</div>
											<img style="display: inline" width="15px"
												src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

									<td class="text-right"><button data-value="{{$cart->id}}"
											class="closebtn main-btn icon-btn"><i class="fa fa-close"></i></button></td>
								</tr>
								@endforeach

							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" id="" class="sub-total">
										<div style="display:inline" id="sub_total">{{$total}}</div><img
											style="display: inline" width="15px"
											src="{{asset('frontend/img/taka.png')}}" alt="">
									</th>
								</tr>
								{{-- <tr>
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
								</tr> --}}
							</tfoot>
						</table>
						<div class="pull-right">
							<button id="checkout" class="primary-btn">Checkout</button>
						</div>
						@else
						<h1>Nothing has added to cart.</h1>
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
@section('script')
<script>
	$(document).ready(function(){
		$(document).on('click', '.closebtn', function (e) {
			e.preventDefault();
			if(confirm("Are you sure to remove this product from your cart?")){
				var cartId = $(this).data();
				$.get("{{route('delete.cart')}}",{cartId:cartId},function(data){
				// alert('Product Removed.');
				$("#cart_table").load(location.href + ' #cart_table');
				$("#cart_number").text(data[0]);
				$("#cart_price").text(data[1]);
				$("#carts").load(location.href + " #carts");
				});
			}
		});

		$(document).on("input",".quantity", function() {
			var quantity = parseInt(this.value,10);
			var productPrice = parseInt($(this).closest("tr").find(".product_price").text(),10);
			$(this).closest("tr").find(".view").html(quantity*productPrice);
			var sum = 0;
			$(".total1").each(function(){
			sum += Number($(this).text());
			
			});
			$("#sub_total").text(sum);
			$("#total").text(sum+50);
			$("#cart_price").text(sum);
		});

		$("#checkout").click(function(e){
			e.preventDefault();
			$(".quantity").each(function(){
				var quantity = this.value;
				var cartId = $(this).data();
				$.get("{{route('change.quantity')}}",{quantity:quantity,cartId:cartId},function(data){
					window.location.href="{{route('checkout',null)}}";
				});
			});
		});
		
	});

</script>
@endsection