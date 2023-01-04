<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

    // public function create(){
    //     if(Auth::check()){
    //         return redirect('/');
    //     }

    //     return view('login');
    // }

    public function index()
    {
            return view('auth.login');

    }

    public function singUp(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)){
            return ["status"=> "error"];
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return ["status" => "logged"];
    }


    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

}
