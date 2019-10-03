<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        cache()->forget('categories');
        Cache::rememberForever('categories', function () {
            return	Category::orderBy('priority', 'desc')->get();
        });
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::select('name', 'id')->with('products')->orderBy('priority', 'desc')->get();
        });
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        cache()->forget('categories');
        Cache::rememberForever('categories', function () {
            return	Category::orderBy('priority', 'desc')->get();
        });
        
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::select('name', 'id')->with('products')->orderBy('priority', 'desc')->get();
        });
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        cache()->forget('categories');
        Cache::rememberForever('categories', function () {
            return	Category::orderBy('priority', 'desc')->get();
        });
        
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::select('name', 'id')->with('products')->orderBy('priority', 'desc')->get();
        });
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
