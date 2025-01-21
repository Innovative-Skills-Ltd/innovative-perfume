<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginStoreController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active'  // if you have a status field
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate(); // Important for security

            if(Auth::user()->can('Dashboard')){
                return redirect()->intended(route('admin'));
            } else {
                Auth::logout();
                return redirect()->back()->with('error','You do not have admin access');
            }
        }

        return redirect()->back()->with('error','Invalid credentials');
    }
}
