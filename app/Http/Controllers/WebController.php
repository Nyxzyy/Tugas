<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request){

        return view('welcome');
    }
    public function About(Request $request){
        return view('About');
    }
    public function Admin(Request $request){
        return view('Admin');
    }
}
