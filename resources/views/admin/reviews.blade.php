@extends('layouts.admin')
@section('title','Reviews')
@section('header','Reviews')
@section('content')

<div class="col-md-9">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Product</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Rating</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$review->product->title}}</td>
                <td><img height="60px" width="80px" src="{{asset('product_images/'.$review->product->displayImage->image)}}"
                        alt=""></td>
                <td>{{$review->name}}</td>
                <td>{{$review->email}}</td>
                <td>{{$review->message}}</td>
                <td>{{$review->rating}}</td>
                <td><a class="btn btn-default" href="{{route('admin.change.review.status',$review->id)}}">Status {{$review->status}}</a>
                 || <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.review',$review->id)}}">Delete</a></<a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection