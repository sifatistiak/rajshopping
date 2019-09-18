@extends('layouts.admin')
@section('title','Admin | View Product')
@section('header','View Product')
@section('content')

<div class="col-md-8"><br>
    <table class="table table-striped">
        <tr>
            <td>
                Product Id
            </td>
            <td>
                {{$product->id}}
            </td>
        </tr>
        <tr>
            <td>
                Title
            </td>
            <td>
                {{$product->title}}
            </td>
        </tr>
        <tr>
            <td>
                Description
            </td>
            <td>
                {!!$product->desc!!}
            </td>
        </tr>
        <tr>
            <td>
                Category
            </td>
            <td>
                {{$product->category->name}}
            </td>
        </tr>
        <tr>
            <td>
                Price
            </td>
            <td>
                {{$product->price}}
            </td>
        </tr>
    </table>
</div>
<div class="row">
<div class="col-md-8">
    <p>Display Image</p>
    <img src="{{asset('product_images/'.$displayImage->image)}}" />
</div>
</div>
<h3>Other Images</h3>
<div class="row">
@foreach ($productImages as $productImage)
<div class="col-md-6">
    <img src="{{asset('product_images/'.$productImage->image)}}" />
</div>
@endforeach
</div>

@endsection