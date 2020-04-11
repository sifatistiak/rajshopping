@extends('layouts.frontend')
@section('title','Search Result')
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

                        </div>
                    </div>
                    <div style="margin-top:-20px" class="pull-right">
                        {{$products->links()}}
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
                            <h2 class="title">Search Result </h2>
                        </div>
                    </div>
                    <!-- section title -->

                    <!-- Product Single -->
                    @if (count($products)>0 || count($categories)>0 || count($subcategories)>0)

                    @foreach ($products as $product)

                    <div class="col-md-3 col-sm-6 col-xs-6">
                        @include('includes.product')
                    </div>
                    <!-- /Product Single -->
                    @endforeach
                    @foreach ($categories as $category)

                    @foreach ($category->searchProducts() as $product)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        @include('includes.product')
                    </div>
                    @endforeach
                    @endforeach

                    @foreach ($subcategories as $subcategory)

                    @foreach ($subcategory->searchProducts() as $product)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        @include('includes.product')
                    </div>
                    @endforeach
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

                        </div>
                    </div>
                    <div style="margin-top:-20px" class="pull-right">
                        {{$products->links()}}
                    </div>
                </div>
                <!-- /store top filter -->
            </div>
        </div>

    </div>
</div>


@endsection
