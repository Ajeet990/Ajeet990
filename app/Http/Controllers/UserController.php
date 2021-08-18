<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    function login(Request $req)
    {

        $user = User::where(['email'=>$req->email])->first();
        if(Hash::check($req->password,$user->password))
        {
            $req->session()->put('user',$user);
            return redirect('welcome');
        }
        else{
            echo 'Password or Email dosn\'t matched any data';
        }
    }
}
