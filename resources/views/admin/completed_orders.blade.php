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
            @php
            $userIdentity = $orderCart->address($orderCart->user_identity)
            @endphp
            <tr style="background: #3c8dbc">
                <td>{{$loop->index+1}}</td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->name}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->phone}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->division}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->address}}</span>
                </td>
                <td><span style="color:#FFFFFF;font-size: 20px">{{$userIdentity->order_count}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->created_at->toFormattedDateString()}}</span>
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
                <td>{{$item->amount}}</td>
                @php
                $total += $item->amount;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Shipping =
                        @php
                        $shipping = 0;
                       if($userIdentity->division == "Dhaka"){
                        $shipping = 0;
                        }
                        else{
                        $shipping = 50;
                        }
                        echo $shipping;
                        @endphp

                    </b></td>
                <td><b>Total = {{$total+$shipping}}</b></td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
