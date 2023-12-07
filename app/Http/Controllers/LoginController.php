<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Display the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Process the login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }

        // Authentication failed...
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
