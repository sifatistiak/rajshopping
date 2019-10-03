<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','priority'];
    
    public function products()
    {
        return $this->hasMany(Product::class)->select('id','title', 'desc', 'category_id', 'price', 'quantity', 'status')->with('reviews')->with('displayImage')->where('status', 1)->orderBy('created_at','desc');
    }

    // protected $dispatchesEvents;

    public function searchProducts($term)
    {
        return $this->hasMany(Product::class)->where('title', $term);
    }
}
