@extends('layouts.admin')
@section('title','Products')
@section('header','Products')
@section('content')
<small>*Hot Products are marked Red</small>
<br>
<div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Title</th>
                <th scope="">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Display Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

            @if ($product->status == 1)
            <tr style="color:red">
            @else
            <tr>
             @endif
                <td>{{$loop->index+1}}</td>
                <td>{{$product->title}}</td>
                <td>{{str_limit($product->desc,50)}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->subCategory['name']}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td><img height="60px" width="80px" src="{{asset('product_images/'.$product->displayImage->image)}}"
                        alt=""></td>
                <td>
                    <a href="{{route('admin.product.view',$product->id)}}">View || </a>
                    <a href="{{route('admin.edit.product.view',$product->id)}}">Edit || </a>
                    <a href="{{route('admin.duplicate.product.view',$product->id)}}">Duplicate || </a>
                    <a onclick="return confirm('Are you sure?')"
                        href="{{route('admin.delete.product',$product->id)}}">Soft Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
