<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the correct role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect or abort if the user doesn't have access
        return redirect('/login')->withErrors('Unauthorized access.');
    }
}



