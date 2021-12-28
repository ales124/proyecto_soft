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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <form class="d-flex">
                <select name="buscartipo" class="form-control me-2" aria-label="Default select example" name="tipo" id="tipo">
                    <option value={{ null }}>Buscar por tipo</option>
                    <option value="1" @if (old('tipo')=="1") selected @endif>Solicitud de sobrecupo</option>
                    <option value="2" @if (old('tipo')=="2") selected @endif>Solicitud de cambio de paralelo</option>
                    <option value="3" @if (old('tipo')=="3") selected @endif>Solicitud de eliminación de asignatura</option>
                    <option value="4" @if (old('tipo')=="4") selected @endif>Solicitud de inscripción de asignatura</option>
                    <option value="5" @if (old('tipo')=="5") selected @endif>Solicitud de ayudantía</option>
                    <option value="6" @if (old('tipo')=="6") selected @endif>Solicitud de facilidades académicas</option>
                </select>
                <button class="btn btn-success" style="background-color: #003057;border-color:#003057; color:white" type="submit">Buscar</button>
                </form>

                <div class="d-flex">
                    <input name="buscarnumero" class="form-control me-2" type="search" placeholder="Buscar por número" aria-label="Search">
                    <button class="btn btn-success" style="background-color: #003057;border-color:#003057; color:white" type="submit">Buscar</button>
                </div>

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
                <th style="width: 10%" scope="col">Acción</th>
            </tr>
        </thead>
        {{-- {{ $solicitud->getOriginal()['pivot_update_at'] }}--}}




        <tbody>

            @foreach ($users as $user )




            @forelse ($user->solicitudes as $solicitud)


            <tr>

                @if ($solicitud->pivot->estado == 0 && $user->rol=="Alumno" && $user->carrera_id==$carrera_id)
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


            @empty
            <tr>
                <td colspan="5">
                    <p>No hay solicitudes ingresadas</p>
                </td>
            </tr>

            @endforelse

            @endforeach


            <td><a style="background-color: #bebebe; border-color:#020202; width: 4cm" class="btn btn-warning"href={{ url('verOtras/'.$user->carrera_id ) }}>Ver otras Solicitudes</a></td>



        </tbody>




    </table>
</div>
@endsection
