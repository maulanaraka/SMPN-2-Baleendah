<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SessionController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login process
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            return redirect()->route($this->redirectToRole($user->role));
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    // Handle logout process
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Redirect users based on role
    private function redirectToRole($role)
    {
        switch ($role) {
            case 'admin': return 'admin';
            case 'operator': return 'operator';
            case 'staff': return 'staff';
            default: return '/';
        }
    }
}

