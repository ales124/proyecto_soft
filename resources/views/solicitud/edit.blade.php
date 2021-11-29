@extends('layouts.app')

@section('content')
@if (Auth::user()->rol == 'Alumno')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="col-lg-12 login-title">
                EDITAR SOLICITUD
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST" action="{{ route('solicitud.update', [$solicitud]) }}">

                        @if ($solicitud->tipo == 'Sobrecupo')
                            <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value="{{ $solicitud->tipo }}" required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                        @elseif ($solicitud->tipo == 'Cambio de paralelo')

                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value="{{ $solicitud->tipo }}" required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                        @elseif ($solicitud->tipo == 'Eliminacion Asignatura')

                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value="{{ $solicitud->tipo }}" required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                        @elseif ($solicitud->tipo == 'Inscripcion Asignatura')
                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value="{{ $solicitud->tipo }}" required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>




                        @elseif ($solicitud->tipo == 'Ayudantia')

                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">CALIFICACION DE APROBACION</label>
                                <input id="calificacion" type="text" class="form-control @error('calificacion') is-invalid @enderror"
                                    name="calificacion" value="{{ $solicitud->tipo }}" required>

                                @error('calificacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">CANTIDAD DE AYUDANTIAS REALIZADAS</label>
                                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror"
                                    name="cantidad" value="{{ $solicitud->tipo }}" required>

                                @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>





                        @else

                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->tipo }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->tipo }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->tipo }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>




                                TIPO DE FACILIDAD

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DEL PROFESOR</label>
                                <input id="profesor" type="text" class="form-control @error('profesor') is-invalid @enderror"
                                    name="profesor" value="{{ $solicitud->tipo }}" required>

                                @error('profesor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                                ADJUNTAR ARCHIVO


                        @endif



                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
@else
@php
header("Location: /home" );
exit();
@endphp
@endif
@endsection
