@extends('layouts.frontend')
@section('title','User | RAJSHOPPING | Best Online Shop in Rajshahi')
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
                        <input required class="input" disabled value="{{Auth::user()->email}}" type="email" name="email"
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
                        <h4>City</h4>
                        <select required name="city" class="form-control">
                            @if($address)
                            <option value="{{$address->city}}">{{$address->city}}</option>
                            @else
                            <option value="">Select City for Shipping</option>
                            @endif
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="B. Baria">B. Baria</option>
                            <option value="Bhola">Bhola </option>
                            <option value="Bogra">Bogra </option>
                            <option value="Chadpur">Chadpur</option>
                            <option value="Chapainawabganj">Chapainawabganj</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                            <option value="Cumilla">Cumilla</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Feni">Feni</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalgonj">Gopalgonj</option>
                            <option value="Hobigonj">Hobigonj</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Joshore">Joshore</option>
                            <option value="Jhalkathi">Jhalkathi</option>
                            <option value="Jinaidah">Jinaidah</option>
                            <option value="Jaypurhat">Jaypurhat</option>
                            <option value="Khagrachori">Khagrachori</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kishorgonj">Kishorgonj</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Kustia">Kustia</option>
                            <option value="Lakhsmipur">Lakhsmipur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Magura">Magura</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Moulubi bazar">Moulubi bazar</option>
                            <option value="Munsiganj">Munsiganj</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Narail">Narail</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Norshingdi">Norshingdi</option>
                            <option value="Nator">Nator</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Panchagar">Panchagar</option>
                            <option value="Potuakhali">Potuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Soriatpur">Soriatpur</option>
                            <option value="Sherpur">Sherpur</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Tangail">Tangail</option>
                            <option value="Thakurgonj">Thakurgonj</option>
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
