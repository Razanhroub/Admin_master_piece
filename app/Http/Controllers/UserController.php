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
        $users = User::where('is_deleted', 0)->get(); // Fetch all users where is_deleted is 0
        return view('theme.user-table', compact('users'));


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
        // i can give the request deafult value i can use it to put a deafult value for the user image
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Password validation with specific rules
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W]).{8,}$/'
            ],
            'phone_number' => 'required|numeric|digits:14', // Use digits for exact length
            'address' => 'required|string|max:255',
            // Ensuring the user is at least 13 years old
            'birth_date' => 'required|date|before:' . now()->subYears(13)->toDateString(),
        ], [
            'birth_date.before' => 'The entered age must be at least 13 years old',
        ]);


        // Create the user record
        User::create([
            'name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'birth_date' => $validated['birth_date'],
        ]);

        // Redirect with success message
        // dd($errors);
        return redirect()->route('user-table.index')->with('success', 'User created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input fields
        $validated = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|numeric|digits:14',
            'address' => 'nullable|string|max:255',
        ]);

        // Update first_name and last_name separately if provided
        if ($validated['first_name']) {
            $user->name = $validated['first_name']; // Assuming 'name' stores first name
        }
        if ($validated['last_name']) {
            $user->last_name = $validated['last_name'];
        }

        // Update other fields if provided
        $user->email = $validated['email'] ?? $user->email;
        $user->phone_number = $validated['phone_number'] ?? $user->phone_number;
        $user->address = $validated['address'] ?? $user->address;

        // Save changes
        $user->save();

        return response()->json([
            'message' => 'User updated successfully'
        ]);
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Mark the user as deleted by setting is_deleted to 1
        $user->is_deleted = 1;
        $user->save(); // Save the changes

        // Redirect back with a success message
        return redirect()->route('user-table.index')->with('success', 'User deleted successfully!');
    }
}
