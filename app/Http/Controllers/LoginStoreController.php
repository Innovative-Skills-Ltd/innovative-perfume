<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginStoreController extends Controller
{
    public function login(Request $request){
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
