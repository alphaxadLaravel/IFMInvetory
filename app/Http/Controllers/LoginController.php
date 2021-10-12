<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;

class LoginController extends Controller
{

    // the login function here
    public function Login(){

        // validate the data to avoid null request
        request()->validate([
            'username'=>'required',
            'password'=>'required',
        ]); 


        // checking if user exist in database
        $check = User::where(['pfNumber'=>request()->username])->first();

        // checking and redirect users to their dashboard

        if(!$check || !Hash::check(request('password'), $check->password)){

            session()->flash('none','');
            return redirect('/log');

        }elseif ($check->available == "absent") {
            session()->flash('none','');
            return redirect('/log');
        }
        elseif($check->status == "viewer"){

            request()->session()->put('user',$check);
            return redirect('/wellcome');

        }elseif($check->status == "admin"){
            
            request()->session()->put('user',$check);

            return redirect('/');
        }elseif($check->status == "manager"){
            
            request()->session()->put('user',$check);

            return redirect('/wellcome');
        }elseif($check->status == "user"){
            
            request()->session()->put('user',$check);

            return redirect('/logout');
        }

    }
}
