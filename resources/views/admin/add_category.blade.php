@extends('layouts.admin')
@section('title','Add Category')
@section('header','Add Category')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.category') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" max="255" class="form-control" placeholder="Enter Category Name"
                    name="name" required autofocus>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection