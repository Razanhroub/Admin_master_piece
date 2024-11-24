<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

use App\Models\Subcategory;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch categories with their associated subcategories
        $categories = Category::with('subcategories')  // Eager load subcategories
            ->where('is_deleted', 0)
            ->get();
        
        // Fetch active subcategories and recipes
        $subcategories = Subcategory::where('is_deleted', 0)->get();
        $recipes = Recipe::where('is_deleted', 0)->get();
        // dd(count($subcategories));
    // dd($recipes);
        // Return the view with the data
        return view('theme.categories-table', compact('categories', 'subcategories', 'recipes'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for image
        ]);

        if ($request->hasFile('category_image')) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('assets/images/category'), $imageName);
            $validated['category_image'] = $imageName;
        }

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for image
        ]);

        if ($request->hasFile('category_image')) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('assets/images/category'), $imageName);
            $validated['category_image'] = $imageName;
        }

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }
}
