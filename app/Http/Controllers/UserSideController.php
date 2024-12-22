<?php

namespace App\Http\Controllers;
use App\Models\Category;
class UserSideController extends Controller{
    public function userhome()
    {
        $categories = Category::where('is_deleted', 0)->get();
        // dd($categories);
        return view('UserSideTheme.pages.userhome', compact('categories'));
    }

    public function homecategories()
    {
        $categories = Category::where('is_deleted', 0)->get();
        return view('UserSideTheme.pages.menu', compact('categories'));
    }
    public function blog(){
        return view('UserSideTheme.pages.blog');
        // nested view
    }
    public function contact(){
        return view('UserSideTheme.pages.contact');
        // nested view
    }
    public function about(){
        return view('UserSideTheme.pages.about');
        // nested view
    }
    
}