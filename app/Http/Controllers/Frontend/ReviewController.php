<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:65535',
            'rating' => 'required|integer|max:5|min:0',
            'product_id'=>'required|integer'
        ]);
        Review::create($request->all());
        return back()->with('success', 'Review Added!');
    }
}
