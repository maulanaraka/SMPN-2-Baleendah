<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view('/auth/login');
    }

    function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required' => 'Username can\'t be empty', 
            'password.required' => 'Password can\'t be empty',
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            } elseif(Auth::user()->role == 'operator'){
                return redirect('operator');
            } elseif(Auth::user()->role == 'staff'){
                return redirect('staff');
            }
        }else{
            return redirect('')->withErrors('Wrong username and password')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
    
}
