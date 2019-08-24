<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;

class ShoppingController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $userIdentity = "";
        if (Auth::user()) {
            $userIdentity = Auth::user()->id;
        } else {
            $userIdentity = $request->ip();
        }
        $cart = Cart::where('product_id', $productId)->where('user_identity', $userIdentity)->first();
        if ($cart) {
            $cart->quantity = $cart->quantity + 1;
        } else {

            $cart = new Cart();
            $cart->user_identity = $userIdentity;
            $cart->product_id = $productId;
        }
        $cart->save();
        $userCart = Cart::where('user_identity', $userIdentity)->count();
        $carts = Cart::where('user_identity', $userIdentity)->get();
        $price = 0;
        foreach ($carts as $cart) {
            $price = $cart->product->price * $cart->quantity + $price;
        }
        return [$userCart,$price];
    }
}
