@extends('layouts.admin')
@section('title','Edit Sub Category')
@section('header','Edit Sub Category')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.edit.sub-category') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select required name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option @if($category->id == $subcategory->category_id)
                        selected
                        @endif
                        value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" value="{{$subcategory->name}}" max="255" class="form-control" placeholder="Enter Category Name"
                    name="name" required autofocus>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$subcategory->id}}"/>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Priority</label>
                <input type="number" max="255" value="{{$subcategory->priority}}" class="form-control" placeholder="Enter Priority"
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
