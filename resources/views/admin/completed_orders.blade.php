@extends('layouts.admin')
@section('title','Complete Orders')
@section('header','Complete Orders')
@section('content')

<div class="col-md-12">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">name</th>
                <th scope="col">Phone</th>
                <th scope="col">Division</th>
                <th scope="col">Address</th>
                <th scope="col">Order count</th>
                <th scope="col">Order At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderCarts as $orderCart)

            <tr style="background: #3c8dbc">
                <td>{{$loop->index+1}}</td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->name}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->phone}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->division}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->address}}</span>
                </td>
                <td><span style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->order_count}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->created_at->toFormattedDateString()}}</span>
                </td>
                <td>
                    <a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                        href="{{route('admin.delete.complete.order',$orderCart->user_identity)}}">Delete</a>
                </td>
            <tr>
                <td></td>
                <td></td>
                <th scope="col">Product</th>
                <th colspan="2" scope="col">Image</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach ($orderCart->completeOrderProduct($orderCart->user_identity) as $item)
            <tr>
                <td></td>
                <td></td>
                <td>{{$item->product->title}}</td>
                <td colspan="2"><img height="80px" width="100px"
                        src="{{asset('thumb_product_images/'.$item->product->displayImage->image)}}" alt=""></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product->price}}</td>
                @php
                $total += $item->quantity*$item->product->price;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total = {{$total+50}}</b></td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection