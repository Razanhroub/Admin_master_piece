<?php

namespace App\Http\Controllers\Tables;

use App\Models\Blog;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCreateBlogForm()
    {
        $categories = Category::all();
        return view('UserSideTheme.pages.blogs.createblog', compact('categories'));
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'recipe_name' => 'required',
            'instructions' => 'required',
            'recipe_img' => 'required|image',
            'ppl_number' => 'required|integer',
            'calories' => 'required|integer',
            'oven_heat' => 'required|integer',
            'recipe_time' => 'required',
            'ingredients' => 'required|array',
            'role' => 'required',
        ]);

        // Create and save the recipe
        $recipe = new Recipe();
        $recipe->sub_category_id = $request->subcategory;
        $recipe->recipe_name = $request->recipe_name;
        $recipe->instructions = $request->instructions;

        // Save the image to the specified directory
        $imageName = $request->file('recipe_img')->getClientOriginalName();
        $request->file('recipe_img')->move(public_path('Userassets/images/recipes'), $imageName);
        $recipe->recipe_img = $imageName; // Store the image name in the database

        $recipe->ppl_number = $request->ppl_number;
        $recipe->calories = $request->calories;
        $recipe->oven_heat = $request->oven_heat;
        $recipe->recipe_time = $request->recipe_time;
        $recipe->role = $request->role;
        $recipe->save();
        $lastRecipeId = Recipe::orderBy('recipe_id', 'desc')->value('recipe_id');


        // dd($request);

        foreach ($request->ingredients as $ingredient) {
            $ingredientModel = new Ingredient();
            $ingredientModel->recipe_id = $lastRecipeId; // Assign the newly created recipe's ID
            $ingredientModel->ingredient_name = $ingredient;
            $ingredientModel->save();
        }
        $userId = session('user_id');

        // Create a new blog entry
        $blog = new Blog();
        $blog->user_id = $userId;
        $blog->recipe_id = $lastRecipeId;
        $blog->accepted = 1; // Set accepted to 1
        $blog->created_at = now();
        $blog->updated_at = now();
        $blog->is_deleted = 0; // or 1, depending on your requirement

        // Optionally set the iframe link if available
        if (!empty($iframeLink)) {
            $blog->iframelink = $iframeLink;
        }

        // Save the blog entry
        $blog->save();

        return redirect()->route('createblog')->with('success', 'Blog created successfully!');
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
    public function index()
    {
        return view('theme.Blogs-table');
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
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
