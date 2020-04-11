<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id','name','priority'];

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
        return route('subcategory.products',[$this->id, preg_replace("/[\s_]/", "-", $this->name)]);
    }
    // protected $dispatchesEvents;

    public function searchProducts()
    {
        return $this->hasMany(Product::class)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id','name');
    }
}
