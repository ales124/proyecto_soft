<?php

use App\Http\Controllers\BuscarEstudianteController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DeshabilitarUsuarioController;
use App\Http\Controllers\resetPassword;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EstadisticaController;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\cargaMasiva;
use App\Http\Controllers\AnularSolicitudController;
use  App\Http\Controllers\resolverSolicitud;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfilusuario', function (){
        $usuarioLogeado = Auth::user();
        return view('perfilusuario')->with('user',$usuarioLogeado);
    });
});

Route::resource('carrera', CarreraController::class,['middleware'=>'auth']);
Route::resource('usuario', UsuarioController::class,['middleware' => 'auth']);

Route::middleware(['rutasAlumno'])->group(function () {
    Route::resource('solicitud', SolicitudController::class);
    Route::post('anular',[AnularSolicitudController::class,'AnularSolicitud'])->name('anular');
    Route::get('/solicitud/{id}/edit',[SolicitudController::class,'edit'])->name('editarSolicitud');
});

Route::get('cargamasiva',[cargaMasiva::class, 'index'])->name('CargaMasiva');
Route::post('cargamasiva', [cargaMasiva::class, 'importExcel'])->name('cargaMasiva');



Route::get('resolver/{carrera_id}',[resolverSolicitud::class, 'index'])->name('resolver');
Route::get('verOtras/{carrera_id}',[resolverSolicitud::class, 'otrasSolicitudes'])->name('verOtras');
Route::get('ver/{rut}/{id}',[resolverSolicitud::class, 'devolverEstudiante'])->name('ver');
route::post('aceptar',[resolverSolicitud::class,'AceptarSolicitud'])->name('aceptar');


Route::get('buscar-estudiante', function(){return view('buscar-estudiante.index');})->name('buscarEstudiante');
Route::post('alumno',[BuscarEstudianteController::class, 'devolverEstudiante'])->name('postBuscarEstudiante');
Route::get('alumno/{id}', [BuscarEstudianteController::class,'mostrarEstudiante'])->name('mostrarEstudiante');
Route::get('alumno/{alumno_id}/solicitud/{id}', [BuscarEstudianteController::class, 'verDatosSolicitud'])->name('verSolicitudAlumno');
Route::get('estadisticas', [EstadisticaController::class, 'showEstadistica'])->name('estadisitica');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/change-password',[ChangePasswordController::class, 'changePassword'])->name('changepassword');

Route::get('/status-user-change', [DeshabilitarUsuarioController::class, 'deshabilitarUsuario'])->name('changeStatus');
Route::get('/resetPassword', [resetPassword::class, 'resetearContraseña'])->name('resetPassword');
