@extends('layouts.frontend')
@section('title','Quick Contact')
@section('content')

<section>
    <div class="container">
        <div class="row"><br>
            <div class="col-md-8">
                @include('includes.message')
                <form data-parsley-validate method="POST" action="{{route('submit.help')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                    <input value="{{old('name')}}" data-parsley-trigger="change" required type="text" class="input" id="exampleInputEmail1" name="name"
                            aria-describedby="nameHelp" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        @guest
                        <input data-parsley-trigger="change" value="{{old('email')}}" required type="email" class="input" id="exampleInputEmail1"
                            name="email" aria-describedby="emailHelp" placeholder="Enter your email">
                        @else
                        <input data-parsley-trigger="change" required type="email" class="form-control" id="exampleInputEmail1"
                            value="{{Auth::user()->email}}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        @endguest
            
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label><small></small> <textarea required name="message" class="form-control"
                            id="exampleFormControlTextarea1" rows="6">{{old('message')}}</textarea>
                    </div>
                    <button type="submit" class="primary-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection