<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller; 
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::with('subcategories')  // Eager load subcategories
            ->get();

        // dd($categories);

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
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/category'), $imageName);
            $category->category_image = $imageName;
        }

        $category->save();

        return redirect()->route('categories-table.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name,' . $id . ',category_id',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;

        if ($request->hasFile('category_image')) {
            // Delete the old image if it exists
            if ($category->category_image) {
                $oldImagePath = public_path('assets/images/category/' . $category->category_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/category'), $imageName);
            $category->category_image = $imageName;
        }

        $category->save();

        return response()->json(['message' => 'Category updated successfully.']);
    }
    public function destroy(string $id)
    {

        $category = Category::findOrFail($id);
        // dd  ($category_id);
        $category->is_deleted = 1;

        $category->save();

        // Redirect back with a success message
        return redirect()->route('categories-table.index')->with('success', 'User deleted successfully!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    
}
