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
    // RedirectIfAuthenticated
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()?->role) {
            return match (Auth::user()->role) {
                'admin' => redirect()->route('admin'),
                'operator' => redirect()->route('operator'),
                'staff' => redirect()->route('staff'),
                default => redirect('/')->withErrors('Invalid role.'),
            };
        }
        return $next($request);
    }

}
