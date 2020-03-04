<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $cart = Cart::where('product_id', $productId)->where('user_identity', $userIdentity)->where('status', 1)->first();
        if ($cart) {
            $cart->quantity = $cart->quantity + 1;
        } else {
            $cart = new Cart();
            $cart->user_identity = $userIdentity;
            $cart->product_id = $productId;
        }
        $cart->save();
        $userCart = Cart::where('user_identity', $userIdentity)->where('status', 1)->count();
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 1)->get();
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
        $userCart = Cart::where('user_identity', $userIdentity)->where('status', 1)->count();
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 1)->get();
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
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 1)->with('product')->get();

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
        //buy now button work
        // if ($request->id) {
        //     $productId = decrypt($request->id);
        //     $cart = Cart::where('product_id', $productId)->where('user_identity', $userIdentity)->where('status', 1)->first();
        //     if ($cart) {
        //         $cart->quantity = $cart->quantity + 1;
        //     } else {
        //         $cart = new Cart();
        //         $cart->user_identity = $userIdentity;
        //         $cart->product_id = $productId;
        //     }
        //     $cart->save();
        // }

        $address = Address::where('user_identity', $userIdentity)->first();
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 1)->with('product')->get();
        return view('frontend.checkout', compact('carts', 'address'));
    }

    public function buyNow(Product $product)
    {
            $productId = $product->id;
            $userIdentity = "";
            if (Auth::check()) {
                $userIdentity = Auth::user()->id;
            } else {
                $userIdentity = request()->ip();
            }
            $cart = Cart::where('product_id', $productId)->where('user_identity', $userIdentity)->where('status', 1)->first();
            if ($cart) {
                $cart->quantity = $cart->quantity + 1;
            } else {
                $cart = new Cart();
                $cart->user_identity = $userIdentity;
                $cart->product_id = $productId;
            }
            $cart->save();

        $address = Address::where('user_identity', $userIdentity)->first();
        $carts = Cart::where('user_identity', $userIdentity)->where('status', 1)->with('product')->get();
        return view('frontend.checkout', compact('carts', 'address'));
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:191'],
            'phone' => ['required', 'starts_with:01', 'digits:11'],
            'division' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'max:65535'],
        ]);

        // create account in only address table
        if ($request->password == "") {
            // create
            if ($request->user_identity == "") {
                $address = new Address();
                $address->order_count = 1;
                $userIdentity = $request->ip();
            } else {
                // update
                if (Auth::check()) {
                    $userIdentity = Auth::id();
                } else {
                    $userIdentity = $request->user_identity;
                }
                $address = Address::where('user_identity', $userIdentity)->first();
                $address->order_count = $address->order_count+1;
            }
            $address->user_identity = $userIdentity;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->division = $request->division;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->save();

            foreach ($request->carts as $cartId) {
                $cart = Cart::where('id', $cartId)->first();
                $cart->status = 0;
                $cart->save();
            }


            $msg = "<h3>Your Order has been placed. We will contact you soon. Thank You.</h3>";
        } else { //user table entry create account
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user =  User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'status' => 1,
                'password' => Hash::make($request['password']),
            ]);
            $address = new Address();
            $address->order_count = 1;
            $address->user_identity = $user->id;
            $address->name = $request['name'];
            $address->phone = $request['phone'];
            $address->division = $request['division'];
            $address->address = $request['address'];
            $address->city = $request['city'];
            $address->save();
            Auth::loginUsingId($user->id);

            //change the user identity as user created account
            foreach ($request->carts as $cartId) {
                $cart = Cart::where('id', $cartId)->first();
                $cart->user_identity = Auth::id();
                $cart->status = 0;
                $cart->save();
            }

            $msg = "<h3>Your account has been created and  Order has been placed. We will contact you soon. Thank You.</h3>";
        }
        
        return redirect()->route('checkout')->with('success', $msg);
    }

    public function changeQuantity(Request $request)
    {
        $cartId =  $request->cartId;
        $quantity = $request->quantity;
        $cart = Cart::where('id', $cartId)->first();
        $cart->quantity = $quantity;
        $cart->save();
    }

    public function thanks()
    {
        return view('frontend.thanks');
    }
}
