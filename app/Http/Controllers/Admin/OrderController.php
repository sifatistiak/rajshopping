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

    public function action($action, $userIdentity)
    {
        $address = Address::where('user_identity', $userIdentity)->first();
        $address->$action = 1;
        $address->save();
        if ($action == "hand_over") {
            $carts = Cart::where('user_identity', $userIdentity)->get();
            foreach ($carts as $cart) {
                $cart->hand_over = 1;
                $cart->save();
            }
        }
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
        return back();
    }

    public function completedOrders()
    {
        $orderCarts = Cart::select('user_identity')->where('status', 0)->where('hand_over', 1)->groupBy('user_identity')->get();
        return view('admin.completed_orders', compact('orderCarts'));
    }
}
