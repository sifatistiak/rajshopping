@extends('layouts.admin')
@section('title','Admin | Home')
@section('header','Helps')
@section('content')
<div class="col-md-6">
    <h3>Average feedback : {{$avarageFeedback}}</h3>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Feedback</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($helps as $help)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$help->email}}</td>
                <td>{{$help->message}}</td>
                <td>{{$help->feedback}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection