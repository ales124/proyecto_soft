@extends('layouts.app')

@section('content')


@if (session('success'))
   <div class="alert alert-success">
        {{ session('success') }}
   </div>

@endif


@if (session('error'))
   <div class="alert alert-danger">
        {{ session('error') }}
   </div>
@endif

<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="/carrera" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
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
                <th style="width: 10%" scope="col">Acción</th>
            </tr>
        </thead>
        {{-- {{ $solicitud->getOriginal()['pivot_update_at'] }}--}}
        <tbody>
            @forelse ($solicitudes as $solicitud)
            <tr>
                <th scope="row">
                    {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y H:i:s") }}
                </th>
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
                @case(4)
                <td>
                    <div class="alert alert-danger" role="alert">
                        Anulado
                    </div>
                </td>
                @break

                @default

                @endswitch
                @if ($solicitud->pivot->estado == 0)
                <td><a class="btn btn-info" style="color: white; background-color: grey; border-color:grey" href={{ route('solicitud.edit', [ $solicitud->pivot->id]) }}>Editar</a></td>
                <td>
                    <form class="anularr" method="POST" action="{{route('anular')}}">
                        @csrf
                        <input type="text" value="{{$solicitud->getOriginal()['pivot_id'] }}" name="id" hidden>
                        <button type="sumbit" class="btn btn-info anular"
                            style="color: white; background-color: grey; border-color:grey">Anular</button>
                    </form>
                </td>
                @endif


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

<script>
    const solicitudSelect = document.getElementById('solicitud');
    const listaSolicitudes = {!! json_encode($solicitudes) !!}
                console.log(listaSolicitudes);
                if (listaSolicitudes.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        text: 'No hay solicitudes ingresadas',
                        footer: 'Para crear una solicitud haz&nbsp;<a href="/solicitud/create">click aquí</a>'
                    }).then((result) => {
                        window.location.href = '/home'
                    })
                }

    const button = document.getElementsByClassName('anular');
    const form = document.getElementsByClassName('anularr');

    for(let i=0; i< button.length; i++){
        button[i].addEventListener('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Está seguro que desea anular la solicitud?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sí',
                denyButtonText: 'No',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
             if (result.isConfirmed) {
                form[i].submit();
            } else if (result.isDenied) {
                Swal.fire('No guardado', '', 'info')
             }
            })
        })
    }

</script>



@endsection
