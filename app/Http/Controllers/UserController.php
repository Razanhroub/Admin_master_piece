<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('theme.table-datatable', compact('users'));
        
        //href = {{ route( table-datatable.create) }} in front
        // read records 
        // $data = User::find(1);
        // $data = User::where('name', '=', 'razan')->get();
        // $data = User::where('name', '=', 'razan')->first();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //returns view 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // when i want to edit sth it shows it to me when when i change data > it sends it to the update
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect back with a success message
    return redirect()->route('table-datatable.index')->with('success', 'User deleted successfully!');
    }
}
