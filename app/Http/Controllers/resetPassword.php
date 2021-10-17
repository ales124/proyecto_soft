<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class resetPassword extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function resetearContraseña(Request $request)
    {


        $usuario = User::where('id',$request->id)->get()->first();

        $nuevaContraseña = substr($usuario->rut, 0, 6);


        if($usuario->rol=="Administrador"){
            Auth::logout();
        }


        $usuario->password = $nuevaContraseña;
        $request->session()->regenerateToken();
        $usuario->save();
        return redirect('/usuario');
    }
}
