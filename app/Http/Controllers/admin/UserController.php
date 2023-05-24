<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return view('admin.pages.user.index',compact('user'));
    }
    public function create(){
        $category=Category::all();
        return view('admin.pages.user.create',compact('category'));
    }
    public function submit(Request $request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
        ]);
       $user=new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->lastname=$request->lastname;
       $user->category_id=$request->category_id;
       $user->password=Hash::make($request->password);
       $user->save();
       return redirect()->back()->with('message','user add susseccfully');
    }
    // public function delete($id){
    //     $user=User::find($id);
    //     $user->delete();
    //     if(!empty($user)){
    //         return redirect()->back()->with('message','user Deleted successfuly');
    //     }else{
    //         return redirect()->back()->with('error','user not fond');
    //     }

    // }
    public function edit($id){

       $record=User::find($id);
      return view('admin.pages.user.edit',compact('record'));
    }
    public function update(Request $request , $id){
        $user=User::find($id);
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->update();
        return redirect('admin/user')->with('message','User Updated successfuly');
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/admin/login');
    }
}
