<?php

namespace App\Http\Controllers;
use App\Models\User;



class ThemeController extends Controller
{
    public function appcalendar(){
        // return view for the calendar after the route "when clicking on the calendar"
        return view("theme.app-calendar");
    }
    
    public function appprofile(){
        // return view for the profile after the route "when clicking on the profile"
        return view("theme.app-profile");
    }
    
    public function chartmorris(){
        // return view for the Morris chart after the route
        return view("theme.chart-morris");
    }

    public function formvalidation(){
        // return view for the form validation after the route
        return view("theme.form-validation");
    }
    
    public function home(){
        // return view for the home page after the route
        return view("theme.home");
    }
    
    public function pageerror400(){
        // return view for the 400 error page after the route
        return view("theme.page-error-400");
    }
    
    public function pageerror403(){
        // return view for the 403 error page after the route
        return view("theme.page-error-403");
    }
    
    public function pageerror404(){
        // return view for the 404 error page after the route
        return view("theme.page-error-404");
    }
    
    public function pageerror500(){
        // return view for the 500 error page after the route
        return view("theme.page-error-500");
    }
    
    public function pageerror503(){
        // return view for the 503 error page after the route
        return view("theme.page-error-503");
    }
    
    public function pagelock(){
        // return view for the lock screen page after the route
        return view("theme.page-lock");
    }
    
    public function tablebasic(){
        // return view for the basic table after the route
        return view("theme.table-basic");
    }
    
    // public function tabledatatable(){
// read records 
        // $data = User::find(1);
        // $data = User::where('name', '=', 'razan')->get();
        // $data = User::where('name', '=', 'razan')->first();

//create recrd on db
        // User::create([
        // 'name' => 'razan',
        // 'email' => 'razan@example.com',
        // 'password' => 'hello',
        // 'birth_of_date'=> '2017-01-10',
        // 'address' => 'amman',
        // 'phone_number' => '0785588120',
        // 'last_name' => 'alhroub',
        // 'is_deleted' =>'0'
        // ]);
        // dd('created successfully');

//update record on db
        // $user = User::find(3);
        // $user->update([
        //     'last_name' => 'alhroubbbbbb',
        // ]);
        // dd('updated successfully');
//delete record on db
    //     $user = User::find(3)->delete();
    //     dd('deleted successfully');

    //     return view("theme.table-datatable");
    // }
    public function ucsweetalert(){
        // return view for the SweetAlert component after the route
        return view("theme.uc-sweetalert");
    }
    public function master(){
        // return view for the SweetAlert component after the route
        return view("theme.master");
    }
    
   
}
