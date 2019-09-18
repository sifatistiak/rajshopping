<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'desc', 'category_id', 'price', 'quantity', 'status'];
    // protected $timestamp = False;
    // public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function displayImage()
    {
        return $this->hasOne(ProductImage::class)->where('display_image_status', '1');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status',1);
    }

//     public function getUpdatedAtAttribute($value)
// {
//     // to Disable updated_at
// }
}
