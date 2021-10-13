@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == "Administrador")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center" style = "color:red">Administrar usuarios</h5>
                    <small class="text-muted">Permite o crear/editar/deshabilitar usuarios del sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/usuario" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar Carreras</h5>
                    <small class="text-muted">Permite crear y/o editar carreras en el sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->rol == "Jefe de Carrera")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Carga masiva de estudiantes</h5>
                    <small class="text-muted">Permite realizar una carga masiva de estudiantes al sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-search fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Buscar estudiante</h5>
                    <small class="text-muted">Permite buscar un estudiante mediante su RUT.</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-check-double fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Resolver solicitudes</h5>
                    <small class="text-muted">Permite visualizar todas las solicitudes de caracter "Pendiente".</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-info fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Estadísticas del sistema</h5>
                    <small class="text-muted">Permite visualizar mediante gráficos las distintas solicitudes del sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->rol == "Alumno")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-tasks fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Gestión de solicitudes</h5>
                    <small class="text-muted">Permite o crear/editar/anular solicitudes especiales.</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
