<?php

namespace App\Http\Controllers;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadisticaController extends Controller
{
    public function showEstadistica()
    {

        $totalSolicitudes = 0;
        $totalPendiente = 0;
        $totalRechazada = 0;
        $totalAceptada = 0;
        $totalAceptadaObs = 0;
        $totalAnulada = 0;

        $PerctotalPendiente=0;
        $PerctotalRechazada=0;
        $PerctotalAceptada=0;
        $PerctotalAceptadaObs=0;
        $PerctotalAnulada=0;

        $cantTipo1 = 0;
        $cantTipo2 = 0;
        $cantTipo3 = 0;
        $cantTipo4 = 0;
        $cantTipo5 = 0;
        $cantTipo6 = 0;


        $usuario1 = User::where('rol','Alumno')->get();
        foreach($usuario1 as $usuario){
            foreach($usuario->solicitudes as $solicitud){
                $totalSolicitudes++;
            }

        }
        $cantRango = 0;

        //$usuarios = User::where('rol','Alumno')->with(array('solicitudes' => function ($query) use ($fecha1,$fecha2){
            //$query->wherePivot('created_at','>=', $fecha1)->wherePivot('created_at', '<=', $fecha2);


        //}))->get();

        $carrera_JefeCarrera = Auth::user()->carrera_id;
        $alumnos = User::whereHas(
            'solicitudes'
        )->with('solicitudes')->get();
        $lista_Alumnos = $alumnos->whereIn('carrera_id',$carrera_JefeCarrera);


        foreach ($lista_Alumnos as $key => $usuario) {
            foreach ($usuario->solicitudes as $key => $solicitud) {
                        $cantRango++;
                    switch ($solicitud->getOriginal()['pivot_estado']) {
                    case 0:
                        $totalPendiente++;
                        break;
                    case 1:
                        $totalRechazada++;
                        break;
                    case 2:
                        $totalAceptada++;
                        break;
                    case 3:
                        $totalAceptadaObs++;
                        break;
                    case 4:
                        $totalAnulada++;
                        break;
                    default:
                        # code...
                        break;
                }
                switch ($solicitud->getOriginal()['pivot_solicitud_id']) {
                    case 1:
                        $cantTipo1++;
                        break;
                    case 2:
                        $cantTipo2++;
                        break;
                    case 3:
                        $cantTipo3++;
                        break;
                    case 4:
                        $cantTipo4++;
                        break;
                    case 5:
                        $cantTipo5++;
                        break;
                    case 6:
                        $cantTipo6++;
                        break;
                    default:
                        # code...
                        break;
                }



        }

            if($totalSolicitudes == 0){

                $totalPendiente = 0;
                $totalRechazada = 0;
                $totalAceptada = 0;
                $totalAceptadaObs = 0;
                $totalAnulada = 0;

            }else{

                $PerctotalPendiente = ($totalPendiente/$totalSolicitudes) * 100;
                $PerctotalRechazada = ($totalRechazada/$totalSolicitudes) * 100;
                $PerctotalAceptada = ($totalAceptada/$totalSolicitudes) * 100;
                $PerctotalAceptadaObs = ($totalAceptadaObs/$totalSolicitudes) * 100;
                $PerctotalAnulada = ($totalAnulada/$totalSolicitudes) * 100;
            }
            return view('estadisticas.index')
                ->with('cantRango', $cantRango)
                ->with('cantTipo1', $cantTipo1)
                ->with('cantTipo2', $cantTipo2)
                ->with('cantTipo3', $cantTipo3)
                ->with('cantTipo4', $cantTipo4)
                ->with('cantTipo5', $cantTipo5)
                ->with('cantTipo6', $cantTipo6)
                ->with('totalPendiente', $totalPendiente)
                ->with('totalRechazada', $totalRechazada)
                ->with('totalAceptada', $totalAceptada)
                ->with('totalAceptadaObs', $totalAceptadaObs)
                ->with('totalAnulada', $totalAnulada)
                ->with('PerctotalPendiente', $PerctotalPendiente)
                ->with('PerctotalRechazada', $PerctotalRechazada)
                ->with('PerctotalAceptada', $PerctotalAceptada)
                ->with('PerctotalAceptadaObs', $PerctotalAceptadaObs)
                ->with('PerctotalAnulada', $PerctotalAnulada)
            ;
            }


    }

    public function showEstadistica1(Request $request)
    {
        if(date($request->get("prueba1")) > date($request->get("prueba2"))){


            return back()->with('error', 'La fecha inicial no debe ser mayor que la fecha final');
        }

        $fecha1= $request->prueba1;
        $fecha2= $request->prueba2;
        $fecha2= date('Y-m-d', strtotime($fecha2 . '+ 1 days'));
        $fecha1= date('Y-m-d', strtotime($fecha1));

        $totalSolicitudes = 0;
        $totalPendiente = 0;
        $totalRechazada = 0;
        $totalAceptada = 0;
        $totalAceptadaObs = 0;
        $totalAnulada = 0;

        $PerctotalPendiente=0;
        $PerctotalRechazada=0;
        $PerctotalAceptada=0;
        $PerctotalAceptadaObs=0;
        $PerctotalAnulada=0;

        $cantTipo1 = 0;
        $cantTipo2 = 0;
        $cantTipo3 = 0;
        $cantTipo4 = 0;
        $cantTipo5 = 0;
        $cantTipo6 = 0;


        $usuario1 = User::where('rol','Alumno')->get();
        foreach($usuario1 as $usuario){
            foreach($usuario->solicitudes as $solicitud){
                $totalSolicitudes++;
            }

        }
        $cantRango = 0;

        //$usuarios = User::where('rol','Alumno')->with(array('solicitudes' => function ($query) use ($fecha1,$fecha2){
            //$query->wherePivot('created_at','>=', $fecha1)->wherePivot('created_at', '<=', $fecha2);


        //}))->get();

        $carrera_JefeCarrera = Auth::user()->carrera_id;
        $alumnos = User::whereHas(
            'solicitudes'
        )->with('solicitudes')->get();
        $lista_Alumnos = $alumnos->whereIn('carrera_id',$carrera_JefeCarrera);


        foreach ($lista_Alumnos as $key => $usuario) {
            foreach ($usuario->solicitudes as $key => $solicitud) {

                if(date('Y-m-d', strtotime($solicitud->pivot->created_at)) >= date($request->get("prueba1")) and date('Y-m-d', strtotime($solicitud->pivot->created_at)) <= date($request->get("prueba2"))){
                    $cantRango++;
                    switch ($solicitud->getOriginal()['pivot_estado']) {
                    case 0:
                        $totalPendiente++;
                        break;
                    case 1:
                        $totalRechazada++;
                        break;
                    case 2:
                        $totalAceptada++;
                        break;
                    case 3:
                        $totalAceptadaObs++;
                        break;
                    case 4:
                        $totalAnulada++;
                        break;
                    default:
                        # code...
                        break;
                    }
                    switch ($solicitud->getOriginal()['pivot_solicitud_id']) {
                        case 1:
                            $cantTipo1++;
                            break;
                        case 2:
                            $cantTipo2++;
                            break;
                        case 3:
                            $cantTipo3++;
                            break;
                        case 4:
                            $cantTipo4++;
                            break;
                        case 5:
                            $cantTipo5++;
                            break;
                        case 6:
                            $cantTipo6++;
                            break;
                        default:
                            # code...
                            break;
                    }
                }

            }

            if($totalSolicitudes == 0){

                $totalPendiente = 0;
                $totalRechazada = 0;
                $totalAceptada = 0;
                $totalAceptadaObs = 0;
                $totalAnulada = 0;

            }else{

                $PerctotalPendiente = ($totalPendiente/$totalSolicitudes) * 100;
                $PerctotalRechazada = ($totalRechazada/$totalSolicitudes) * 100;
                $PerctotalAceptada = ($totalAceptada/$totalSolicitudes) * 100;
                $PerctotalAceptadaObs = ($totalAceptadaObs/$totalSolicitudes) * 100;
                $PerctotalAnulada = ($totalAnulada/$totalSolicitudes) * 100;
            }
            return view('estadisticas.index')
                ->with('cantRango', $cantRango)
                ->with('cantTipo1', $cantTipo1)
                ->with('cantTipo2', $cantTipo2)
                ->with('cantTipo3', $cantTipo3)
                ->with('cantTipo4', $cantTipo4)
                ->with('cantTipo5', $cantTipo5)
                ->with('cantTipo6', $cantTipo6)
                ->with('totalPendiente', $totalPendiente)
                ->with('totalRechazada', $totalRechazada)
                ->with('totalAceptada', $totalAceptada)
                ->with('totalAceptadaObs', $totalAceptadaObs)
                ->with('totalAnulada', $totalAnulada)
                ->with('PerctotalPendiente', $PerctotalPendiente)
                ->with('PerctotalRechazada', $PerctotalRechazada)
                ->with('PerctotalAceptada', $PerctotalAceptada)
                ->with('PerctotalAceptadaObs', $PerctotalAceptadaObs)
                ->with('PerctotalAnulada', $PerctotalAnulada)
            ;
            }


    }
}
