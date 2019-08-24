<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SliderImage;
use Exception;
use Auth;
class IndexController extends Controller
{
    public function index()
    {
        $sliderImages = SliderImage::all();
        $categoryProducts = Category::with('products')->get();
        return view('frontend.index', compact('sliderImages', 'categoryProducts'));
    }

    public function products($id)
    {
        try {
            $categoryId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $category = Category::findOrFail($categoryId);
        $products = Product::where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.products', compact('products', 'category'));
    }

    public function product($id)
    {
        try {
            $productId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $product = Product::findOrFail($productId);
        return view('frontend.product_page', compact('product'));
    }

    public function search(Request $request)
    {
        $term = $request->term;
        $products = Product::where('title', 'LIKE', '%' . $term . '%')->paginate(6);

        foreach ($products as $product) {
            $result[] = $product->title;
        }

        return $result;
    }

    public function searchPage(Request $request)
    {
        $term = $request->search;
        $products = Product::where('title', 'LIKE', '%' . $term . '%')->paginate(6);
        return view('frontend.search_page',compact('products'));
    }

}
