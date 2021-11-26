<?php

namespace App\Http\Controllers;
use App\Imports\alumnoimport;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Http\Request;
use App\Imports\EstudianteImport;
use PhpOffice\PhpSpreadsheet\IOFactory;




class cargaMasiva extends Controller
{


    public function index(){

        return view('auth.CargaMasiva.index');
        echo "Hola mundo";
    }


    public function importExcel(Request $request)
    {







        /*$this->validate($request, [
            'select_file' => 'required|file|max:1024|mimes:xls,xlsx'
        ]);*/

        $file = $request->file('adjunto');


        $headings = (new HeadingRowImport)->toArray($file);
        $headings = $headings[0];

        if($headings[0][0] == 'carrera_id')
        {

            $import = new EstudianteImport;

            $import->import($file);

            if($import->failures()->isNotEmpty())
            {
                return back()->withFailures($import->failures());
            }
            else
            {
                return back()-> with('success', 'Se importó el archivo exitosamente');
            }
        }else
        {
            return back()-> with('error', 'El archivo es incorrecto');
        }



    }


}
