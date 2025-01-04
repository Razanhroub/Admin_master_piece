<?php

namespace App\Http\Controllers\Tables;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::with('ingredients', 'subcategory.category')->where('is_deleted', 0)->get();
        $categories = Category::where('is_deleted', 0)->get();
        $subcategories = Subcategory::where('is_deleted', 0)->get();

        return view('theme.recipes-table', compact('recipes', 'categories', 'subcategories'));
    }
    public function showRecipeDetails($id)
    {
        // Fetch the recipe details
        $recipe = Recipe::where('recipe_id', $id)
            ->where('is_deleted', 0)
            ->first();

        // Fetch the ingredients for the recipe
        $ingredients = Ingredient::where('recipe_id', $id)
            ->where('is_deleted', 0)
            ->select('ingredient_name')
            ->get();
        // dd($ingredients , $recipe);
        return view('UserSideTheme.pages.recipedetails', compact('recipe', 'ingredients'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_img' => 'required|image',
            'oven_heat' => 'required|integer',
            'ppl_number' => 'required|integer',
            'calories' => 'required|integer',
            'instructions' => 'required|string',
            'ingredients' => 'required|string',
            'sub_category_id' => 'required|exists:subcategories,subcategory_id',
        ]);

        $recipe = new Recipe();
        $recipe->recipe_name = $request->recipe_name;
        $recipe->sub_category_id = $request->sub_category_id;
        $recipe->oven_heat = $request->oven_heat;
        $recipe->ppl_number = $request->ppl_number;
        $recipe->calories = $request->calories;
        $recipe->instructions = $request->instructions;

        if ($request->hasFile('recipe_img')) {
            $image = $request->file('recipe_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Userassets/images/recipes'), $imageName);
            $recipe->recipe_img = $imageName;
        }

        $recipe->save();

        $ingredients = explode(',', $request->ingredients);
        foreach ($ingredients as $ingredientName) {
            $ingredient = new Ingredient();
            $ingredient->ingredient_name = trim($ingredientName);
            $ingredient->recipe_id = $recipe->recipe_id;
            $ingredient->save();
        }

        return redirect()->route('recipes-table.index')->with('success', 'Recipe added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_img' => 'image',
            'oven_heat' => 'required|integer',
            'ppl_number' => 'required|integer',
            'calories' => 'required|integer',
            'instructions' => 'required|string',
            'ingredients' => 'required|string',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->recipe_name = $request->recipe_name;
        $recipe->oven_heat = $request->oven_heat;
        $recipe->ppl_number = $request->ppl_number;
        $recipe->calories = $request->calories;
        $recipe->instructions = $request->instructions;

        if ($request->hasFile('recipe_img')) {
            $image = $request->file('recipe_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Userassets/images/recipes'), $imageName);
            $recipe->recipe_img = $imageName;
        }

        $recipe->save();

        Ingredient::where('recipe_id', $recipe->recipe_id)->delete();
        $ingredients = explode(',', $request->ingredients);
        foreach ($ingredients as $ingredientName) {
            $ingredient = new Ingredient();
            $ingredient->ingredient_name = trim($ingredientName);
            $ingredient->recipe_id = $recipe->recipe_id;
            $ingredient->save();
        }

        return redirect()->route('recipes-table.index')->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->is_deleted = 1;
        $recipe->save();

        return redirect()->route('recipes-table.index')->with('success', 'Recipe deleted successfully!');
    }
}