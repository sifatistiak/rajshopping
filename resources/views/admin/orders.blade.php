@extends('layouts.admin')
@section('title','Orders')
@section('header','Orders')
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
                <th scope="col">Order At</th>
                <th scope="col">Confirm</th>
                <th scope="col">Deliver</th>
                <th scope="col">Hand Over</th>
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
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$orderCart->address($orderCart->user_identity)->created_at->toFormattedDateString()}}</span>
                </td>
                <td>
                    <span style="color:#FFFFFF;font-size: 20px;">
                        @if ($orderCart->address($orderCart->user_identity)->confirm == 0)
                        <a href="{{route('admin.action',['confirm',$orderCart->user_identity])}}"><span
                                style="color:red;font-size: 20px"> <i class="fa fa-times"></i></span></a>
                        @else
                        <a onclick="return confirm('Are you sure?')"
                            href="{{route('admin.reverse.action',['confirm',$orderCart->user_identity])}}"><span
                                style="color:#ffffff;font-size: 20px"> <i class="fa fa-check"></i></span></a>
                        @endif
                    </span></td>
                <td>
                    <span style="color:#FFFFFF;font-size: 20px">
                        @if ($orderCart->address($orderCart->user_identity)->deliver == 0)
                        <a href="{{route('admin.action',['deliver',$orderCart->user_identity])}}"><span
                                style="color:red;font-size: 20px"> <i class="fa fa-times"></i></span></a>
                        @else
                        <a onclick="return confirm('Are you sure?')"
                            href="{{route('admin.reverse.action',['deliver',$orderCart->user_identity])}}"><span
                                style="color:#ffffff;font-size: 20px"> <i class="fa fa-check"></i></span></a>
                        @endif
                    </span></td>
                <td>
                    <span style="color:#FFFFFF;font-size: 20px">
                        @if ($orderCart->address($orderCart->user_identity)->hand_over == 0)
                        <a href="{{route('admin.action',['hand_over',$orderCart->user_identity])}}"><span
                                style="color:red;font-size: 20px"> <i class="fa fa-times"></i></span></a>
                        @else
                        <a onclick="return confirm('Are you sure?')"
                            href="{{route('admin.reverse.action',['hand_over',$orderCart->user_identity])}}"><span
                                style="color:#ffffff;font-size: 20px"> <i class="fa fa-check"></i></span></a>
                        @endif
                    </span></td>
                <td>
                    <a href="{{route('admin.order.view',$orderCart->user_identity)}}" class="btn btn-info">View</a>||
                    <a onclick="return confirm('Are you sure?')" class="btn btn-danger"
                        href="{{route('admin.delete.order',$orderCart->user_identity)}}">Delete Order</a>

                </td>
            <tr>
                <td></td>
                <td></td>
                <th scope="col">Product</th>
                <th colspan="2" scope="col">Image</th>
                <th scope="col">quantity</th>
                <th scope="col">price</th>
                <th scope="col">Action</th>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach ($orderCart->orderProduct($orderCart->user_identity) as $item)
            <tr>
                <td></td>
                <td></td>
                <td>{{$item->product->title}}</td>
                <td colspan="2"><img height="80px" width="100px"
                        src="{{asset('thumb_product_images/'.$item->product->displayImage->image)}}" alt=""></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->product->price}}</td>
                <td><a class="btn btn-info" href="{{route('admin.product.view',$item->product->id)}}">View</a></td>
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
                <td><b>Shipping =
                        @php
                        $shipping = 0;
                        if($orderCart->address($orderCart->user_identity)->division == "Dhaka"){
                        $shipping = 60;
                        }
                        else{
                        $shipping = 120;
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