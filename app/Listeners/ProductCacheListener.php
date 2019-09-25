<?php

namespace App\Listeners;

use App\Models\Category;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class ProductCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // echo "before<br>";
        cache()->forget('categoryProducts');
        Cache::rememberForever('categoryProducts', function () {
            return Category::with('products')->orderBy('created_at', 'desc')->get();
        });
    }
}
