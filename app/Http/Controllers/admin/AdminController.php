<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $auth=Auth::user();
        $user=User::count();
        return view('admin.pages.dashboard.index',compact('user'));
    }
    public function login(){
        return view('admin.pages.login.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('admin/dashboard')->with('message','Welcome Back! '.Auth::user()->name);
        }else{
            return redirect()->back()->with('message','Email or Password incorect!');
        }
    }

}
