<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    
   public function login(){
   		return view('auth.login');
   }

   public function loginCheck(Request $request){
   	if(Auth::attempt($request->except('_token'))){
   		return redirect()->route('admin_home');
   	}else{
   		return 'invalid email/password';
   	}
   }
}
