<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DeshabilitarUsuarioController;
use App\Http\Controllers\UsuarioController;

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

Auth::routes();
Route::resource('usuario', UsuarioController::class,['middleware' => 'auth']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/change-password',[ChangePasswordController::class, 'changePassword'])->name('changepassword');
Route::resource('carrera', CarreraController::class,['middleware'=>'auth']);
Route::get('/status-user-change', [DeshabilitarUsuarioController::class, 'deshabilitarUsuario'])->name('changeStatus');
