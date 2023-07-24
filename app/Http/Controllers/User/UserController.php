<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function create(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:8|max:12',
            'cpassword'=>'required|min:8|max:12|same:password',
            'category' => 'required|in:1,2',
            ],
            [
                'cpassword!=password'=>'Passwords does not match',

        ]);
        $user= new User();
        $user->username=$request->username;
        $user->first_name = $request->first_name ? $request->first_name : null;
        $user->last_name = $request->last_name ? $request->last_name : null;
        $user->company_name = $request->company_name ? $request->company_name : null;
        $user->password=Hash::make($request->password);
        $user->category=$request->category;
        $save=$user->save();

        if($save)
        {
            return redirect()->back()->with('success','You have registered succesfully');
        }
        else
        {
            return redirect()->back()->with('fail','Registration has failed!');
        }
    }

    function check(Request $request)
    {
        $request->validate([
            'username'=>'required|exists:users',
            'password'=>'required|min:8|max:12',
        ],[

            'username.exists'=>'This username does not exist.'
        ]);
        $credits=$request->only('username','password');
        if(Auth::guard('web')->attempt($credits))
        {
            return redirect()->route('user.home');
        }
        else
        {
            return redirect()->route('user.login')->with('fail','Incorrect username or password');
        }
    }



    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

}
