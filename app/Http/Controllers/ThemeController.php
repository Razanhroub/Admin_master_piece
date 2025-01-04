<?php

namespace App\Http\Controllers;

use App\Models\User;



class ThemeController extends Controller
{




    public function chartmorris()
    {
        // return view for the Morris chart after the route
        return view("theme.chart-morris");
    }

    public function home()
    {
        // return view for the home page after the route
        return view("theme.home");
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
