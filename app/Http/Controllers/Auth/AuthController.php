<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function login(){
        return view('welcome');
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
        return redirect()->route('login')->with('info', 'Credenciales de acceso incorrectas');
    }

    public function logout(){
        if(Auth::check()){
            request()->session()->flush();
        }

        return redirect()->route('welcome');
    }

    public function sendResetPasswordMail (Request $request) {

        $request->validate(['email' => 'required|email']);

        if(!User::where('email', $request->email)->first()){
            return back()->with('message', 'Este correo no tiene una cuenta con nosotros');
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetingPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
