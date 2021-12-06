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
                    <form id="formulario" method="POST" action="{{ route('solicitud.update', [$solicitud]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="user" value={{Auth::user()->id}} hidden>
                        <input type="text" name="id_solicitud" id="id_solicitud" value={{$solicitud->getOriginal()['pivot_id']}} hidden>
                        @if ($solicitud->tipo == 'Sobrecupo')
                            <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->getOriginal()['pivot_telefono'] }}" required
                                    autocomplete="telefono" autofocus>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value=@if($solicitud->getOriginal()['pivot_NRC'])
                                    {{ $solicitud->getOriginal()['pivot_NRC'] }} @endif required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->getOriginal()['pivot_detalles'] }}" required>

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
                                    name="telefono" value="{{ $solicitud->getOriginal()['pivot_telefono'] }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value=@if($solicitud->getOriginal()['pivot_NRC'])
                                    {{ $solicitud->getOriginal()['pivot_NRC'] }} @endif required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{$solicitud->getOriginal()['pivot_detalles']}}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                        @elseif ($solicitud->tipo == 'Eliminación asignatura')

                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->getOriginal()['pivot_telefono'] }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value=@if($solicitud->getOriginal()['pivot_NRC'])
                                    {{ $solicitud->getOriginal()['pivot_NRC'] }} @endif required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{$solicitud->getOriginal()['pivot_detalles']}}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        @elseif ($solicitud->tipo == 'Inscripción asignatura')
                        <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{$solicitud->getOriginal()['pivot_telefono']}}" autocomplete="telefono"
                                    autofocus>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NRC DE LA ASIGNATURA</label>
                                <input id="nrc" type="text" class="form-control @error('nrc') is-invalid @enderror"
                                    name="nrc" value=@if($solicitud->getOriginal()['pivot_NRC'])
                                    {{ $solicitud->getOriginal()['pivot_NRC'] }} @endif required>

                                @error('nrc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->getOriginal()['pivot_detalles'] }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>




                        @elseif ($solicitud->tipo == 'Ayudantía')

                            <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->getOriginal()['pivot_telefono'] }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->getOriginal()['pivot_detalles'] }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">CALIFICACION DE APROBACION</label>
                                <input id="calificacion" type="text" class="form-control @error('calificacion') is-invalid @enderror"
                                    name="calificacion" value="{{ $solicitud->getOriginal()['pivot_calificacion_aprob'] }}" required>

                                @error('calificacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">CANTIDAD DE AYUDANTIAS REALIZADAS</label>
                                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror"
                                    name="cantidad" value="{{ $solicitud->getOriginal()['pivot_cant_ayudantias'] }}" required>

                                @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        @elseif ($solicitud->tipo == 'Facilidades')

                            <div class="form-group">
                                <label class="form-control-label">TELEFONO DE CONTACTO</label>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror"
                                    name="telefono" value="{{ $solicitud->getOriginal()['pivot_telefono'] }}" required>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DE LA ASIGNATURA</label>
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    name="nombre" value="{{ $solicitud->getOriginal()['pivot_nombre_asignatura'] }}" required>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">DETALLES DE LA SOLICITUD</label>
                                <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror"
                                    name="detalle" value="{{ $solicitud->getOriginal()['pivot_detalles'] }}" required>

                                @error('detalle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group" id="groupTipoFacilidad">
                                <label for="form-control-label" style="color: black">TIPO DE FACILIDAD</label>
                                <select class="form-control" name="facilidad" id="facilidad">
                                    <option value={{ null }}>Seleccione..</option>
                                    <option value="Licencia">Licencia Médica o Certificado Médico</option>
                                    <option value="Inasistencia Fuerza Mayor">Inasistencia por Fuerza Mayor</option>
                                    <option value="Representacion">Representación de la Universidad</option>
                                    <option value="Inasistencia Motivo Personal">Inasistencia a Clases por Motivos
                                        Familiares</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">NOMBRE DEL PROFESOR</label>
                                <input id="profesor" type="text" class="form-control @error('profesor') is-invalid @enderror"
                                    name="profesor" value="{{ $solicitud->getOriginal()['pivot_nombre_profesor'] }}" required>

                                @error('profesor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group" id="groupAdjunto">
                                <label class="form-control-label">ADJUNTAR ARCHIVO</label>
                                <input id="adjunto" type="file" class="form-control @error('adjunto') is-invalid @enderror"
                                    name="adjunto[]" max="3" multiple>

                                @error('adjunto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        @endif


                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit" style="background-color: #003057;border-color:#003057; color:white" class="btn btn-outline-primary">{{ __('Actualizar') }}</button>
                            </div>
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <a href="http://127.0.0.1:8000/solicitud" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
                            </div>
                        </div>

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
