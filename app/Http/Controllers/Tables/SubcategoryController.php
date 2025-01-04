<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category', 'recipes')->where('is_deleted', 0)->get();
        $categories = Category::where('is_deleted', 0)->get();

        return view('theme.subcategories-table', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required|string|max:255|unique:subcategories,sub_category_name,NULL,id,category_id,' . $request->category_id,
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $subcategory = new Subcategory();
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return response()->json(['message' => 'Subcategory added successfully!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_category_name' => 'required|string|max:255|unique:subcategories,sub_category_name,' . $id . ',subcategory_id,category_id,' . $request->category_id,
        ]);

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->save();

        return response()->json(['message' => 'Subcategory updated successfully!']);
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->is_deleted = 1;
        $subcategory->save();

        return redirect()->route('subcategories-table.index')->with('success', 'Subcategory deleted successfully!');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return response()->json($subcategory);
    }
}