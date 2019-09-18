<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
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
        $products = Product::with('category','displayImage')->orderBy('category_id')->get();
        return view('admin.products', compact('products'));
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
            'price' => 'integer|required|min:1',
            'quantity' => 'integer|required|min:1',
            'image' => 'image',
            'display_image' => 'required|image',
        ]);

        $product = Product::create($request->all());


        // Single display image save
        if ($request->hasFile('display_image')) {
            $img = $request->file('display_image');
            $displayImageName = rand() . '.' . $img->getClientOriginalExtension();
            Image::make($request->file('display_image'))->resize(500, 700)->save('product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(1000, 1200)->save('main_product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(300, 300)->save('thumb_product_images/' . $displayImageName);
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
                    $imageName = rand() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(500, 700)->save('product_images/' . $imageName);
                    Image::make($image)->resize(1000, 1200)->save('main_product_images/' . $imageName);
                    Image::make($image)->resize(300, 300)->save('thumb_product_images/' . $imageName);


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
        $productImages = ProductImage::where('product_id', $id)->where('display_image_status', 0)->get();
        $displayImage = ProductImage::where('product_id', $id)->where('display_image_status', 1)->first();
        return view('admin.edit_product', compact('product', 'categories', 'productImages', 'displayImage'));
    }

    public function editProduct(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string|required|max:255',
            'desc' => 'string|required|max:65535',
            'category_id' => 'integer|required',
            'price' => 'integer|required|min:1',
            'quantity' => 'integer|required|min:0',
            'image' => 'image',
            'display_image' => 'image',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        //display image update
        if ($request->hasFile('display_image')) {
            $productDisplayImage = ProductImage::where('product_id', $id)->where('display_image_status', 1)->first();
            $img = $request->file('display_image');
            $displayImageName = rand() . '.' . $img->getClientOriginalExtension();

            Image::make($request->file('display_image'))->resize(500, 700)->save('product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(1000, 1200)->save('main_product_images/' . $displayImageName);
            Image::make($request->file('display_image'))->resize(300, 300)->save('thumb_product_images/' . $displayImageName);

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
                    $imageName = rand() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(500, 700)->save('product_images/' . $imageName);
                    Image::make($image)->resize(1000, 1200)->save('main_product_images/' . $imageName);
                    Image::make($image)->resize(300, 300)->save('thumb_product_images/' . $imageName);

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
        $cart = Cart::where('product_id', $id)->where('hand_over', 0)->first();

        if ($cart) {
            return back()->with('error', 'Cannot Delete Product.Cart exist.');
        } else {
            $product = Product::findOrFail($id);
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
            $product->delete();

            return back()->with('success', 'Product deleted successful.');
        }
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
        $products = Product::where('category_id',$categoryId)->with('displayImage','category')->orderBy('created_at','desc')->get();
        return view('admin.product_by_category', compact('categories','categoryId','products'));
    }
}
