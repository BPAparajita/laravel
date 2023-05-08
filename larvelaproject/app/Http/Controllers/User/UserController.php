<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function createuser(Request $request)
     {
    
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:20',
             'cpassword'=>'required|min:8|max:20|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();


        if ($save) {
            return redirect()->back()->with('success','Registered Susccessfully..');
        } else {
            return redirect()->back()->with('fail','Invalid Credentials!!');
        }
    }


    function checkuser(Request $request) 
    {
        $request-> validate([ 

            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|max:20',

        ]);

        $creds = $request->only('email','password');
        if(Auth::attempt($creds)){

            return redirect()->route('user.home')->with('success','Successfully');
        }else{
            return redirect()->route('user.login')->with('fail','wrong');
        }

    }
    function logout(){
        Auth::logout();
        return redirect('/') ;
    }
}
