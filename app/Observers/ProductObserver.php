<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        cache()->forget('categoryProducts');
        // Cache::rememberForever('categoryProducts', function () {
        //     return Category::with('products')->orderBy('created_at', 'desc')->get();
        // });

    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::with('products')->orderBy('created_at', 'desc')->get();
        });

    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::with('products')->orderBy('created_at', 'desc')->get();
        });

    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
