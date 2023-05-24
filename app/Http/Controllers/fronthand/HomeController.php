<?php

namespace App\Http\Controllers\fronthand;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->latest()->take(4)->get();
        return view('fronthand.pages.index', compact('category'));
    }
    public function category_detail($id)
    {
        $category = Category::where('id', $id)->first();
        $brand = User::where('category_id', $id)->first();
        return view('fronthand.pages.category.category_detail',compact('category','brand'));
    }
}
