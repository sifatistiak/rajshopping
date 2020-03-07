<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Image;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function products()
    {
        $products = Product::with('category', 'subCategory', 'displayImage')->orderBy('created_at', 'desc')->get();

        return view('admin.products', compact('products'));
    }
    public function deletedProducts()
    {
        $deletedProducts = Product::onlyTrashed()->with('category', 'displayImage')->orderBy('created_at', 'desc')->get();
        return view('admin.deleted_products', compact('deletedProducts'));
    }

    public function restoreProduct($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();

        //restore the category first
        $category = Category::withTrashed()->where('id', $product->category_id)->first();
        if ($category->trashed()) {
            return back()->with('error', 'Restore the category first. Category is '.$category->name);
        }else{
            $product->restore();
            return back()->with('success', 'Product Restore successful.');
        }


    }

    public function forceDeleteProduct($id)
    {
        $cart = Cart::where('product_id', $id)->where('hand_over', 0)->first();

        if ($cart) {
            return back()->with('error', 'Cannot Delete Product.Cart exist.');
        } else {
            $product = Product::withTrashed()->where('id', $id)->first();
            $productImages = ProductImage::where('product_id', $id)->get();
            foreach ($productImages as $productImage) {
                if (File::exists('product_images/' . $productImage->image)) {
                    File::delete('product_images/' . $productImage->image);
                }
                if (File::exists('main_product_images/' . $productImage->image)) {
                    File::delete('main_product_images/' . $productImage->image);
                }
                if (File::exists('thumb_product_images/' . $productImage->image)) {
                    File::delete('thumb_product_images/' . $productImage->image);
                }
                $productImage->delete();
            }
            $product->forceDelete();

            return back()->with('success', 'Product deleted successful.');
        }
    }
    public function addProductView()
    {
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }

    public function addProduct(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required|max:255',
            'desc' => 'string|required|max:65535',
            'category_id' => 'integer|required',
            'sub_category_id' => 'integer|required',
            'price' => 'integer|required|min:1',
            'quantity' => 'integer|required|min:1',
            'status' => 'integer|required',
            'discount' => 'integer|required',
            'image' => 'image',
            'display_image' => 'required|image',
        ]);

        $product = Product::create($request->all());


        // Single display image save
        if ($request->hasFile('display_image')) {
            $img = $request->file('display_image');
            $displayImageName = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($request->file('display_image'))->resize(500, 700)->save('product_images/' . $displayImageName,30);
            Image::make($request->file('display_image'))->resize(1000, 1200)->save('main_product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(300, 300)->save('thumb_product_images/' . $displayImageName,30);
        }
        $productImage = new ProductImage();
        $productImage->product_id = $product->id;
        $productImage->image = $displayImageName;
        $productImage->display_image_status = 1;
        $productImage->save();

        //multiple image save
        if (is_array($request->images)) {
            if (count($request->images) > 0) {
                foreach ($request->images as $image) {
                    $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(500, 700)->save('product_images/' . $imageName,30);
                    Image::make($image)->resize(1000, 1200)->save('main_product_images/' . $imageName);
                    Image::make($image)->resize(300, 300)->save('thumb_product_images/' . $imageName,30);


                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $imageName;
                    $productImage->save();
                }
            }
        }
        return back()->with('success', 'Product created successful.');
    }

    public function editProductView($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();
        $productImages = ProductImage::where('product_id', $id)->where('display_image_status', 0)->get();
        $displayImage = ProductImage::where('product_id', $id)->where('display_image_status', 1)->first();
        return view('admin.edit_product', compact('product', 'categories', 'subcategories', 'productImages', 'displayImage'));
    }

    public function editProduct(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string|required|max:255',
            'desc' => 'string|required|max:65535',
            'category_id' => 'integer|required',
            'sub_category_id' => 'integer|required',
            'price' => 'integer|required|min:1',
            'quantity' => 'integer|required|min:0',
            'status' => 'integer|required',
            'discount' => 'integer|required',
            'image' => 'image',
            'display_image' => 'image',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        //display image update
        if ($request->hasFile('display_image')) {
            $productDisplayImage = ProductImage::where('product_id', $id)->where('display_image_status', 1)->first();
            $img = $request->file('display_image');
            $displayImageName = uniqid() . '.' . $img->getClientOriginalExtension();

            Image::make($request->file('display_image'))->resize(500, 700)->save('product_images/' . $displayImageName,30);
            Image::make($request->file('display_image'))->resize(1000, 1200)->save('main_product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(300, 300)->save('thumb_product_images/' . $displayImageName,30);

            if (File::exists('product_images/' . $productDisplayImage->image)) {
                File::delete('product_images/' . $productDisplayImage->image);
            }
            if (File::exists('main_product_images/' . $productDisplayImage->image)) {
                File::delete('main_product_images/' . $productDisplayImage->image);
            }
            if (File::exists('thumb_product_images/' . $productDisplayImage->image)) {
                File::delete('thumb_product_images/' . $productDisplayImage->image);
            }

            $productDisplayImage->product_id = $product->id;
            $productDisplayImage->image = $displayImageName;
            $productDisplayImage->display_image_status = 1;
            $productDisplayImage->save();
        }

        //images update

        if (is_array($request->images)) {
            if (count($request->images) > 0) {
                $productImages = ProductImage::where('product_id', $id)->where('display_image_status', 0)->get();
                //delete previous images
                foreach ($productImages as $productImage) {
                    if (File::exists('product_images/' . $productImage->image)) {
                        File::delete('product_images/' . $productImage->image);
                    }
                    if (File::exists('main_product_images/' . $productImage->image)) {
                        File::delete('main_product_images/' . $productImage->image);
                    }
                    if (File::exists('thumb_product_images/' . $productImage->image)) {
                        File::delete('thumb_product_images/' . $productImage->image);
                    }
                    $productImage->delete();
                }
                //add new images
                foreach ($request->images as $image) {
                    $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(500, 700)->save('product_images/' . $imageName,30);
                    Image::make($image)->resize(1000, 1200)->save('main_product_images/' . $imageName);
                    Image::make($image)->resize(300, 300)->save('thumb_product_images/' . $imageName,30);

                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image = $imageName;
                    $productImage->save();
                }
            }
        }

        return back()->with('success', 'Product update successful.');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product is soft deleted.');
    }

    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        $productImages = ProductImage::where('product_id', $id)->where('display_image_status', 0)->get();
        $displayImage = ProductImage::where('product_id', $id)->where('display_image_status', 1)->first();
        return view('admin.view_product', compact('product', 'productImages', 'displayImage'));
    }

    public function productByCategory(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->category_id;
        $category = Category::where('id',$categoryId)->first();
        $products = Product::where('category_id', $categoryId)->with('displayImage', 'category')->orderBy('created_at', 'desc')->get();
        return view('admin.product_by_category', compact('category','categories', 'categoryId', 'products'));
    }

    public function productBySubCategory(Request $request)
    {
        // return $request;
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $categoryId = $request->category_id;
        $subcategoryId = $request->sub_category_id;
        $category = Category::where('id',$categoryId)->first();
        $subcategory = SubCategory::where('id',$subcategoryId)->first();
        $products = Product::where('sub_category_id', $subcategoryId)->where('category_id', $categoryId)->with('displayImage', 'category')->orderBy('created_at', 'desc')->get();
        return view('admin.product_by_subcategory', compact('category', 'subcategory', 'categories', 'subcategories', 'categoryId', 'subcategoryId', 'products'));
    }
}
