@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card"><br>
                <h2 class="card-header">{{ __('Reset Password') }}</h2><br>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('errors'))
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        We can't find a user with that e-mail address.
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="primary-btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection