@extends('layouts.admin')
@section('title','Edit Category')
@section('header','Edit Category')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.edit.category') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" value="{{$category->name}}" max="255" class="form-control" placeholder="Enter Category Name"
                    name="name" required autofocus>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$category->id}}"/>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Priority</label>
                <input type="number" max="255" value="{{$category->priority}}" class="form-control" placeholder="Enter Priority"
                    name="priority" required>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection