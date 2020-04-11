<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Review;
use App\Models\SliderImage;
use Exception;
use Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        // Artisan::call('down');
        $sliderImages = SliderImage::select('image')->where('type', 'slider')->orderBy('created_at', 'desc')->get();
        // $threeCollections = SliderImage::select('image')->where('type', 'collection')->orderBy('created_at', 'desc')->take(3)->get();
        // $twoCollections = SliderImage::select('image')->where('type', 'collection')->orderBy('created_at', 'desc')->limit(1)->get();
        $right = SliderImage::select('image')->where('type', 'Right')->first();
        $left = SliderImage::select('image')->where('type', 'Left')->first();
        $pop_up = SliderImage::select('image')->where('type', 'Pop_Up')->first();
        $discount = Product::max('discount');
        // cache()->forget('categoryProducts');
        // dd(cache('categoryProducts'));
        // $categoryProducts = Category::with('products')->orderBy('created_at', 'desc')->get();

        $categoryProducts = Category::select('name', 'id')->with('products')->orderBy('priority', 'desc')->get();
        // $allProducts = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->skip(0)->take(10)->get();
        // $all50Products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->skip(10)->take(30)->get();
        // $hotProducts = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->where('status', 1)->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->limit(10)->get();
        $groceries = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->where('category_id', 1)->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->limit(10)->get();
        $home = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->where('category_id', 2)->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->limit(10)->get();
        $fruits = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->where('category_id', 3)->with('reviews', 'displayImage')->orderBy('updated_at', 'desc')->limit(10)->get();

        // return $categoryProducts;
        return view('frontend.index', compact('sliderImages', 'categoryProducts', 'groceries', 'home', 'fruits', 'pop_up', 'left', 'right', 'discount'));
    }


    public function shop()
    {
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'discount', 'status')->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(24);
        return view('frontend.shop', compact('products'));
    }


    public function products($id)
    {
        try {
            $categoryId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $category = Category::findOrFail($categoryId);
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $categoryId)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.products', compact('products', 'category'));
    }
    public function categoryProducts(Category $category)
    {
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $category->id)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.products', compact('products', 'category'));
    }
    public function subCategoryProducts(SubCategory $subcategory)
    {
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('sub_category_id', $subcategory->id)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.subproducts', compact('products', 'subcategory'));
    }

    public function sortByPrice(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'filter' => 'required|integer'
        ]);
        $filter = $request->filter;
        if ($request->category_id) {
            $categoryId = $request->category_id;
            $category = Category::findOrFail($categoryId);
            if ($filter == 1) {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $categoryId)->orderBy('price', 'desc')->get();
            } else {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $categoryId)->orderBy('price', 'asc')->get();
            }
            return view('frontend.sort_by_price_product', compact('products', 'category', 'filter'));
        }
        else if ($request->sub_category_id) {
            $subcategoryId = $request->sub_category_id;
            $subcategory = SubCategory::findOrFail($subcategoryId);
            if ($filter == 1) {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('sub_category_id', $subcategoryId)->orderBy('price', 'desc')->get();
            } else {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('sub_category_id', $subcategoryId)->orderBy('price', 'asc')->get();
            }
            return view('frontend.sort_by_price_subproduct', compact('products', 'subcategory', 'filter'));
        }
        else {
            if ($filter == 1) {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->orderBy('price', 'desc')->get();
            } else {
                $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->orderBy('price', 'asc')->get();
            }
            return view('frontend.sort_by_price_all', compact('products', 'filter'));
        }

    }

    public function product($id)
    {
        try {
            $productId = decrypt($id);
        } catch (Exception $e) {
            return back();
        }
        $singleProduct = Product::findOrFail($productId);
        $reviews = Review::where('product_id', $singleProduct->id)->where('status', 1)->paginate(6);
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $singleProduct->category_id)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.product_page', compact('singleProduct', 'reviews', 'products'));
    }


    public function newproduct(Product $product)
    {
        $singleProduct = $product;//Product::findOrFail($productId);
        $reviews = Review::where('product_id', $singleProduct->id)->where('status', 1)->paginate(6);
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('category_id', $singleProduct->category_id)->with('reviews', 'displayImage')->orderBy('created_at', 'desc')->paginate(9);
        return view('frontend.product_page', compact('singleProduct', 'reviews', 'products'));

        // return $product ;//= Product::findOrFail($product);
    }

    public function search(Request $request)
    {
        // $term = $request->term;
        // $products = Product::select('title')->where('title', 'LIKE', '%' . $term . '%')->get();
        // foreach ($products as $product) {
        //     $result[] = $product->title;
        // }
        // return $result;

        $searchKey = $request->search_key;
        $products = Product::select('title')->where('title', 'LIKE', '%' . $searchKey . '%')->orWhere('desc', 'LIKE', '%' . $searchKey . '%')->get();

        if ($request->ajax()) {
            return response()->json($products);
        }
    }

    public function searchPage(Request $request)
    {
        $term = $request->search_key;
        $products = Product::select('id', 'title', 'desc', 'category_id', 'price', 'quantity', 'discount', 'status')->where('title', 'LIKE', '%' . $term . '%')->orWhere('desc', 'LIKE', '%' . $term . '%')->with('reviews', 'displayImage')->paginate(12);
        $categories = Category::where('name', 'LIKE', '%' . $term . '%')->get();
        $subcategories = SubCategory::where('name', 'LIKE', '%' . $term . '%')->get();
        return view('frontend.search_page', compact('products', 'categories', 'subcategories', 'term'));
    }

    public function aboutUs()
    {
        return view('frontend.about_us');
    }

    public function shipingReturn()
    {
        return view('frontend.shiping_return');
    }

    public function privacyPolicy()
    {
        return view('frontend.privacy_policy');
    }
    public function quickContact()
    {
        return view('frontend.quick_contact');
    }
}
