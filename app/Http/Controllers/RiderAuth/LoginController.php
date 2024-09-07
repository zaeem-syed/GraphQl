<?php

namespace App\Http\Controllers\RiderAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('rider.login'); // This is the view for the rider login
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('rider')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended(route('rider.dashboard')); // Redirect to rider dashboard after login
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('rider')->logout();
        return redirect()->route('rider.login'); // Redirect to the rider login page after logout
    }
}
