@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 'Administrador')
<div class="container">
    <div class="row mb-3">
        <div class="col col-2">
            <form method="GET" action="{{ route('usuario.index') }}">
                <div class="col-lg-12 py-3">
                    <div class="col col-2">
                        <a href="http://127.0.0.1:8000/home" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atras') }}</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-deck">
                        <i class="fas fa-users fa-10x text-center"></i>
                        <div class="card-body">
                             <h5 class="card-title text-center">Deshabilitar Usuario</h5>
                             <input  class="form-control mr-2"size="12" type="text" name="search" id="search" placeholder="Buscar por Rut">
                             <button class="btn btn-success">Buscar</button>
                        </div>
                    </div>
                 </div>

            </form>
        </div>
        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Administración de Usuarios</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href={{ route('usuario.create') }}> <i class="fas fa-plus"></i>Agregar Usuario</a>
        </div>
    </div>
    <table class="table table-white">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 20%" scope="col">Fecha/Hora Creacion</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Correo</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 20%" scope="col" colspan="3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->rut}}</th>
                <td>{{$usuario->created_at}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol}}</td>

                @if ($usuario->status === 1)
                    <td><a class="btn btn-warning" href={{ route('changeStatus', ['id' => $usuario]) }}>Deshabilitar</a></td>
                @else
                    <td><a class="btn btn-info" href={{ route('changeStatus', ['id' => $usuario]) }}>Habilitar</a></td>
                @endif

                <td><a class="btn btn-dark" href={{ route('resetPassword', ['id' => $usuario]) }}>Reiniciar clave</a></td>


        </tr>
            @endforeach
        </tbody>
    </table>
    @if ($usuarios->links())
        <div class="d-flex justify-content-center">
            {!! $usuarios->links() !!}
        </div>
    @endif

</div>

@else
@php
header("Location: /home" );
exit();
@endphp
@endif


@endsection
