<?php

namespace App\Http\Controllers;

class UserSideController extends Controller{
    public function home(){
        return view('UserSideTheme.pages.home');
        // nested view
    }
    public function menu(){
        return view('UserSideTheme.pages.menu');
        // nested view
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
    public function reservation(){
        return view('UserSideTheme.pages.reservation');
        // nested view
    }
    
}