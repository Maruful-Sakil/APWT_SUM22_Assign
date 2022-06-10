<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    function create(){
        return view('user.register');
    }
    function createSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:10|min:3",
                "email"=>"required|",
                "password"=>"required|min:8",
                "conf_password"=>"required|min:8|same:password"
            ],
        
            [
                "name.required"=>"Please provide your name",
                
            ]);
            return redirect()->route('afterregis');
        
    }
}
