@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                <h5 class="card-title">Descripción de roles del sistema UCN</h5>
                <p class="card-text">Cada interacción del sistema en general, responde bajo a ciertas condiciones que el rol asignado le permite acceder.
                    Por ejemplo: </p>
                <div class="container">
                    <h5 class="card-title">Administrador</h5>
                    <p class="card-text">Corresponde al administrador general del sistema.
                        Su cuenta debe existir desde el momento de la entrega del sistema.
                        Tiene acceso a todas las funcionalidades del sistema, pero no puede realizar solicitudes ni resolverlas. </p>
                    <h5 class="card-title">Jefe de Carrera</h5>
                    <p class="card-text">Corresponde al Jefe de Carrera encargado de resolver las solicitudes de los estudiantes y visualizar estadísticas de su propia carrera asignada.</p>
                    <h5 class="card-title">Estudiante</h5>
                    <p class="card-text">Estudiante de una carrera, quien puede realizar distintos tipos de solicitudes de su carrera a su Jefe de Carrera.</p>
                    <div class="container">
                    </div>
                </div>
                <div class="col-lg-12 py-3">
                    <div class="col-lg-12 text-center">
                        <div class="col-lg-3 col-md-2"></div>
                    </div>
                </div>
        </div>
        <div class="col-lg-12 py-3">
            <div class="col-lg-12 text-center">
                <a href="/help" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Volver') }}</a>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="col-lg-3 col-md-2"></div>
</div>
</div>

@endsection
