@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="/carrera" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
        </div>
        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Solicitudes</p>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 15%" scope="col">Fecha de la solicitud</th>
                <th style="width: 20%" scope="col">Número de la solicitud</th>
                <th style="width: 20%" scope="col">Rut</th>
                <th style="width: 30%" scope="col">Tipo de la solicitud</th>
                <th style="width: 20%" scope="col">Nombre</th>
                <th style="width: 10%" scope="col">Acción</th>
            </tr>
        </thead>
        {{-- {{ $solicitud->getOriginal()['pivot_update_at'] }}--}}




        <tbody>
            @forelse ($user->solicitudes as $solicitud)


            <tr>
                @if ($solicitud->pivot->estado != 0)
                <th scope="row">
                    {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y H:i:s") }}
                </th>
                <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                <td>{{$user->rut}}</td>
                <td>{{$solicitud->tipo}}</td>
                <td>{{$user->name}}</td>
                <td><a style="background-color: #003057;border-color:#003057; color:white" class="btn btn-info" href= "" >Ver</a></td>
                @endif

        </tr>

                @if ($solicitud->pivot->estado == 0)

                @endif



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
