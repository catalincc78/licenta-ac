<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check(Request $request)
    {
        $request->validate([
            'username'=>'required|exists:admins',
            'password'=>'required|min:8|max:12',
        ],[
            'username.exists'=>'This username does not exist or is not an Admin'
        ]);

        $credits = $request->only('username','password');
        if(Auth::guard('admin')->attempt($credits))
        {
            return redirect()->route('admin.home');
        }
        else
        {
            return redirect()->route('admin.login')->with('fail','Incorrect username or password');
        }
    }

    function logout()
    {
        Auth::guard('admin')->logout();
        session()->regenerate();
        return redirect()->route('admin.login');
    }
}


