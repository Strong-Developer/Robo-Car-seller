<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginHandler extends Controller
{
    public function login(Request $request){
        if($request->get('remember_me')==1){
            $remember = 1;
        }else{
            $remember = 0;
        }

        if(Auth::attempt([
            'email_address' => $request->get('email'),
            'password' => $request->password
        ], $remember)){
            return redirect(route('dashboard')) ;
        }

        session()->put('error','Unable to login for wrong credentials !');

        return redirect() ->back() ;

    }

    public function logout(Request $request){
        Auth::logout();

        return redirect(route('home.main')) ;

    }
}
