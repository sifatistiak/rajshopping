<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_identity','product_id','quantity','status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
