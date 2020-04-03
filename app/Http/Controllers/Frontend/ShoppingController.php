<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Cart as WishList;

use Session;

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

        if ($code = $request->input('code')) {
            $coupon = Coupon::where('code', $code)->first();
            session(['coupon' => $coupon]);
            return view('frontend.cart', compact('carts', 'coupon'));
        } else {
            return view('frontend.cart', compact('carts'));
        }
    }

    // public function cartCoupon($request)
    // {
    //     $coupon = Coupon::where('code', $request)->first();
    //     return view('frontend.cart', compact('coupon'));
    // }

    public function frontendCarts(Request $request)
    {
        if (Auth::check()) {
            $userIdentity = Auth::id();
        } else {
            $userIdentity = $request->ip();
        }
        return  Cart::where('user_identity', $userIdentity)->get();
    }

    public function addToWishList(Product $product)
    {
        WishList::add(array(
            'id' => $product->id, // inique row ID
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => "thumb_product_images/" . $product->displayImage->image,
                'url' => $product->mypath(),
            ),
        ));

        return back();
    }

    public function wishLists()
    {
        $wishlists = WishList::getContent();
        return view('frontend.wishlists', compact('wishlists'));
    }

    public function removeWishlist($id)
    {
        WishList::remove($id);
        return back();
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
        $discountvalue = $request->session()->get('coupon', 'default');
        return view('frontend.checkout', compact('carts', 'address', 'discountvalue'));
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
                $address->order_count = $address->order_count + 1;
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
                $cart->amount = $request->amount;
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

        // SSL payment
        if ($request->payment == "ssl") {
            /* PHP */
            $post_data = array();
            $post_data['store_id'] = "skode5e1fc7839f532";
            $post_data['store_passwd'] = "skode5e1fc7839f532@ssl";
            $post_data['total_amount'] = $request->amount;
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
            $post_data['success_url'] = route('cart.payment.success');
            $post_data['fail_url'] = route('cart.payment.fail');
            $post_data['cancel_url'] = route('cart.payment.cancel');
            # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

            # EMI INFO
            $post_data['emi_option'] = "1";
            $post_data['emi_max_inst_option'] = "9";
            $post_data['emi_selected_inst'] = "9";

            # CUSTOMER INFORMATION
            $post_data['cus_name'] = $request->name;
            $post_data['cus_email'] = $request->email;
            $post_data['cus_add1'] = $request->address;
            $post_data['cus_add2'] = "Dhaka";
            $post_data['cus_city'] = "Dhaka";
            $post_data['cus_state'] = "Dhaka";
            $post_data['cus_postcode'] = "1000";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] = $request->phone;
            $post_data['cus_fax'] = "01711111111";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "testskode5pzm";
            $post_data['ship_add1 '] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_country'] = "Bangladesh";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = $request->name;
            $post_data['value_b'] = $request->email;
            $post_data['value_c'] = $request->phone;
            $post_data['value_d'] = $request->address;

            # CART PARAMETERS
            $post_data['cart'] = json_encode(array(
                array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
                array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
                array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
                array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
            ));
            $post_data['product_amount'] = "100";
            $post_data['vat'] = "5";
            $post_data['discount_amount'] = "5";
            $post_data['convenience_fee'] = "3";
            # REQUEST SEND TO SSLCOMMERZ
            $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $direct_api_url);
            curl_setopt($handle, CURLOPT_TIMEOUT, 30);
            curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
            curl_setopt($handle, CURLOPT_POST, 1);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


            $content = curl_exec($handle);

            $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            if ($code == 200 && !(curl_errno($handle))) {
                curl_close($handle);
                $sslcommerzResponse = $content;
            } else {
                curl_close($handle);
                echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
                exit;
            }

            # PARSE THE JSON RESPONSE
            $sslcz = json_decode($sslcommerzResponse, true);

            if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
                # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
                # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
                echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
                # header("Location: ". $sslcz['GatewayPageURL']);
                exit;
            } else {
                echo "JSON Data parsing error!";
            }
        } else {
            return redirect()->route('checkout')->with('success', $msg);
        }
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

    public function cartPaymentSuccess(Request $request)
    {
        // return $request->all();
        $transaction = Transaction::create(array_merge($request->all(), ['name' => $request->value_a, 'email' => $request->value_b, 'phone' => $request->value_c, 'address' => $request->value_d]));

        Session::flash('success', 'Payment Successful. We will contact you soon.');
        return redirect()->route('checkout');
    }


    public function cartPaymentFail()
    {
        Session::flash('error', 'Payment Fail.');
        return redirect()->route('checkout');
    }
    public function cartPaymentCancel()
    {
        Session::flash('error', 'Payment Cancel.');
        return redirect()->route('checkout');
    }
}
