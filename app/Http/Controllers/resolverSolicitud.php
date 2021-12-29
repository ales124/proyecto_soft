<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Solicitud;
use App\Mail\EstadoUsuarioCorreo;
use Illuminate\Support\Facades\Mail;

class resolverSolicitud extends Controller
{
    public function index(String $id, Request $request){

        $id = $request -> buscartipo;
        $numero = $request -> buscarnumero;

        if($id != null){
            $users = User::where('rol', "Alumno")-> with(array('solicitudes' => function ($query) use ($id){
                $query->wherePivot('solicitud_id', $id)->wherePivot('estado',0);
            }))->get();
        }elseif ($numero != null) {
            $users = User::where('rol', "Alumno")-> with(array('solicitudes' => function ($query) use ($numero){
                $query->wherePivot('id', $numero);
            }))->get();

        }else{
            $users = User::where('rol', "Alumno")->with('solicitudes')->get();
        }
        return view('resolverSolicitudes.resolver')->with('users',$users)->with('carrera_id',$id)->with('error', 'El tipo de solicitud no existe.');

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
        $solicitud=$user->solicitudes()->wherePivot('id', $request->id_solicitud)->first();
        $user->solicitudes()->wherePivot('id', $request->id_solicitud)->updateExistingPivot($array, [
            'estado' => 1
        ]);
        $user->save();

        $estado=1;
        $mensaje="";
       Mail::to($user->email)->send(new EstadoUsuarioCorreo($user, $solicitud,$estado, $mensaje));
        //dd($array);
        return view('home')->with('Success', 'Se acepto la solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


    public function AceptarSolicitud2(Request $request){

        if($request->observacion==""){

            return view('home')->with('error', 'no se agregaron observaciones');
        }
        //dd($request);
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $request->id)->first();
        //dd($user);
        $solicitud=$user->solicitudes()->wherePivot('id', $request->id_solicitud)->first();
        $user->solicitudes()->wherePivot('id', $request->id_solicitud)->updateExistingPivot($array, [
            'estado' => 2
        ]);
        $user->save();

        $estado=2;
        $mensaje=$request->observacion;
        Mail::to($user->email)->send(new EstadoUsuarioCorreo($user, $solicitud,$estado,$mensaje));
        return view('home')->with('success', 'Se acepto la solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


    public function rechazarSolicitud(Request $request){

        if($request->observacion==""){

            return view('home')->with('error', 'no se agregaron observaciones');
        }
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $request->id)->first();
        //dd($user);
        $solicitud=$user->solicitudes()->wherePivot('id', $request->id_solicitud)->first();
        $user->solicitudes()->wherePivot('id', $request->id_solicitud)->updateExistingPivot($array, [
            'estado' => 3
        ]);

        $user->save();
        $estado=3;
        $mensaje=$request->observacion;
        Mail::to($user->email)->send(new EstadoUsuarioCorreo($user, $solicitud,$estado,$mensaje));
        return view('home')->with('success', 'Se rechazo la solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }


}
