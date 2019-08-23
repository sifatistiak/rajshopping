@extends('layouts.frontend')

@section('content')
<div class="container">

    <div class="row">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="billing-details"><br>

                    <div class="section-title">
                        <h3 class="title">Login Here</h3>
                    </div>
                    <div class="form-group">
                        <input required class="input" type="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input required class="input" type="password" name="password" placeholder="Password">
                    </div>
                    <button style="display:inline" type="submit" class="primary-btn">Login</button>
                    <span class="pull-right">@if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif</span>
                    <p>Don't have any account? ? <a class="btn btn-link" href="{{route('register')}}">register here</a>
                    
                    </p>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection