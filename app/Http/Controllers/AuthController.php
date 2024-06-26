<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
