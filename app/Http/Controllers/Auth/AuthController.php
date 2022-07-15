<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return redirect()->route('welcome');
    }


    public function authentication()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = request()->only('username', 'password');
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->route('welcome');
    }

    public function logout(){
        if(Auth::check()){
            request()->session()->flush();
        }

        return redirect()->route('welcome');
    }
}
