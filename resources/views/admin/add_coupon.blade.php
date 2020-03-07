@extends('layouts.admin')
@section('title','Add Coupon')
@section('header','Add Coupon')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.coupon') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Coupon Code</label>
                <input type="text" max="255" class="form-control" placeholder="Enter Coupon Code"
                    name="code" required autofocus>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Coupon Type</label>
                <select name="type" class="form-control" required>
                    <option value="0">Percentage</option>
                    <option value="1">Fixed Amount</option>
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Discount Value</label>
                <input type="number" min="0" class="form-control" placeholder="Enter Amount (or in %)"
                    name="amount" required>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection
