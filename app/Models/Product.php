<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'desc', 'category_id', 'price', 'quantity', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
