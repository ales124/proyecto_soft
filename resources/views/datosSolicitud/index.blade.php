@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
    </div>
</div>
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 login-box">
            <div class="login-title" style="margin-left: 53%">Solicitud Nº {{$solicitud->getOriginal()['pivot_id']}}</div>
            <div class="row">
                <div class="col-6">
                    <div class="row-12">
                        <div class="col-lg-12 login-key">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="row-12">
                        <div class="col-lg-12 mt-4 text-light login-title" style="margin-right: 50%">
                            Tipo:
                            {{ $solicitud->getOriginal()['tipo'] }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <table class="table table-striped">

                        <tbody>
                            <tr>
                                <td>Telefono:</td>
                                <td>{{ $solicitud->getOriginal()['pivot_telefono'] }}</td>
                            </tr>
                            <tr>
                                <td>NRC:</td>
                                <td>{{ $solicitud->getOriginal()['pivot_NRC'] }}</td>
                            </tr>
                            <tr>
                                <td>Asignatura:</td>
                                <td>{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}</td>
                            </tr>
                            <tr>
                                <td>Detalles:</td>
                                <td>{{ $solicitud->getOriginal()['pivot_detalles'] }}</td>
                            </tr>
                            <tr>
                                <td>Archivos:</td>
                                <td>
                                    @if ($solicitud->getOriginal()['pivot_archivos'])
                                    @foreach (json_decode($solicitud->getOriginal()['pivot_archivos']) as $file)
                                    <a href={{"/storage/docs/".$file}}>Archivo</a>
                                    @endforeach

                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

</div>


@endsection
