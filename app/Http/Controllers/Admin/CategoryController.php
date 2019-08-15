<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        AdminHelper::middleware($this);
    }
    
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories',compact('categories'));
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
         Category::findOrFail($id)->delete();
         return back()->with('success','Category deleted successful.');
        
    }
}
