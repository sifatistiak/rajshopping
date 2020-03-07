<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Exception;

class CouponController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function coupon()
    {
        $coupon = Coupon::all();
        return view('admin.coupon', compact('coupon'));
    }


    public function addCouponView()
    {
        return view('admin.add_coupon');
    }

    public function addCoupon(Request $request)
    {
        $this->validate($request, [
            'code' => 'string|required|max:255',
            'type' => 'required|integer',
            'amount' => 'required|integer'
        ]);

        Coupon::create($request->all());
        return back()->with('success', 'Coupon created successful.');
    }
    public function editCouponView($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.edit_coupon', compact('coupon'));
    }

    public function editCoupon(Request $request)
    {
        $this->validate($request, [
            'code' => 'string|required|max:255',
            'type' => 'required|integer',
            'amount' => 'required|integer'
        ]);

        $coupon = Coupon::findOrFail($request->id);
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->amount = $request->amount;
        $coupon->save();
        return back()->with('success', 'Coupon Update successful.');
    }

    public function deleteCoupon($id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();
            return back()->with('success', 'coupon deleted.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.Product Exist.');
        }
    }
}
