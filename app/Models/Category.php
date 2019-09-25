<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class)->with('reviews')->with('displayImage')->where('status', 1)->orderBy('created_at','desc');
    }

    // protected $dispatchesEvents;

    public function searchProducts($term)
    {
        return $this->hasMany(Product::class)->where('title', $term);
    }
}
