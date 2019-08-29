@extends('layouts.frontend')
@section('title','Change Password')
@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('change.password') }}" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="billing-details"><br>
                    <div class="section-title">
                        <h3 class="title">Change Password</h3>
                    </div>
                    @include('includes.message')
                    <div class="form-group">
                        <h4>Old Password</h4>
                        <input required class="input" type="text" name="oldpassword" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <h4>New Password</h4>
                        <input required class="input"  type="password" name="password"
                            placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <h4>Confirm New Password</h4>
                        <input required class="input" type="password" id="password-confirm" name="password_confirmation"
                            placeholder="Confirm New Password">
                    </div>
                    <button type="submit" class="primary-btn">Update</button>

                </div>
            </div>
        </form>
    </div>

</div>
@endsection