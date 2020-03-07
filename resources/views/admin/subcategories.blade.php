@extends('layouts.admin')
@section('title','Sub Categories')
@section('header','Sub Categories')
@section('content')

<div class="col-md-12">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Priority</th>
                <th scope="col">Number of Product</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$subcategory->category->name}}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->priority}}</td>
                <td>{{$subcategory->products_count}}</td>
                <td><a class="btn btn-success" href="{{route('admin.edit.sub-category.view',$subcategory->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.sub-category',$subcategory->id)}}">Soft Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
