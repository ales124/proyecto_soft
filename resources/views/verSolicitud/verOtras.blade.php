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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <form class="d-flex">

                <select name="seleccionar" class="form-control me-2" aria-label="Default select example">
                    <option selected>Buscar por...</option>
                    <option value="1">Buscar por número</option>
                    <option value="2">Buscar por tipo</option>

                </select>

                <input name="buscarpor" class="form-control me-2" type="search" placeholder="Ingresa el dato" aria-label="Search">



                <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>
            </div>
        </nav>
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

            @foreach ($users as $user )




            @forelse ($user->solicitudes as $solicitud)


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


            @empty
            <tr>
                <td colspan="5">
                    <p>No hay solicitudes ingresadas</p>
                </td>
            </tr>

            @endforelse

            @endforeach






        </tbody>




    </table>
</div>
@endsection
