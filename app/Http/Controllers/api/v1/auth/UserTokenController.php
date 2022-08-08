<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->get('username'))->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Datos de Acceso Incorrectos'
            ]);
        }

        return response()->json([
            'token' => $user->createToken($request->username)->plainTextToken
        ]);
    }
}
