@extends('layouts.admin')
@section('title','Categories')
@section('header','Categories')
@section('content')

<div class="col-md-6">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td><a class="btn btn-danger" href="{{route('admin.delete.category',$category->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection