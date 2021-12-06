@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fas fa-users"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Buscar estudiante (Ejemplo: 12345678k)
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form id="formulario"
                            method="POST"
                            action="{{ route('postBuscarEstudiante') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">RUT</label>
                                <input id="rut"
                                    placeholder="Sin puntos ni guión"
                                    type="text"
                                    class="form-control @error('rut') is-invalid @enderror"
                                    name="rut"
                                    value="{{ old('rut') }}"
                                    required
                                    autocomplete="rut"
                                    autofocus>

                                @error('rut')
                                    <span class="invalid-feedback"
                                        role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 py-3">
                                <div class="col-lg-12 text-center">
                                    <button id="boton" style="background-color: #003057;border-color:#003057; color:white"
                                        class="btn btn-outline-primary">{{ __('Buscar') }}</button>
                                </div>
                            </div>
                            <div class="col-lg-12 py-3">
                                <div class="col-lg-12 text-center">
                                    <a href="http://127.0.0.1:8000/home" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
@endsection
