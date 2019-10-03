<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }

    public function categories()
    {
        $categories = Category::withCount('products')->orderBy('priority', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function deletedCategories()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('admin.deleted_categories', compact('deletedCategories'));
    }

    public function addCategoryView()
    {
        return view('admin.add_category');
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:255',
            'priority' => 'required|integer'
        ]);

        Category::create($request->all());
        return back()->with('success', 'Category created successful.');
    }
    public function editCategoryView($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit_category', compact('category'));
    }

    public function editCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:255',
            'priority' => 'required|integer'
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->priority = $request->priority;
        $category->save();
        return back()->with('success', 'Category Update successful.');
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $products = Product::where('category_id', $id)->get();

            foreach ($products as $product) {
                $product->delete();
            }
            $category->delete();
            return back()->with('success', 'Category and Products are also soft deleted.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.Product Exist.');
        }
    }
    public function restoreCategory($id)
    {
        try {
            $category = Category::withTrashed()->where('id', $id)->first();
            $products = Product::where('category_id', $id)->withTrashed()->get();

            foreach ($products as $product) {
                $product->restore();
            }

            $category->restore();
            return back()->with('success', 'Category and Products are Restore successfully.');
        } catch (Exception $e) {
            // echo $e;
            return back()->with('error', 'Something wrong!');
        }
    }
    public function forceDeleteCategory($id)
    {
        try {
            $category = Category::withTrashed()->where('id', $id)->first();
            $category->forceDelete();
            return back()->with('success', 'Category deleted successful.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.Product Exist.');
        }
    }
}
