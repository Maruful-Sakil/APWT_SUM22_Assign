<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

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
                "password"=>"required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                "conf_password"=>"required|same:password"
            ],
        
            [
                "name.required"=>"Please provide your name",
                
            ]);
            $st = new Client();
            $st->name = $req->name;
            $st->email =$req->email;
            $st->password =$req->password;
            $st->save();
            return redirect()->route('user.login');
        
    }
}
