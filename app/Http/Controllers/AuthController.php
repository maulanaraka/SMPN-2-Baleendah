<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration process.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|in:admin,operator,staff', // Ensure valid roles
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return redirect($this->redirectToRole($user->role));
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login process.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            return redirect($this->redirectToRole($user->role));
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    /**
     * Logout the user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Redirect users based on role.
     */
    private function redirectToRole($role)
    {
        switch ($role) {
            case 'admin':
                return '/admin-dashboard';
            case 'operator':
                return '/operator-dashboard';
            case 'staff':
                return '/staff-dashboard';
            default:
                return '/';
        }
    }
}