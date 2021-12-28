<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AnularSolicitudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AnularSolicitud(Request $request){
        //dd($request);
        //$usuario = User::where('id',$request->id)->get()->first();
        $id_user = Auth::user()->id;
        $array = [1,2,3,4,5,6];
        $user = User::where('id','=', $id_user)->first();
        //dd($array);
        $user->solicitudes()->wherePivot('id', $request->id)->updateExistingPivot($array, [
            'estado' => 4
        ]);
        $user->save();
        return redirect('/solicitud');

        //if($usuario->getSolicitudId()->estado === 0){

           // $usuario->estado = 4;
            //$usuario->save();

        //}

    }



}
