@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="/carrera" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 mt-3 login-box">
            <div class="col-12">
                <div class="login-title">Solicitud</div>
                <table class="table table-striped">
                    <thead>
                        <th style="width: 10%" scope="col">Fecha solicitud</th>
                        <th style="width: 10%" scope="col">Número solicitud</th>
                        <th style="width: 10%" scope="col">Rut</th>
                        <th style="width: 10%" scope="col">Nombre</th>
                        <th style="width: 10%" scope="col">Tipo de la solicitud</th>
                        <th style="width: 20%" scope="col">Correo</th>
                        <th style="width: 10%" scope="col">Teléfono</th>
                        <th style="width: 10%" scope="col">Detalle</th>
                        <th style="width: 10%" scope="col">Acción</th>

                    </thead>
                    <tbody>
                        @forelse ($user->solicitudes as $solicitud)

                        <tr>
                            @if ($solicitud->pivot->id == $idSol)
                            <th scope="row">
                                {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y") }}
                            </th>
                            <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                            <td>{{$user->rut}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$solicitud->tipo}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_telefono']}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_detalles']}}</td>
                          @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p>Sin solicitudes</p>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>











</div>
@endsection
