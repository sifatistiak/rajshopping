<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Help;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function index()
    {
        $numberOfProduct = Product::count();
        $numberOfCategory = Category::count();
        $numberOfOrder = count(Cart::select('user_identity')->where('status', 0)->where('hand_over', 0)->groupBy('user_identity')->get());
        
        $numberOfCompleteOrder = 0;

        $orderCarts = Cart::select('user_identity')->where('status', 0)->where('hand_over', 1)->groupBy('user_identity')->get();

        foreach($orderCarts as $orderCart){
            $userIdentity = $orderCart->address($orderCart->user_identity);
            $numberOfCompleteOrder += $userIdentity->order_count;
        }
        return view('admin.index', compact('numberOfProduct', 'numberOfCategory', 'numberOfOrder','numberOfCompleteOrder'));
    }

   

    public function changePasswordView()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $admin = Admin::find(Auth::id());
        if (Hash::check($request->oldpassword, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return back()->with('success', 'Password Change Successful.');
        } else {
            return back()->with('error', 'Password Mismatch.');
        }
    }
}
