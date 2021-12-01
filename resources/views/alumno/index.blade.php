@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    </div>
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fas fa-users"></i>
            <div class="login-title" style="margin-left: 70%">Registro del Alumno</div>
            <div class="row">
                <div class="col-6">
                    <div class="row-12">
                        <div class="col-lg-12 login-key">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6" >
                    <table class="table table-striped table-dark table-hover table-sm"style="margin-left: 35%">
                        <tbody>
                            <tr>
                                <td>Nombre:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Rut:</td>
                                <td>{{ $user->rut }}</td>
                            </tr>
                            <tr>
                                <td>Carrera:</td>
                                <td>{{ $user->carrera()->first()->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 mt-3 login-box">
            <div class="col-12">
                <div class="login-title">Solicitudes</div>
                <table class="table table-striped table-dark table-hover table-sm">
                    <thead>
                        <th scope="col">N°</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ver</th>
                    </thead>
                    <tbody>
                        @forelse ($user->solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->getOriginal()['pivot_id']}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_updated_at']}}</td>
                            <td>{{$solicitud->getOriginal()['tipo']}}</td>
                            <td><a style="background-color: #003057;border-color:#003057; color:white" class="btn btn-info" href={{ route('verSolicitudAlumno',
                                    ['id'=>$solicitud->getOriginal()['pivot_id'], 'alumno_id' => $user->id])
                                    }}>Ver</a></td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p>Sin Solicitudes</p>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>
    <div class="col-lg-12 py-3">
        <div class="col-lg-12 text-center">
            <a href="http://127.0.0.1:8000/buscar-estudiante" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atras') }}</a>
        </div>
    </div>
@endsection
