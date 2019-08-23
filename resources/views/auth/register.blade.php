@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="billing-details"><br>
                    <p>Already a customer ? <a class="btn btn-link" href="{{route('login')}}">Login</a></p>
                    <div class="section-title">
                        <h3 class="title">Register Here</h3>
                    </div>
                    <div class="form-group">
                        <input required class="input" type="text" name="name" placeholder=" Name">
                    </div>
                    <div class="form-group">
                        <input required class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input required class="input" type="number" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <select required name="division" class="form-control">
                            <option value="">Select Division</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi </option>
                            <option value="Sylhet">Sylhet </option>
                            <option value="Rangpur">Rangpur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea required class="form-control" rows="5" placeholder="Your Shipping Address"
                            name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <input required class="input" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input required class="input" type="password" name="password_confirmation"
                            placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="primary-btn">Register</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection