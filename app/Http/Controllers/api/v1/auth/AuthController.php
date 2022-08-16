<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    function logout( Request $request ){
        $user = User::find($request->id);
        
        $user->tokens()->delete();

        return response()->json(['message' => 'Logout correcto'], 200);
    }
}