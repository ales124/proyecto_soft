<?php

namespace App\Imports;

use App\Estudiante;
use App\Http\Requests\statusAlumno;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class EstudianteImport implements ToModel,WithHeadingRow, WithValidation,SkipsOnError,SkipsOnFailure
{
    use Importable,SkipsErrors,SkipsFailures;

    public function model(array $row)
    {
        $reemplazos = array(
            '-'             => '',
            '.'             => ''
        );

        $nuevaContraseña = substr($row['rut'],0,6);
        return new User([


            'carrera_id'=> $row['carrera_id'],
            'rut' => $row['rut'],
            'rut' => strtr( $row['rut'] , $reemplazos ),
            'name' => $row['name'],
            'email' => $row['email'],
            'rol'=> 'Alumno',
            'status'=>1,
            'password' => Hash::make(  $nuevaContraseña ),



        ]);
    }

    public function rules(): array
    {
        return [
            'email' =>['required','email'],
            'rut' =>['required','unique:users'],
            'name' =>['required'],
            'rol'=>['required'],

        ];
    }
}
