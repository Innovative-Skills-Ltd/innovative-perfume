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
    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email|exists:users,email',
            'password'=>'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active'
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }

        return redirect()->back()->with('error','Invalid credentials');
    }
}
