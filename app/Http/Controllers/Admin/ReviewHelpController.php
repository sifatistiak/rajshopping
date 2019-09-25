<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewHelpController extends Controller
{
     public function __construct()
    {
        AdminHelper::middleware($this);
    }

     public function helps()
    {
        $helps = Help::orderBy('created_at', 'desc')->get();
        $avarageFeedback = Help::avg('feedback');
        $avarageFeedback = round($avarageFeedback, 2);
        return view('admin.helps', compact('helps', 'avarageFeedback'));
    }

    public function reviews()
    {
        $reviews = Review::with('product')->orderBy('created_at', 'desc')->get();
        return view('admin.reviews', compact('reviews'));
    }

    public function changeReviewStatus($id){
        $review = Review::findOrFail($id);
        if($review->status == 0){
            $review->status = 1;
        }else{
            $review->status = 0;
        }
        $review->save();
        return back()->with('success','Review Status Changed.');
    }

    public function deleteReview($id)
    {
         $review = Review::findOrFail($id);
         $review->delete();
         return back()->with('success', 'Review Deleted.');


    }
}
