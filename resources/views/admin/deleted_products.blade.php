@extends('layouts.admin')
@section('title','Deleted Products')
@section('header','Deleted Products')
@section('content')
<div class="col-md-12">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Display Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedProducts as $product)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$product->title}}</td>
                <td>{{str_limit($product->desc,50)}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->subCategory->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td><img height="60px" width="80px" src="{{asset('product_images/'.$product->displayImage->image)}}"
                        alt=""></td>
                <td>
                    <a onclick="return confirm('Are you sure?')"
                        href="{{route('admin.restore.product',$product->id)}}">Restore </a> ||
                    <a onclick="return confirm('Are you sure?')"
                        href="{{route('admin.force.delete.product',$product->id)}}">Force Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
