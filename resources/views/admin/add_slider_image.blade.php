@extends('layouts.admin')
@section('title','Add Slider Image')
@section('header','Add Slider Image')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.slider.image') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Slider and Collection Image</label>
                <input type="file" class="form-control" name="image" required autofocus>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Image Type</label>
                <select class="form-control" name="type">
                    <option value="slider">Slider Image</option>
                    <option value="collection">Collection Image</option>
                    <option value="big_collection">Big Collection Image</option>
                </select>

            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection