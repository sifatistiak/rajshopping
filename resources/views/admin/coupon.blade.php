@extends('layouts.admin')
@section('title','Categories')
@section('header','Categories')
@section('content')

<div class="col-md-6">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Code</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupon as $coupon)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$coupon->code}}</td>
                <td>{{$coupon->type}}</td>
                <td>{{$coupon->amount}}</td>
                <td><a class="btn btn-success" href="{{route('admin.edit.coupon.view',$coupon->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.coupon',$coupon->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
