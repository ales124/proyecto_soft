<?php

namespace App\Http\Controllers;
use App\Imports\alumnoimport;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Http\Request;
use App\Imports\EstudianteImport;
use App\Models\Carrera;
use Illuminate\Auth\Events\Validated;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class cargaMasiva extends Controller
{



    public function index(){

        $auxAdd=[];
        $auxErrores=[];
        return view('auth.CargaMasiva.index')->with('nuevos',$auxAdd)->with('erorres',$auxErrores);

    }


    public function importExcel(Request $request)
    {


        $auxHeader=false;
        $auxDatos= new Request();
        $auxErrores=[];
        $auxAdd=[];

        $request->validate([
            "file" => 'mimes:xls,xlsx|required'
        ]);


        $doc = IOFactory::load($request->file);
        $hoja1= $doc->getSheet(0);

        if(is_numeric($hoja1->getCell('A1')->getValue())){
            $auxHeader=false;

        }else{
            $auxHeader=true;
        }

        if($auxHeader){

            foreach($hoja1->getRowIterator(2,null) as $key =>$fila){
                foreach($fila->getCellIterator() as $key =>$celda){
                    switch ($celda->getColumn()){


                        case 'A':
                            $auxDatos->request->add(["carrera"=>$celda->getValue()]);
                            break;

                        case 'B':
                         $auxDatos->request->add(["rut"=>$celda->getValue()]);
                           break;


                           case 'C':
                            $auxDatos->request->add(["nombre"=>$celda->getValue()]);
                            break;

                            case 'D':
                                $auxDatos->request->add(["email"=>$celda->getValue()]);
                                break;


                                default:
                                break;


                    }


                }





                $validator=Validator::make($auxDatos->request->all(),[
                    "carrera"=>"exist:carrera,codigo",
                    "rut"=>'unique:users,rut',
                    'email'=>'unique:users,email',

                ]);









                dd($validator);

                if (!$validator->fails()) {

                    dd($auxDatos);




                    $carrera=Carrera::where('codigo', $auxDatos->request->all()["carrera"])->first();





                    $nuevaContraseña = substr($auxDatos->request->all()["rut"], 0, 6);
                    $newUser=User::create([
                        'name'=> $auxDatos->request->all()["nombre"],
                        'email'=> $auxDatos->request->all()["email"],
                        'password'=>Hash::make($nuevaContraseña),
                        'rut'=> $auxDatos->request->all()["rut"],
                        'rol'=>"Alumno",
                        'status'=>1,
                        'carrera_id'=>$carrera->id,



                    ]);
                    $auxAdd["fila" . $fila->getRowIndex()]= $newUser;

                }


            }
        }else{

            foreach($hoja1->getRowIterator(2,null) as $key =>$fila){
                foreach($fila->getCellIterator() as $key =>$celda){
                    switch ($celda->getColumn()){


                        case 'A':
                            $auxDatos->request->add(["carrera"=>$celda->getValue()]);
                            break;

                        case 'B':
                         $auxDatos->request->add(["rut"=>$celda->getValue()]);
                           break;


                           case 'C':
                            $auxDatos->request->add(["nombre"=>$celda->getValue()]);
                            break;

                            case 'D':
                                $auxDatos->request->add(["email"=>$celda->getValue()]);
                                break;


                                default:
                                break;


                    }


                }
                $validator=Validator::make($auxDatos->request->all(),[
                    "carrera"=>"exist:carrera,codigo",
                    "rut"=>'unique:users,rut',
                    'email'=>'unique:users,email'
                ]);



                $auxErrores["fila" . $fila->getRowIndex()]= $validator->getMessageBag()->getMessages();
                if(!$validator->fails()){
                    $carrera=Carrera::where('codigo',$auxDatos->request->all()["carrera"])->first();



                    $nuevaContraseña = substr($auxDatos->request->all()["rut"],0,6);
                    $newUser=User::create([
                        'name'=> $auxDatos->request->all()["nombre"],
                        'email'=> $auxDatos->request->all()["email"],
                        'password'=>Hash::make($nuevaContraseña),
                        'rut'=> $auxDatos->request->all()["rut"],
                        'rol'=>"Alumno",
                        'status'=>1,
                        'carrera_id'=>$carrera->id,




                    ]);
                    $auxAdd["fila" . $fila->getRowIndex()]= $newUser;
                }

            }

        }//fin else






       // return view('auth.CargaMasiva.index',compact('auxAdd'));
        return view('auth.CargaMasiva.index')->with('nuevos',$auxAdd)->with('errores', $auxErrores);

    }


}
