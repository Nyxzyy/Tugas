<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request){

        $data = Portfolio::all();
        return view('welcome', ['data' => $data]);
    }
    public function About(Request $request){
        return view('About');
    }
    public function Admin(Request $request){
        return view('Admin');
    }
}
