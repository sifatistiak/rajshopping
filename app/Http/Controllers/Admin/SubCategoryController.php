<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function subCategories()
    {
        $subcategories = SubCategory::withCount('products')->orderBy('priority', 'desc')->get();
        $categories = Category::all();
        return view('admin.subcategories', compact('subcategories', 'categories'));
    }

    public function deletedSubCategories()
    {
        $deletedsubCategories = SubCategory::onlyTrashed()->get();
        return view('admin.deleted_sub-categories', compact('deletedsubCategories'));
    }

    public function addSubCategoryView()
    {
        $categories = Category::all();
        return view('admin.add_sub-category', compact('categories'));
    }


    public function addSubCategory(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'string|required|max:255',
            'priority' => 'required|integer'
        ]);

        SubCategory::create($request->all());
        return back()->with('success', 'SubCategory created successful.');
    }
    public function editSubCategoryView($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_sub-category', compact('subcategory', 'categories'));
    }

    public function editSubCategory(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'string|required|max:255',
            'priority' => 'required|integer'
        ]);

        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->priority = $request->priority;
        $subcategory->save();
        return back()->with('success', 'SubCategory Update successful.');
    }

    public function deleteSubCategory($id)
    {
        try {
            $subcategory = SubCategory::findOrFail($id);
            $products = Product::where('sub_category_id', $id)->get();

            foreach ($products as $product) {
                $product->delete();
            }
            $subcategory->delete();
            return back()->with('success', 'Sub Category and Products are also soft deleted.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.Product Exist.');
        }
    }
    public function restoreSubCategory($id)
    {
        try {
            $subcategory = SubCategory::withTrashed()->where('id', $id)->first();
            $products = Product::where('sub_category_id', $id)->withTrashed()->get();

            foreach ($products as $product) {
                $product->restore();
            }

            $subcategory->restore();
            return back()->with('success', 'Category and Products are Restore successfully.');
        } catch (Exception $e) {
            // echo $e;
            return back()->with('error', 'Something wrong!');
        }
    }
    public function forceDeleteSubCategory($id)
    {
        try {
            $subcategory = SubCategory::withTrashed()->where('id', $id)->first();
            $subcategory->forceDelete();
            return back()->with('success', 'Sub Category deleted successful.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.Product Exist.');
        }
    }
}
