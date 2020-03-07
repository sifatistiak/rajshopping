@extends('layouts.admin')
@section('title','Deleted Sub Categories')
@section('header','Deleted Sub Categories')
@section('content')

<div class="col-md-12">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">name</th>
                <th scope="col">Priority</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedsubCategories as $category)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->priority}}</td>
                <td><a class="btn btn-success" onclick="return confirm('Are you sure?')" href="{{route('admin.restore.sub-category',$category->id)}}">Restore</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.force.delete.sub-  category',$category->id)}}">Force Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
