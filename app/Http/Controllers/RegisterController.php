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
                "email"=>"required|unique:clients,email",
                "password"=>"required|", //regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
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
            session()->flash('msg','successfull');
            return redirect()->route('user.login');
        
    }
    function login(){
        return view('user.login');
    }
    function loginSubmit(Request $req)
    {
        $this->validate($req,[
            "email"=>"required|exists:clients,email",
            "password"=>"required"
        ]);
        $user = Client::where('email',$req->email)
                            ->where('password',$req->password)->first();

        if($user){
            //session()->flash('msg','User Exists');
            session()->put('logged',$user->email);
            return redirect()->route('user.dash');

        }
        else {
            session()->flash('msg','User not valid');
        return back();
        }

    }
    function dashboard(){

        //$user = Client::where('user_id',session()->get('logged'))->first();
        return view('user.dashboard'); //->with('user',$user);
    }
    function logout(){
        session()->forget('logged');
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('user.login');
    }
    
}
