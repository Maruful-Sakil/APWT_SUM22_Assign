<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(){
        return view('user.login');
    }
    function loginSubmit(Request $req){
        $this->validate($req,
            [
                "email"=>"required|",
                "password"=>"required|min:8",
            ],
        
            [
                "email.required"=>"Please provide your email",
                
            ]);
            return redirect()->route('home');
        
    }
}
