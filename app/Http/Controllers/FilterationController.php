<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FilterationController extends Controller
{
    public function showRecipesByCategory(Request $request)
{
    $categoryId = $request->query('category');
    $subcategoryId = $request->query('subcategory');

    // Validate Category ID
    if (!$categoryId) {
        return redirect()->back()->withErrors('Category ID is required.');
    }

    $categories = Category::all();
    $subcategories = Subcategory::where('category_id', $categoryId)->get();

    $recipesQuery = Recipe::join('subcategories', 'recipes.sub_category_id', '=', 'subcategories.subcategory_id')
        ->join('categories', 'subcategories.category_id', '=', 'categories.category_id')
        ->where('categories.category_id', $categoryId)
        ->where('recipes.is_deleted', 0)
        ->where('subcategories.is_deleted', 0)
        ->where('categories.is_deleted', 0);

    // Filter by Subcategory if provided
    if ($subcategoryId) {
        $recipesQuery->where('recipes.sub_category_id', $subcategoryId);
    }
    
    $recipes = $recipesQuery->select(
        'recipes.recipe_id',
        'recipes.blog_id',
        'recipes.sub_category_id',
        'recipes.recipe_name',
        'recipes.instructions',
        'recipes.created_at as recipe_created_at',
        'recipes.updated_at as recipe_updated_at',
        'subcategories.sub_category_name as sub_category_name',
        'categories.category_name as category_name'
    )->get();
    // Return AJAX Response
    if ($request->ajax()) {
        return response()->json([
            'status' => 'success',
            'recipes' => $recipes,
        ]);
    }

    // Render View
    return view('UserSideTheme.pages.menu', compact('categories', 'subcategories', 'recipes', 'categoryId', 'subcategoryId'));
}
public function filterRecipesBySubcategory(Request $request) {
    $subcategoryId = $request->query('subcategory');

    $categoryId = $request->query('category');

    $recipes = Recipe::where('subcategories.is_deleted', 0)
        ->where('recipes.is_deleted', 0)
        ->join('subcategories', 'subcategories.subcategory_id', '=', 'recipes.sub_category_id')
        ->where('subcategories.category_id', $categoryId);
    if (!empty($subcategoryId)) {
        $recipes = $recipes->where('recipes.sub_category_id', $subcategoryId);
    }
    $recipes = $recipes->get();

    return response()->json([
        'status' => 'success',
        'recipes' => $recipes,
    ]);
}
    public function getSubcategories(Request $request)
    {
        $categoryId = $request->query('category');
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
    
        return response()->json([
            'status' => 'success',
            'subcategories' => $subcategories,
        ]);
    }
}
