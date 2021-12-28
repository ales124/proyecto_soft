<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Solicitud;

class resolverSolicitud extends Controller
{
    public function index(String $id){



        $users=User::where('rol', "Alumno")->with('solicitudes')->get();
        $user = User::where('carrera_id', $id)->with('carrera')->with('solicitudes')->first();

        return view('resolverSolicitudes\resolver')->with('user',$user)->with('users',$users)->with('carrera_id', $id);

    }


    public function devolverEstudiante(String $rut,String $idSol){

        //select * from user where rut = $rut
        $user = User::where('rut', $rut)->with('carrera')->with('solicitudes')->first();
        return view('verSolicitud\ver')->with('user',$user)->with('idSol',$idSol);
    }



    public function otrasSolicitudes(String $id){
        $users=User::where('rol', "Alumno")->with('solicitudes')->get();
        $user = User::where('carrera_id', $id)->with('carrera')->with('solicitudes')->first();

        return view('verSolicitud\verOtras')->with('user',$user)->with('users',$users)->with('carrera_id', $id);
    }


    ///parte resolver solicitudes

    public function AceptarSolicitud(Request $request ){
        //dd($request);
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $request->id)->first();
        //dd($user);
        $user->solicitudes()->wherePivot('id', $request->id_solicitud)->updateExistingPivot($array, [
            'estado' => 1
        ]);
        $user->save();
        //dd($array);
        return view('home')->with('Success', 'Se acepto la solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


    public function AceptarSolicitud2(Request $request){
        //dd($request);
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $id_user)->first();
        //dd($array);
        $user->solicitudes()->wherePivot('id', $request->id)->updateExistingPivot($array, [
            'estado' => 2
        ]);
        $user->save();
        return redirect('/solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


    public function rechazarSolicitud(Request $request){
        //dd($request);
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $id_user)->first();
        //dd($array);
        $user->solicitudes()->wherePivot('id', $request->id)->updateExistingPivot($array, [
            'estado' => 3
        ]);
        $user->save();
        return redirect('/solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


}
