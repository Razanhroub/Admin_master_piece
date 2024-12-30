<?php

namespace App\Http\Controllers\UserAuth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('user.userlogin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        // dd($request->all());
        // Authenticate the user
        $request->authenticate('user');
        
    
        // Regenerate the session
        $request->session()->regenerate();
    
        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            // Store the username and user ID in the session
            session(['username' => $user->name]);
            session(['user_id' => $user->id]);
    
            // dd($user->name, $user->id);
        } else {
            // Handle the case where the user is not found
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }
        
        // Redirect to the user home page
        return redirect()->route('userhome');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.userlogin');
    }
}
