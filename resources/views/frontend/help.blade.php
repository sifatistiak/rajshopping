@extends('layouts.frontend')
@section('title','Feedback | RAJSHOPPING | Best Online Shop in Rajshahi')
@section('content')

<section>
    <div class="container">
        <div class="row"><br>
            <div class="col-md-8">
                <div class="section-title">
                    <h2 class="title">Feedback <span style="margin-left:9px"> </span>  Us</h2>
                </div>
            </div>
            <div class="col-md-8">

                @include('includes.message')<br>
                <form data-parsley-validate method="POST" action="{{route('submit.help')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input value="{{old('name')}}" data-parsley-trigger="change" required type="text" class="input"
                            id="exampleInputEmail1" name="name" aria-describedby="nameHelp" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        @guest
                        <input data-parsley-trigger="change" required type="email" class="input" id="exampleInputEmail1" value="{{old('email')}}"
                            name="email" aria-describedby="emailHelp" placeholder="Enter your email">
                        @else
                        <input data-parsley-trigger="change" required type="email" class="form-control" id="exampleInputEmail1"
                            value="{{Auth::user()->email}}" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        @endguest

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label><small> (optional)</small> <textarea name="message" class="form-control"
                            id="exampleFormControlTextarea1" rows="6">{{old('message')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Give Feedback</label> <br>
                        <input required type="radio" name="feedback" value="5"> Very Good<br>
                        <input required type="radio" name="feedback" value="4"> Good<br>
                        <input required type="radio" name="feedback" value="3"> Ok<br>
                        <input required type="radio" name="feedback" value="2"> Bad<br>
                        <input required type="radio" name="feedback" value="1"> Very Bad<br>
                    </div>
                    <button type="submit" class="primary-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
