<?php

namespace App\Models;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['title', 'desc', 'category_id', 'price', 'quantity','discount', 'status'];
    use SoftDeletes;
    // protected $timestamp = False;
    // public $timestamps = false;

    // protected $dispatchesEvents = [
    //     'created' => ProductCreated::class,
    //     'updated' => ProductUpdated::class,
    //     'deleted' => ProductDeleted::class,
    // ];

    // override
    //  public function getRouteKeyName()
    // {
    //     return 'title';
    // }

    public function mypath()
    {
        // return url("/product/{$this->id}-".str_slug($this->title, '-'));
        return route('newproduct', [$this->id,str_slug($this->title, '-')]);
    }

    public function buyNow()
    {
        // return url("/product/{$this->id}-".str_slug($this->title, '-'));
        return route('buy.now', [$this->id,str_slug($this->title, '-')]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function displayImage()
    {
        return $this->hasOne(ProductImage::class)->select('id','product_id','image')->where('display_image_status', '1');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->select('id','name','message','rating','status','product_id')->where('status',1);
    }

    

//     public function getUpdatedAtAttribute($value)
// {
//     // to Disable updated_at
// }
}
