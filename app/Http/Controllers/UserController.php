<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function admin()
    {
        return view('admin.index', ['user' => Auth::user()]);
    }

    /**
     * Show the operator dashboard.
     */
    public function operator()
    {
        return view('operator.index', ['user' => Auth::user()]);
    }

    /**
     * Show the staff dashboard.
     */
    public function staff()
    {
        return view('staff.index', ['user' => Auth::user()]);
    }
}
