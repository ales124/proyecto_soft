@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="http://127.0.0.1:8000/carrera" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atras') }}</a>
        </div>
        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Mis solicitudes</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href="solicitud/create"> <i class="fas fa-plus"></i> + Nueva solicitud</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 15%" scope="col">Fecha de la solicitud</th>
                <th style="width: 20%" scope="col">Número de la solicitud</th>
                <th style="width: 30%" scope="col">Tipo de la solicitud</th>
                <th style="width: 20%" scope="col">Estado</th>
                <th style="width: 10%" scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($solicitudes as $solicitud)
            <tr>
                <th scope="row">{{ $solicitud->getOriginal()['pivot_updated_at'] }}</th>
                <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                <td>{{$solicitud->tipo}}</td>
                @switch($solicitud->getOriginal()['pivot_estado'])
                @case(0)
                <td>
                    <div class="alert alert-warning" role="alert">
                        Pendiente
                    </div>
                </td>
                @break
                @case(1)
                <td>
                    <div class="alert alert-success" role="alert">
                        Aceptada
                    </div>
                </td>
                @break
                @case(2)
                <td>
                    <div class="alert alert-success" role="alert">
                        Aceptada con observaciones
                    </div>
                </td>
                @break
                @case(3)
                <td>
                    <div class="alert alert-danger" role="alert">
                        Rechazada
                    </div>
                </td>
                @break

                @default

                @endswitch

                <td><a class="btn btn-info" style="color: white; background-color: grey; border-color:grey" href={{ route('solicitud.edit', [$solicitud]) }}>Editar</a></td>

            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <p>No hay solicitudes ingresadas</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection