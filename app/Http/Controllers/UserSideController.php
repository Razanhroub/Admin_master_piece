<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;

class UserSideController extends Controller{
    public function userhome() {
        $blogPostsCount = Blog::where('is_deleted', 0)->count();
        $activeUsersCount = User::where('is_deleted', 0)->count();
        $recipesCount = Recipe::where('is_deleted', 0)->count();
        $ingredientsCount = Ingredient::where('is_deleted', 0)->count();
    
        $categories = Category::where('is_deleted', 0)
            ->orderBy('category_name', 'asc')
            ->get();
    
        return view('UserSideTheme.pages.userhome', compact('blogPostsCount', 'activeUsersCount', 'recipesCount', 'ingredientsCount', 'categories'));
    }

    public function homecategories()
    {
        $categories = Category::where('is_deleted', 0)->get();
        return view('UserSideTheme.pages.home.homecategories', compact('categories'));
    }
    public function menu()
    {
        $categories = Category::where('is_deleted', 0)->get();
        return view('UserSideTheme.pages.menu');
    }
    public function blog(){
        return view('UserSideTheme.pages.blog');
        // nested view
    }
    public function contact(){
        return view('UserSideTheme.pages.contact');
        // nested view
    }
    public function about() {
        $blogPostsCount = Blog::where('is_deleted', 0)->count();
        $activeUsersCount = User::where('is_deleted', 0)->count();
        $recipesCount = Recipe::where('is_deleted', 0)->count();
        $ingredientsCount = Ingredient::where('is_deleted', 0)->count();
    
        return view('UserSideTheme.pages.about', compact('blogPostsCount', 'activeUsersCount', 'recipesCount', 'ingredientsCount'));
    }

    public function p(){
        return view('UserSideTheme.pages.p');
        // nested view
    }
    public function categories(){
        $categories = Category::where('is_deleted', 0)->get();
        // dd($categories);
        return view('UserSideTheme.pages.categories', compact('categories'));
        // nested view
    }
    public function userlogin(){
        return view('UserSideTheme.user.userlogin');
        // nested view
    }
    public function userregister(){
        return view('UserSideTheme.user.userregister');
        // nested view
    }
    public function edit_p(){

        $current_user_id = session('user_id');

        if ($current_user_id) {
            $user = User::find($current_user_id);
            // dd([
            //     'success' => 1,
            //     'name' => $user->name,
            //     'email' => $user->email,
            //     'password' => $user->password
            // ]);
            if ($user) {
                return view('UserSideTheme.pages.edit_p', [
                    'success' => 1,
                    'name' => $user->name,
                    'email' => $user->email
                ]);
            }
        } else {
            return view('UserSideTheme.pages.edit_p', [
                'success' => 0
            ]);
        }

        return view('UserSideTheme.pages.edit_p');
    }
    
}