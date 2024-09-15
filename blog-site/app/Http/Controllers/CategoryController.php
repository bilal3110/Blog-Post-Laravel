<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->paginate(4);        
        $data = compact('categories');
        return view('adminpanel.categories')->with($data);
    }

    public function addCategory()
    {
        return view('adminpanel.add-category');
    }

    public function addCategoryPage(Request $request)
    {
        $request->validate([
            'name' => "required",
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('category');
    }

    public function categoryView()
    {
        $categories = Category::paginate(4);
        $data = compact('categories');
        return view('adminpanel.categories')->with($data);
    }

    public function DelCategory($cid)
    {
        $categories = Category::find($cid);
        $categories->delete();
        return redirect()->route('category');
    }

    public function updateCategory($cid)
    {
        $categories = Category::find($cid);
        $data = compact('categories');
        return view('adminpanel.update-category')->with($data);
    }

    public function editCategory($cid, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $category = Category::find($cid);
    
        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }
    
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }
    
}
