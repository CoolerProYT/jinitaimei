<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function music(){
        return view('music');
    }

    public function image(){
        return view('image');
    }
}
