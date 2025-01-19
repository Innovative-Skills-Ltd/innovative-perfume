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
        Log::info('Form Load Session:', [
            'session_id' => session()->getId(),
            'token' => csrf_token(),
            'session_path' => config('session.files'),
            'domain' => config('session.domain')
        ]);

        return view('auth.login');
    }
    public function login(Request $request){
        Log::info('Form Load Session:', [
            'session_id' => session()->getId(),
            'token' => csrf_token(),
            'session_path' => config('session.files'),
            'domain' => config('session.domain')
        ]);
       $email = $request->email;
       $password = $request->password;
       $this->validate($request,[
        'email'=>'required|email|exists:users,email',
        'password'=>'required',
       ]);

       if(Auth::attempt(['email'=>$email,'password'=>$password])){
        return redirect()->route('admin');
       }else{
        return redirect()->back()->with('error','Invalid credentials');
       }
    }
}
