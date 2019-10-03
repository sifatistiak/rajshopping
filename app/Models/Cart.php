<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_identity', 'product_id', 'quantity', 'status'];
    

    public function product()
    {
        return $this->belongsTo(Product::class)->with('displayImage')->withTrashed();
    }


    public function address($userIdentity)
    {
        return Address::where('user_identity', $userIdentity)->first();
    }
    public function orderProduct($userIdentity)
    {
        return Cart::where('user_identity', $userIdentity)->where('status', 0)->where('hand_over', 0)->get();
    }

    public function completeOrderProduct($userIdentity)
    {
        return Cart::where('user_identity', $userIdentity)->where('status', 0)->where('hand_over', 1)->get();
    }
}
