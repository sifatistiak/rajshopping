@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @include('includes.message')
            <div class="col-md-8">
                <div class="billing-details"><br>
                    <p>Already a customer ? <a class="btn btn-link" href="{{route('login')}}">Login</a></p>
                    <div class="section-title">
                        <h3 class="title">Register Here</h3>
                    </div>
                    <div class="form-group">
                        <h4>Name</h4>
                        <input required value="{{old('name')}}" class="input" type="text" name="name"
                            placeholder=" Name">
                    </div>
                    <div class="form-group">
                        <h4>Email</h4>
                        <input required value="{{old('email')}}" class="input" type="email" name="email"
                            placeholder="You don't have to confirm your email.">
                    </div>
                    <div class="form-group">
                        <h4>Phone</h4>
                        <input required value="{{old('phone')}}" class="input" type="number" name="phone"
                            placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <h4>District</h4>
                        <select required value="{{old('division')}}" name="division" class="form-control">
                            <option value="">Select District for Shipping</option>
                            {{-- <option value="Dhaka">Dhaka</option> --}}
                            {{-- <option value="Barishal">Barishal</option> --}}
                            {{-- <option value="Chittagong">Chittagong</option> --}}
                            {{-- <option value="Khulna">Khulna</option> --}}
                            {{-- <option value="Mymensingh">Mymensingh</option> --}}
                            <option value="Rajshahi" selected>Rajshahi </option>
                            {{-- <option value="Sylhet">Sylhet </option> --}}
                            {{-- <option value="Rangpur">Rangpur</option> --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Police Station</h4>
                        <select required value="{{old('city')}}" name="city" class="form-control">
                            <option value="" >Select Police Station</option>
                            {{-- <option value="Bagerhat">Bagerhat</option>
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
                            <option value="Thakurgonj">Thakurgonj</option> --}}
                            <option value="Rajpara" selected>Rajpara</option>
                            <option value="Boalia" selected>Boalia</option>
                            <option value="Motihar" selected>Motihar</option>
                            <option value="Chandrima" selected>Chandrima</option>
                            <option value="Katakhali" selected>Katakhali</option>
                            <option value="Belpukur" selected>Belpukur</option>
                            <option value="Shah Makhdum" selected>Shah Makhdum</option>
                            <option value="Airport" selected>Airport</option>
                            <option value="Paba" selected>Paba</option>
                            <option value="Kashiadanga" selected>Kashiadanga</option>
                            <option value="Kornohar" selected>Kornohar</option>
                            <option value="Damkura" selected>Damkura</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Shipping Address</h4>
                        <textarea required class="form-control" rows="5" placeholder="Your Shipping Address"
                            name="address">{{old('address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <h4>Password</h4>
                        <input required class="input" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <h4>Confirm Password</h4>
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
