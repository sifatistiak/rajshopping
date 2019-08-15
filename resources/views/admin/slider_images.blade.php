@extends('layouts.admin')
@section('title','Slider Images')
@section('header','Slider Images')
@section('content')

<div class="col-md-6">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliderImages as $sliderImage)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td><img width="100px" height="60px" src="{{asset('slider_images/'.$sliderImage->image)}}" alt=""></td>
                <td><a class="btn btn-danger" onclick="confirm('Are you sure ?')" href="{{route('admin.delete.slider.image',$sliderImage->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection