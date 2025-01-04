<?php

namespace App\Http\Controllers\Tables;

use App\Models\Blog;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCreateBlogForm()
    {
        if (!session('user_id')) {
            // Redirect to user login page if user_id is not found
            return Redirect::to('userlogin');
        }
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
            'recipe_img' => 'nullable|image',
            'ppl_number' => 'required|integer',
            'calories' => 'required|integer',
            'oven_heat' => 'required|integer',
            'recipe_time' => 'required',
            'ingredients' => 'required|array',
            'role' => 'required',
            'youtube_link' => 'nullable|string',  // Optional YouTube iframe validation
        ]);

        // Create and save the recipe
        $recipe = new Recipe();
        $recipe->sub_category_id = $request->subcategory;
        $recipe->recipe_name = $request->recipe_name;
        $recipe->instructions = $request->instructions;



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

        // Store ingredients
        foreach ($request->ingredients as $ingredient) {
            $ingredientModel = new Ingredient();
            $ingredientModel->recipe_id = $lastRecipeId;
            $ingredientModel->ingredient_name = $ingredient;
            $ingredientModel->save();
        }

        $userId = session('user_id');

        // Create a new blog entry
        $blog = new Blog();
        $blog->user_id = $userId;
        $blog->recipe_id = $lastRecipeId;
        $blog->accepted = 1;
        $blog->created_at = now();
        $blog->updated_at = now();
        $blog->is_deleted = 0;

        // Store the iframe link if provided
        if ($request->filled('youtube_link')) {
            $blog->iframelink = $request->youtube_link;
        }

        // Save the blog entry
        $blog->save();

        return redirect()->route('blog')->with('success', 'Blog created successfully!');
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
    public function blog(Request $request)
{
    if ($request->ajax()) {
        $blogs = Blog::with(['user', 'recipe'])
            ->where('is_deleted', 0)
            ->whereHas('recipe', function ($query) {
                $query->where('is_deleted', 0);
            })
            ->whereHas('user', function ($query) {
                $query->where('is_deleted', 0);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'blogs' => $blogs,
        ]);
    }

    $blogs = Blog::with(['user', 'recipe'])
        ->where('is_deleted', 0)
        ->whereHas('recipe', function ($query) {
            $query->where('is_deleted', 0);
        })
        ->whereHas('user', function ($query) {
            $query->where('is_deleted', 0);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('UserSideTheme.pages.blog', compact('blogs'));
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
