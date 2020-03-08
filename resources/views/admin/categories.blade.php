@extends('layouts.admin')
@section('title','Categories')
@section('header','Categories')
@section('content')

<div class="col-md-6" style="overflow-x: auto;">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">name</th>
                <th scope="col">Priority</th>
                <th scope="col">Number of Product</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->priority}}</td>
                <td>{{$category->products_count}}</td>
                <td><a class="btn btn-success" href="{{route('admin.edit.category.view',$category->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.category',$category->id)}}">Soft Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
