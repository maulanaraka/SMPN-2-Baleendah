<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect based on the user's role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin'); // Adjust to your admin route
                case 'operator':
                    return redirect()->route('operator'); // Adjust to your operator route
                case 'staff':
                    return redirect()->route('staff'); // Adjust to your staff route
                default:
                    return redirect('/'); // Default route if role is not matched
            }
        }

        return $next($request);
    }
}
