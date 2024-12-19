<?php

namespace App\Http\Controllers;

class UserSideController extends Controller{
    public function home(){
        return view('UserSideTheme.home');
        // nested view
    }
    public function menu(){
        return view('UserSideTheme.menu');
        // nested view
    }
    public function blog(){
        return view('UserSideTheme.blog');
        // nested view
    }
    public function contact(){
        return view('UserSideTheme.contact');
        // nested view
    }
    public function about(){
        return view('UserSideTheme.about');
        // nested view
    }
    public function reservation(){
        return view('UserSideTheme.reservation');
        // nested view
    }
    
}