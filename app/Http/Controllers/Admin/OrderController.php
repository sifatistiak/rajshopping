<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function orders()
    {
        $orderCarts = Cart::select('user_identity')->where('status', 0)->where('hand_over', 0)->groupBy('user_identity')->get();
        return view('admin.orders', compact('orderCarts'));
    }

    public function orderView($userIdentity)
    {
        $address = Address::where('user_identity', $userIdentity)->first();
        
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 0)->where('hand_over', 0)->get();

        return view('admin.order_view', compact('address', 'carts'));
    }

    public function action($action, $userIdentity)
    {
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->$action = 1;
        
        if ($action == "hand_over") {
            if ($address->confirm == 1 && $address->deliver == 1) {
                $carts = Cart::where('user_identity', $userIdentity)->get();
                foreach ($carts as $cart) {
                    $cart->hand_over = 1;
                    $cart->save();
                }
            } else {
                $address->$action = 0;
                return back()->with('error', 'Confirm and deliver first.');
            }

            $address->confirm = 0;
            $address->deliver = 0;
            $address->hand_over = 0;
        }
        $address->save();
        return back();
    }
    public function reverseAction($action, $userIdentity)
    {
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->$action = 0;
        $address->save();
        if ($action == "hand_over") {
            $carts = Cart::where('user_identity', $userIdentity)->get();
            foreach ($carts as $cart) {
                $cart->hand_over = 0;
                $cart->save();
            }
        }
        return back();
    }

    public function deleteOrder($userIdentity)
    {
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 0)->where('hand_over', 0)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->confirm = 0;
        $address->deliver = 0;
        $address->hand_over = 0;
        $address->save();
        return back();
    }

    public function completedOrders()
    {
        $orderCarts = Cart::select('user_identity')->where('status', 0)->where('hand_over', 1)->groupBy('user_identity')->get();
        return view('admin.completed_orders', compact('orderCarts'));
    }
    public function deleteCompleteOrder($userIdentity)
    {
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 0)->where('hand_over', 1)->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->confirm = 0;
        $address->deliver = 0;
        $address->hand_over = 0;
        $address->save();
        return back();
    }

    public function deleteOrderProduct($orderProductId)
    {
        Cart::destroy($orderProductId);
        return back()->with('success','Cart deleted');
    }

    public function saveCompleteOrder($userIdentity)
    {
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->confirm = 0;
        $address->deliver = 0;
        $address->hand_over = 0;
        $address->save();
        return back();
    }
}
