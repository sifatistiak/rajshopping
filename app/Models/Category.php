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
        return $this->hasMany(Product::class)->select('id','title', 'desc', 'category_id', 'price', 'quantity','discount','status')->with('reviews')->with('displayImage')->where('status', 1)->orderBy('created_at','desc');
    }

    public function eightProducts()
    {
        return $this->hasMany(Product::class)->select('id','title', 'desc', 'category_id', 'price', 'quantity', 'status')->with('reviews')->with('displayImage')->where('status', 1)->orderBy('created_at','desc')->limit(8);
    }

    public function mypath()
    {
        return route('category.products',[$this->id, $this->title]);
        // return route('category.products',[$this->id, preg_replace("/[\s_]/", "-", $this->title)]);
    }
    // protected $dispatchesEvents;

    public function searchProducts($term)
    {
        return $this->hasMany(Product::class)->where('title', $term);
    }
}
