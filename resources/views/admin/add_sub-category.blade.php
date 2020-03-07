@extends('layouts.admin')
@section('title','Add Sub Category')
@section('header','Add Sub Category')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.sub-category') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select required name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Sub Category Name</label>
                <input type="text" max="255" class="form-control" placeholder="Enter Sub Category Name"
                    name="name" required autofocus>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Sub Category Priority</label>
                <input type="number" max="255" class="form-control" placeholder="Enter Priority"
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
