<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Support\Facades\DB;



class ThemeController extends Controller
{




    public function chartmorris()
    {
        // return view for the Morris chart after the route
        return view("theme.chart-morris");
    }

    public function home()
    {
        $totalUsers = User::count();
        $totalRecipes = Recipe::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $usersPerCountry = User::select(DB::raw('count(*) as user_count, address'))
            ->groupBy('address')
            ->get();
        $recentUsers = User::orderBy('created_at', 'desc')->take(10)->get();
    
        // Fetch the most active users based on blog postings
        $mostActiveUsers = Blog::select('user_id', DB::raw('count(*) as blog_count'))
            ->groupBy('user_id')
            ->orderBy('blog_count', 'desc')
            ->take(3)
            ->get();
    
        // Fetch user details for the most active users
        $mostActiveUsersDetails = User::whereIn('id', $mostActiveUsers->pluck('user_id'))->get();
    
        // Fetch the top 3 most liked blogs
        $topLikedBlogs = DB::table('likes')
            ->select('blog_id', DB::raw('count(*) as like_count'))
            ->whereNotNull('blog_id')
            ->groupBy('blog_id')
            ->orderBy('like_count', 'desc')
            ->take(3)
            ->get();
    
        // Get the blog details along with the associated recipe names
        $topLikedBlogDetails = $topLikedBlogs->map(function ($like) {
            $blog = Blog::find($like->blog_id);
            $recipe = Recipe::find($blog->recipe_id);
            return [
                'blog_id' => $blog->blog_id,
                'like_count' => $like->like_count,
                'recipe_name' => $recipe->recipe_name,
            ];
        });
    
        return view('theme.home', compact(
            'totalUsers', 
            'totalRecipes', 
            'totalCategories', 
            'totalBlogs', 
            'usersPerCountry', 
            'recentUsers', 
            'mostActiveUsers', 
            'mostActiveUsersDetails', 
            'topLikedBlogDetails'
        ));
    }

    public function pageerror400()
    {
        // return view for the 400 error page after the route
        return view("theme.page-error-400");
    }

    public function pageerror403()
    {
        // return view for the 403 error page after the route
        return view("theme.page-error-403");
    }

    public function pageerror404()
    {
        // return view for the 404 error page after the route
        return view("theme.page-error-404");
    }

    public function pageerror500()
    {
        // return view for the 500 error page after the route
        return view("theme.page-error-500");
    }

    public function pageerror503()
    {
        // return view for the 503 error page after the route
        return view("theme.page-error-503");
    }





    public function master()
    {
        // return view for the SweetAlert component after the route
        return view("theme.master");
    }
}
