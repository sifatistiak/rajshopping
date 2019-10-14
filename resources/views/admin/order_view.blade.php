<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>View Order</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"><br>
                <button onclick="window.print();"></button>
                <h1>KaporBD.com</h1><br><br>
                <table class="table table-striped">
                    <tr>
                        <td>
                            <h3>Name</h3>
                        </td>
                        <td>
                            <h3>{{$address->name}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Phone</h3>
                        </td>
                        <td>
                            <h3>{{$address->phone}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Division</h3>
                        </td>
                        <td>
                            <h3>{{$address->division}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Address</h3>
                        </td>
                        <td>
                            <h3>{{$address->address}}</h3>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-md-10">
                <div class="order-summary clearfix">
                    <div class="section-title">
                        <h3 class="title">Ordered Product</h3>
                    </div>
                    @if (count($carts)>0)
                    <table id="cart_table" class="shopping-cart-table table">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($carts as $cart)

                            <tr class="rows">

                                <td class="details">
                                    <p><b>{{$cart->product->title}}</b></p>
                                </td>
                                <td class="text-center product_price"><strong>{{$cart->product->price}} <img
                                            style="display: inline" width="15px"
                                            src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

                                {{-- Quantity --}}
                                <td class="qty text-center">{{$cart->quantity}}
                                </td>
                                {{-- price --}}
                                <td class="total1 text-center"><strong class="primary-color">
                                        @php
                                        $total += $cart->product->price * $cart->quantity;
                                        @endphp
                                        <div style="display:inline" class="view">
                                            {{$cart->product->price * $cart->quantity}}
                                        </div>
                                        <img style="display: inline" width="15px"
                                            src="{{asset('frontend/img/taka.png')}}" alt=""></strong></td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>SUBTOTAL</th>
                                <th colspan="2" id="" class="sub-total">
                                    <div style="display:inline" id="sub_total">{{$total}}</div><img
                                        style="display: inline" width="15px" src="{{asset('frontend/img/taka.png')}}"
                                        alt="">
                                </th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>SHIPING</th>
                                <th colspan="2" class="sub-total"><span id="shipping">
                                        @php
                                        $shipping = 0;
                                        if($address->division == "Dhaka"){
                                        $shipping = 0;
                                        }
                                        else{
                                        $shipping = 50;
                                        }
                                        echo $shipping;
                                        @endphp
                                    </span><img style="display: inline" width="15px"
                                        src="{{asset('frontend/img/taka.png')}}" alt=""></th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="2"></th>
                                <th>TOTAL</th>
                                <th colspan="2" class="total">
                                    <div style="display:inline" id="total">{{$total+$shipping}}</div>
                                    <img style="display: inline" width="15px" src="{{asset('frontend/img/taka.png')}}"
                                        alt="">
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="pull-right">
                    </div>
                    @else
                    <h1>Nothing has added to cart.</h1>
                    @endif
                </div>

            </div>

        </div>
    </div>
</body>

</html>