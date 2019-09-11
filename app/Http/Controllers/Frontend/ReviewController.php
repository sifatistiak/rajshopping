<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string|max:65535',
            'rating' => 'required|integer|max:5|min:1',
            'product_id'=>'required|integer'
        ]);
        $review = new Review();
        $review->name = Auth::user()->name;
        $review->email = Auth::user()->email;
        $review->message = $request->message;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->status = 1;
        $review->save();
        return back()->with('success', 'Review Added!');
    }
}
