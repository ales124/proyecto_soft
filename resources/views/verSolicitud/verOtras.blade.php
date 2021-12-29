@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="/carrera" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
        </div>

        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Otras Solicitudes</p>
        </div>


    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Fecha solicitud</th>
                <th style="width: 10%" scope="col">Número solicitud</th>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 10%" scope="col">Nombre</th>
                <th style="width: 10%" scope="col">Tipo de la solicitud</th>
                <th style="width: 10%" scope="col">Estado</th>
            </tr>
        </thead>
        {{-- {{ $solicitud->getOriginal()['pivot_update_at'] }}--}}




        <tbody>

            @forelse ($users as $user )




            @foreach ($user->solicitudes as $solicitud)


            <tr>

                @if ($solicitud->pivot->estado != 0 && $user->rol=="Alumno" && $user->carrera_id==$carrera_id)
                <th scope="row">
                    {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y H:i:s") }}
                </th>
                <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                <td>{{$user->rut}}</td>
                <td>{{$user->name}}</td>
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
                @case(4)
                <td>
                    <div class="alert alert-danger" role="alert">
                        Anulado
                    </div>
                </td>
                @break

                @default

                @endswitch




                @endif

            </tr>




            @endforeach


            @empty
                <tr>
                    <td colspan = "6">
                        <p>No hay solicitudes por resolver.</p>
                    </td>
                </tr>



            @endforelse






        </tbody>




    </table>
</div>
@endsection
