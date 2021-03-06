@extends('layouts.admin')
@section('title','Orders')
@section('header','Orders')
@section('content')

<div class="col-md-12" style="overflow-x: auto;">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">name</th>
                <th scope="col">Phone</th>
                <th scope="col">Division</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Order At</th>
                <th scope="col">Order Count</th>
                <th scope="col">Confirm</th>
                <th scope="col">Deliver</th>
                <th scope="col">Hand Over</th>
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
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->city}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{str_limit($userIdentity->address,12)}}</span>
                </td>
                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->created_at->toFormattedDateString()}}</span>
                </td>

                <td><span
                        style="color:#FFFFFF;font-size: 20px">{{$userIdentity->order_count}}</span>
                </td>

                <td>
                    <span style="color:#FFFFFF;font-size: 20px;">
                        @if ($userIdentity->confirm == 0)
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
                        @if ($userIdentity->deliver == 0)
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
                        @if ($userIdentity->hand_over == 0)
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
                        href="{{route('admin.delete.order',$orderCart->user_identity)}}">Delete</a>

                </td>
            <tr>
                <td></td>
                <td></td>
                <th scope="col">Product</th>
                <th colspan="2" scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price (Unit Price)</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            @php
            $total = 0;
            $dis_total = 0;
            $orderProducts = $orderCart->orderProduct($orderCart->user_identity);
            @endphp
            @foreach ($orderProducts as $orderProduct)
            @php
                $product = $orderProduct->product;
            @endphp
            <tr>
                <td></td>
                <td></td>
                <td>{{$product->title}}</td>
                <td colspan="2"><img height="80px" width="100px"
                        src="{{asset('thumb_product_images/'.$product->displayImage->image)}}" alt=""></td>
                <td>{{$orderProduct->quantity}}</td>
                <td>{{$product->price*$orderProduct->quantity}} <small>({{$product->price}})</small></td>
                <td>
                    @if($product->deleted_at == NULL)
                    <button class="btn btn-success" disabled> Active</button>
                    @else
                    <button class="btn btn-danger" disabled>Soft Deleted</button>
                    @endif

                </td>
                <td colspan="3">
                    <a class="btn btn-info" href="{{route('admin.product.view',$product->id)}}">View</a>
                     || <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('admin.delete.order.product',$orderProduct->id)}}">Delete</a>
                </td>
                @php
                $total += $product->price*$orderProduct->quantity;
                $dis_total += $orderProduct->amount;
                @endphp
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2"><b>Discount = {{$dis_total}}</b></td>
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
                <td><b>Total = {{$total+$shipping-$dis_total}}</b></td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
