<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.pages.index');
    }
    public function about(){
       return view('front.pages.about');
    }
}
