<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Http\Requests\Users\UserEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'role_id' => ($request->role_id) ? $request->role_id : 3 ,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('home')->with('success', 'El usuario se creo con exito');
    }

    public function update(UserEditRequest $request, User $user)
    {
        if($request->input('password')){
            $user->password = bcrypt($request->input('password'));
            $user->update($request->except('password'));
            return redirect()->route('home')->with('success', 'El usuario se actualizo con exito');
        }

        $user->update($request->except('password'));

        return redirect()->route('home')->with('success', 'El usuario se actualizo con exito');
    }

    public function changePassword(Request $request, User $user){
        if(!Hash::check($request->password, $user->password)){
            return redirect()->route('home')->with('error', 'Contraseña Incorrecta');
        }

        $user->password = bcrypt($request->input('newpassword'));
        $user->save();

        return redirect()->route('home')->with('success', 'Contraseña Actualizada');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home')->with('success', 'El usuario se elimino con exito');
    }
}
