<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use app\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudesAlumno = Auth::user()->solicitudes;
        return view('solicitud.index')->with('solicitudes', $solicitudesAlumno);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->tipo) {
            case '1':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nrc' => ['numeric','required'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255']
                ]);

                $findUser = User::find($request->user);

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'NRC' => $request->nrc,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');
                break;

                //-------------------------------------

            case '2':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nrc' => ['numeric','required'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255']

                ]);

                $findUser = User::find($request->user);

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'NRC' => $request->nrc,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');
                break;
                //-------------------------------------
            case '3':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nrc' => ['numeric','required'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255']

                ]);

                $findUser = User::find($request->user);

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'NRC' => $request->nrc,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');
                break;
                //-------------------------------------

            case '4':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nrc' => ['numeric','required'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255']

                ]);

                $findUser = User::find($request->user);

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'NRC' => $request->nrc,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');
                break;

                //-------------------------------------

            case '5':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255'],
                    'calificacion' => ['regex:/^[\d]{1}(\.[\d]{1,2})?$/','required','numeric','regex:/^[1-7]/'],
                    'cantidad' => ['numeric','required']
                ]);

                $findUser = User::find($request->user);

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'calificacion_aprob' => $request->calificacion,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle,
                    'cant_ayudantias' => $request->cantidad
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');
                break;

                //-------------------------------------
            case '6':
                $request->validate([
                    'telefono' => ['regex:/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/','required','max:8','min:8'],
                    'nombre' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'detalle' => ['string','required','max:255'],
                    'facilidad' => ['required'],
                    'profesor' => ['required','regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/'],
                    'adjunto.*' => ['mimes:pdf,jpg,jpeg,doc,docx'],
                ]);

                $findUser = User::find($request->user);

                $aux = 0;

                foreach ($request->adjunto as $file) {

                    $name = $aux.time().'-'.$findUser->name.'.pdf';
                    $file->move(public_path('\storage\docs'), $name);
                    $datos[] = $name;
                    $aux++;
                }

                $findUser->solicitudes()->attach($request->tipo, [
                    'telefono' => $request->telefono,
                    'nombre_asignatura' => $request->nombre,
                    'detalles' => $request->detalle,
                    'tipo_facilidad' => $request->facilidad,
                    'nombre_profesor' => $request->profesor,
                    'archivos' => json_encode($datos),
                ]);
                return redirect('/solicitud')->with('success','Solicitud ingresada con éxito');

                break;
            default:
                # code...
                break;
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        return view('solicitud.edit')->with('solicitud',$solicitud);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
