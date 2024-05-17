<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function music(){
        return view('admin.music');
    }

    public function image(){
        return view('admin.image');
    }
}
