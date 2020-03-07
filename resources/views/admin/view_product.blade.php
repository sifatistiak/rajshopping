@extends('layouts.admin')
@section('title','Admin | View Product')
@section('header','View Product')
@section('content')
<div class="row" style="display:grid">
<div class="col-md-12"><br>
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
                Sub Category
            </td>
            <td>
                {{$product->subCategory['name']}}
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
<div class="col-md-4">
    <p>Display Image</p>
    <img src="{{asset('product_images/'.$displayImage->image)}}" />
</div>

<div class="col-md-4">
<h3>Other Images</h3>
@foreach ($productImages as $productImage)
    <img src="{{asset('product_images/'.$productImage->image)}}" />
@endforeach
</div>
</div>

@endsection
