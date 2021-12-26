<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class resolverSolicitud extends Controller
{
    public function index(String $id){



        $user = User::where('carrera_id', $id)->with('carrera')->with('solicitudes')->first();
        return view('resolverSolicitudes\resolver')->with('user',$user);

    }


    public function devolverEstudiante(Request $request){

        //select * from user where rut = $rut
        $findUser = User::where('rut', $request->rut)->first();

        if (isset($findUser)) {
            if ($findUser->rol == "Alumno") {
                return redirect(route('mostrarEstudiante',['id' => $findUser->id]));
            }else {
                return redirect('resolverSolicitudes\resolver')->with('error', 'El rut ingresado no es Alumno.');
            }
        }else {
            return redirect('resolverSolicitudes\resolver')->with('error', 'Alumno no encontrado.');
        }
    }



    public function mostrarEstudiante(String $id){
        $user = User::where('id', $id)->with('carrera')->with('solicitudes')->first();

        return view('alumno.index')->with('user',$user);
    }

}
