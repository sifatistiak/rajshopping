@extends('layouts.admin')
@section('title','Add Coupon')
@section('header','Add Coupon')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.edit.coupon') }}" method="POST" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Coupon Code</label>
            <input type="text" max="255" class="form-control" placeholder="Enter Coupon Code" value="{{$coupon->code}}" name="code" required
                    autofocus>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Coupon Type</label>
                <select required name="type" class="form-control">
                    <option @if($coupon->type == 0)
                        selected
                        @endif
                        value="0"> Percentage </option>
                    <option @if($coupon->type == 1)
                        selected
                        @endif
                        value="1"> Fixed Amount </option>
                </select>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$coupon->id}}" />
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Discount Value</label>
                <input type="number" min="0" class="form-control" placeholder="Enter Amount (or in %)" name="amount" value="{{$coupon->amount}}"
                    required>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection
