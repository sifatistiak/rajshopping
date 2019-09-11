<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories', compact('categories'));
    }

    public function addCategoryView()
    {
        return view('admin.add_category');
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|max:255'
        ]);

        Category::create($request->all());
        return back()->with('success', 'Category created successful.');
    }

    public function deleteCategory($id)
    {
        try {
            Category::findOrFail($id)->delete();
            return back()->with('success', 'Category deleted successful.');
        } catch (Exception $e) {
            return back()->with('error', 'Something wrong! Foreign key constraint violation.');
        }
    }
}
