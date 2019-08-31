@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('user.profile') }}" method="POST">
            @csrf
            <div class="col-md-8">
                <div class="billing-details"><br>
                    <div class="section-title">
                        <h3 class="title">Profile</h3>
                    </div>
                    @include('includes.message')
                    <div class="form-group">
                        <h4>Name</h4>
                        <input required class="input" value="{{$address->name}}" type="text" name="name"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <h4>Email</h4>
                        <input required class="input" disabled value="{{$address->email}}" type="email" name="email"
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <h4>Phone</h4>
                        <input required class="input" value="{{$address->phone}}" type="number" name="phone"
                            placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <h4>Division</h4>
                        <select required name="division" class="form-control">
                            <option value="">Select Division</option>
                            <option @if($address->division == "Dhaka") selected @endif value="Dhaka">Dhaka</option>
                            <option @if($address->division == "Barishal") selected @endif value="Barishal">Barishal
                            </option>
                            <option @if($address->division == "Chittagong") selected @endif
                                value="Chittagong">Chittagong</option>
                            <option @if($address->division == "Khulna") selected @endif value="Khulna">Khulna</option>
                            <option @if($address->division == "Mymensingh") selected @endif
                                value="Mymensingh">Mymensingh</option>
                            <option @if($address->division == "Rajshahi") selected @endif value="Rajshahi">Rajshahi
                            </option>
                            <option @if($address->division == "Rajshahi") selected @endif value="Sylhet">Sylhet
                            </option>
                            <option @if($address->division == "Rangpur") selected @endif value="Rangpur">Rangpur
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Shipping Address</h4>
                        <textarea required class="form-control" rows="5" placeholder="Your Shipping Address"
                            name="address">{{$address->address}}</textarea>
                    </div>
                    <button type="submit" class="primary-btn">Update</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection