<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login_form(){
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        // validate the request
        $user_data =  $request->validate([
            "email" => "required|email|max:255",
            "password" => "required|string",
        ]);        
        if (Auth::guard('admin')->attempt([
            'email'=> $user_data['email'],'password' => $user_data['password']
        ])) {
            return view('AdminPanel.index');
        } else {
            return redirect()->back()->with('notice','Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('Auth.login');
    }

}
