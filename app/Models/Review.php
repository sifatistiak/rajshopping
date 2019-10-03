<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','message','rating','status','product_id'];

    public function product(){
        return $this->belongsTo(Product::class)->withTrashed();
    }
    
}
