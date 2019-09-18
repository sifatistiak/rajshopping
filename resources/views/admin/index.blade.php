@extends('layouts.admin')
@section('title','Admin | Home')
@section('header','Dashboard')
@section('content')

This is dashbord
<h3>Number Of Category : {{$numberOfCategory}}</h3>
<h3>Number Of Product : {{$numberOfProduct}}</h3>
<h3>Number Of Order : {{$numberOfOrder}}</h3>
<h3>Number Of Complete Order : {{$numberOfCompleteOrder}}</h3>
@endsection