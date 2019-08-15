@extends('layouts.admin')
@section('title','Products')
@section('header','Products')
@section('content')

<div class="col-md-6">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$product->title}}</td>
                <td>{{str_limit($product->desc,20)}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td><a class="btn btn-primary" href="{{route('admin.edit.product.view',$product->id)}}">Edit</a></td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.product',$product->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection