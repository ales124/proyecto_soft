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
        <div class="card">
            <div class="card-deck">
                <i class="fas fa-users fa-10x text-center"></i>
                <div class="card-body">
                     <h5 class="card-title text-center">Filtrar por número</h5>
                     <input  class="form-control mr-2"size="12" type="text" name="search" id="search" placeholder="Ingresar número">
                     <button class="btn btn-success">Buscar</button>
                     <button href="/usuario" style="background-color: #003057;border-color:#003057; color:white" class="btn btn-primary">Volver</button>
                </div>
            </div>
         </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Fecha solicitud</th>
                <th style="width: 10%" scope="col">Número solicitud</th>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 10%" scope="col">Nombre</th>
                <th style="width: 10%" scope="col">Tipo de la solicitud</th>
                <th style="width: 10%" scope="col">Acción</th>
            </tr>
        </thead>
        {{-- {{ $solicitud->getOriginal()['pivot_update_at'] }}--}}




        <tbody>
            @forelse ($user->solicitudes as $solicitud)


            <tr>
                @if ($solicitud->pivot->estado == 0)
                <th scope="row">
                    {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y H:i:s") }}
                </th>
                <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                <td>{{$user->rut}}</td>
                <td>{{$user->name}}</td>
                <td>{{$solicitud->tipo}}</td>

                <td><a style="background-color: #003057;border-color:#003057; color:white" class="btn btn-info" href= {{ url('ver/'.$user->rut.'/'. $solicitud->getOriginal()['pivot_id'] ) }}  >Ver</a></td>
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
