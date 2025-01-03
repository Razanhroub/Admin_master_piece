<?php
namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class FilterationController extends Controller
{
    public function showRecipesByCategory(Request $request)
    {
        $categoryId = $request->query('category');
        $subcategoryId = $request->query('subcategory');
        $searchTerm = $request->query('search');
        $ingredientSearchTerm = $request->query('ingredient');

        $categories = Category::all();
        $subcategories = $categoryId ? Subcategory::where('category_id', $categoryId)->get() : [];

        $recipesQuery = Recipe::join('subcategories', 'recipes.sub_category_id', '=', 'subcategories.subcategory_id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.category_id')
            ->where('recipes.is_deleted', 0)
            ->where('subcategories.is_deleted', 0)
            ->where('categories.is_deleted', 0);

        if ($categoryId) {
            $recipesQuery->where('categories.category_id', $categoryId);
        }

        if ($subcategoryId) {
            $recipesQuery->where('recipes.sub_category_id', $subcategoryId);
        }

        if ($searchTerm) {
            $recipesQuery->where('recipes.recipe_name', 'like', '%' . $searchTerm . '%');
        }

        if ($ingredientSearchTerm) {
            $ingredients = explode(',', $ingredientSearchTerm);
            foreach ($ingredients as $ingredient) {
                $recipesQuery->whereIn('recipes.recipe_id', function ($query) use ($ingredient) {
                    $query->select('recipe_id')
                        ->from('ingredients')
                        ->where('ingredient_name', 'like', '%' . $ingredient . '%')
                        ->where('is_deleted', 0);
                });
            }
        }

        $recipes = $recipesQuery->select(
            'recipes.recipe_id',
            'recipes.sub_category_id',
            'recipes.role',
            'recipes.recipe_name',
            'recipes.instructions',
            'recipes.created_at as recipe_created_at',
            'recipes.updated_at as recipe_updated_at',
            'recipes.recipe_img',
            'recipes.calories',
            'recipes.ppl_number',
            'recipes.oven_heat',
            'recipes.recipe_time',
            'subcategories.sub_category_name as sub_category_name',
            'categories.category_name as category_name'
        )->orderBy('recipes.recipe_name', 'asc')->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'recipes' => $recipes,
            ]);
        }

        return view('UserSideTheme.pages.menu', compact('categories', 'subcategories', 'recipes', 'categoryId', 'subcategoryId'));
    }

    public function filterRecipesBySubcategory(Request $request)
    {
        $subcategoryId = $request->query('subcategory');
        $categoryId = $request->query('category');
        $searchTerm = $request->query('search');
        $ingredientSearchTerm = $request->query('ingredient');

        $recipesQuery = Recipe::where('subcategories.is_deleted', 0)
            ->where('recipes.is_deleted', 0)
            ->join('subcategories', 'subcategories.subcategory_id', '=', 'recipes.sub_category_id')
            ->join('categories', 'subcategories.category_id', '=', 'categories.category_id');

        if ($categoryId) {
            $recipesQuery->where('categories.category_id', $categoryId);
        }

        if ($subcategoryId) {
            $recipesQuery->where('recipes.sub_category_id', $subcategoryId);
        }

        if ($searchTerm) {
            $recipesQuery->where('recipes.recipe_name', 'like', '%' . $searchTerm . '%');
        }

        if ($ingredientSearchTerm) {
            $ingredients = explode(',', $ingredientSearchTerm);
            foreach ($ingredients as $ingredient) {
                $recipesQuery->whereIn('recipes.recipe_id', function ($query) use ($ingredient) {
                    $query->select('recipe_id')
                        ->from('ingredients')
                        ->where('ingredient_name', 'like', '%' . $ingredient . '%')
                        ->where('is_deleted', 0);
                });
            }
        }

        $recipes = $recipesQuery->select(
            'recipes.recipe_id',
            'recipes.sub_category_id',
            'recipes.role',
            'recipes.recipe_name',
            'recipes.instructions',
            'recipes.recipe_img',
            'recipes.calories',
            'recipes.ppl_number',
            'recipes.oven_heat',
            'recipes.recipe_time',
            'recipes.created_at',
            'recipes.updated_at'
        )->orderBy('recipes.recipe_name', 'asc')->get();

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