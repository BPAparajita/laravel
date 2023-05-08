<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminlogins(){
        return view('dashboard.admin.login');
    }

    public function home(){
        return view('dashboard.admin.home');
    }

    public function adminlogin(Request $request ){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:8|max:20'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('home')->with('success','success');
        }else{
            return redirect()->route('adminlogins')->with('fail','wrong');
        }
    }

    
}
