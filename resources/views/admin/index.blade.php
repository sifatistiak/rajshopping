@extends('layouts.admin')
@section('title','Admin | Home')
@section('header','Dashboard')
@section('content')

<h3>Category : {{$numberOfCategory}}</h3>
<h3>Product : {{$numberOfProduct}}</h3>
<h3>Order : {{$numberOfOrder}}</h3>
<h3>Complete Order (approximately): {{$numberOfCompleteOrder}}</h3>
@endsection