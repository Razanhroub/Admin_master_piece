<?php
namespace App\Http\Controllers\Tables;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('theme.recipes-table');
    }
    public function showRecipeDetails($id) {
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
