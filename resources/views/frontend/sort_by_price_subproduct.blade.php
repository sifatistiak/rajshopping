@extends('layouts.frontend')
@section('title','Category Products')
@section('content')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- MAIN -->
			<div id="main" class="col-md-12">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="row-filter">

						</div>
						<div class="sort-filter">
							<form action="{{route('sort.by.price')}}" method="POST">
								@csrf
								<span class="text-uppercase">Sort By Price:</span>
								<select name="filter" required class="input">
									<option value="">--Select--</option>
									<option @isset($filter) @if ($filter==1) selected @endif @endisset value="1">High
										to Low</option>
									<option @isset($filter) @if ($filter==0) selected @endif @endisset value="0">Low
										to High</option>
								</select>
								<input type="hidden" name="sub_category_id" value="{{$subcategory->id}}">
								<button type="submit" class="main-btn icon-btn"><i
										class="fa fa-arrow-down"></i></button>
							</form>
						</div>
					</div>
					<div style="margin-top:-20px" class="pull-right">

					</div>
				</div>
				<!-- /store top filter -->
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<a href=" {{route('products',encrypt($subcategory->id))}} ">
								<h2 class="title">{{$subcategory->name}}</h2>
							</a>
						</div>
					</div>
					<!-- section title -->

					<!-- Product Single -->
					@if (count($products)>0)
					@foreach ($products as $product)

					<div class="col-md-3 col-sm-6 col-xs-6">
						@include('includes.product')
					</div>
					<!-- /Product Single -->
					@endforeach
					@else
					<h3 style="color:red">No Product Found</h3>
					@endif

				</div>
			</div>
		</div>

		<div class="row">
			<!-- MAIN -->
			<div id="main" class="col-md-12">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="row-filter">

						</div>
						<div class="sort-filter">
							<form action="{{route('sort.by.price')}}" method="POST">
								@csrf
								<span class="text-uppercase">Sort By Price:</span>
								<select name="filter" required class="input">
									<option value="">--Select--</option>
									<option @isset($filter) @if ($filter==1) selected @endif @endisset value="1">High
										to Low</option>
									<option @isset($filter) @if ($filter==0) selected @endif @endisset value="0">Low
										to High</option>
								</select>
								<input type="hidden" name="sub_category_id" value="{{$subcategory->id}}">
								<button type="submit" class="main-btn icon-btn"><i
										class="fa fa-arrow-down"></i></button>
							</form>
						</div>
					</div>
					<div style="margin-top:-20px" class="pull-right">

					</div>
				</div>
				<!-- /store top filter -->
			</div>
		</div>

	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){


		});
</script>
@endsection
