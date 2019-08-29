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
        if (Auth::check()) {
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
        return [$userCart, $price];
    }

    public function deleteCart(Request $request)
    {

        $cartId = $request->cartId;
        $cart = Cart::where('id', $cartId)->first();
        // return $cart;
        $cart->delete();
        $userIdentity = "";
        if (Auth::user()) {
            $userIdentity = Auth::user()->id;
        } else {
            $userIdentity = $request->ip();
        }
        $userCart = Cart::where('user_identity', $userIdentity)->count();
        $carts = Cart::where('user_identity', $userIdentity)->get();
        $price = 0;
        foreach ($carts as $cart) {
            $price = $cart->product->price * $cart->quantity + $price;
        }
        return [$userCart, $price];
    }

    public function cart(Request $request)
    {
        if (Auth::check()) {
            $userIdentity = Auth::id();
        } else {
            $userIdentity = $request->ip();
        }
        $carts = Cart::where('user_identity', $userIdentity)->get();

        return view('frontend.cart', compact('carts'));
    }

    public function frontendCarts(Request $request)
    {
        if (Auth::check()) {
            $userIdentity = Auth::id();
        } else {
            $userIdentity = $request->ip();
        }
        return  Cart::where('user_identity', $userIdentity)->get();
    }

    public function checkoutPage(Request $request)
    {


        $userIdentity = "";
        if (Auth::check()) {
            $userIdentity = Auth::user()->id;
        } else {
            $userIdentity = $request->ip();
        }
        if ($request->id) {
            $productId = decrypt($request->id);
            $cart = Cart::where('product_id', $productId)->where('user_identity', $userIdentity)->first();
            if ($cart) {
                $cart->quantity = $cart->quantity + 1;
            } else {

                $cart = new Cart();
                $cart->user_identity = $userIdentity;
                $cart->product_id = $productId;
            }
            $cart->save();
        }

        $carts = Cart::where('user_identity', $userIdentity)->get();
        return view('frontend.checkout', compact('carts'));
    }

    public function changeQuantity(Request $request)
    {
        $cartId =  $request->cartId;
        $quantity = $request->quantity;
        $cart = Cart::where('id', $cartId)->first();
        $cart->quantity = $quantity;
        $cart->save();
    }
}
