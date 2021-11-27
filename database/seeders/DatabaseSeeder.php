<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Solicitud::create([
            'tipo' => 'Sobrecupo'
        ]);
        \App\Models\Solicitud::create([
            'tipo' => 'Cambio de paralelo'
        ]);
       \App\Models\Solicitud::create([
           'tipo' => 'Eliminacion Asignatura'
       ]);
       \App\Models\Solicitud::create([
           'tipo' => 'Inscripcion Asignatura'
       ]);
       \App\Models\Solicitud::create([
        'tipo' => 'Ayudantia'
       ]);
       \App\Models\Solicitud::create([
        'tipo' => 'Facilidades'
       ]);




       User::create([
        'name' => 'Administrador',
        'email' => 'admin@ucn.cl',
        'password' => bcrypt('123123'),
        'rut' => '198226920',
        'rol' => 'Administrador',
        'status' => 1,
    ]);
    }
}
