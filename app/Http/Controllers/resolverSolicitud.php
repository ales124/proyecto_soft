<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Solicitud;

class resolverSolicitud extends Controller
{
    public function index(String $id){



        $users=User::where('carrera_id', $id)->get();
        $user = User::where('carrera_id', $id)->with('carrera')->with('solicitudes')->first();

        return view('resolverSolicitudes\resolver')->with('user',$user)->with('users',$users);

    }


    public function devolverEstudiante(String $rut,String $idSol){

        //select * from user where rut = $rut
        $user = User::where('rut', $rut)->with('carrera')->with('solicitudes')->first();
        return view('verSolicitud\ver')->with('user',$user)->with('idSol',$idSol);
    }



    public function mostrarEstudiante(String $id){
        $user = User::where('id', $id)->with('carrera')->with('solicitudes')->first();

        return view('alumno.index')->with('user',$user);
    }

}
