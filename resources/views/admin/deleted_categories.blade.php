@extends('layouts.admin')
@section('title','Deleted Categories')
@section('header','Deleted Categories')
@section('content')

<div class="col-md-6" style="overflow-x: auto;">
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
            @foreach ($deletedCategories as $category)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->priority}}</td>
                <td><a class="btn btn-success" onclick="return confirm('Are you sure?')" href="{{route('admin.restore.category',$category->id)}}">Restore</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.force.delete.category',$category->id)}}">Force Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
