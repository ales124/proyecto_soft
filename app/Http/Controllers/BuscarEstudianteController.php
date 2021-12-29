<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BuscarEstudianteController extends Controller
{
    public function devolverEstudiante(Request $request){

        $carrera_currentUser = Auth::user()->carrera_id; //Accedes a la carrera del usuario logeado (Jefe de Carrera)
        $findUser = User::where('rut', $request->rut)->where('carrera_id', $carrera_currentUser)->first();

        if (isset($findUser)) {

            if ($findUser->rol == "Alumno") {
                return redirect(route('mostrarEstudiante',['id' => $findUser->id]));
            }
        }else {
            return redirect('buscar-estudiante')->with('error', 'Usuario no encontrado');
        }
    }


    public function mostrarEstudiante(String $id){
        $user = User::where('id', $id)->with('carrera')->with('solicitudes')->first();

        return view('alumno.index')->with('user',$user);
    }

    public function index(){

        return view('buscar-estudiante.index');

    }

    public function verDatosSolicitud (String $id, String $alumno_id){

        //co nesto obetenemos los datos de la solicitud con la ids
        $getUser = User::where('id', $id)->firstOrFail()->getSolicitudId($alumno_id)->first();
        return view('datosSolicitud.index')->with('solicitud',$getUser);
    }




}
