@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row mb-4">
        <div class="col col-3">
            <a href="/carrera" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atrás') }}</a>
        </div>
    </div>


                <table class="table table-striped">
                    <thead>
                        <th style="width: 10%" scope="col">Fecha solicitud</th>
                        <th style="width: 10%" scope="col">Número solicitud</th>
                        <th style="width: 10%" scope="col">Rut</th>
                        <th style="width: 10%" scope="col">Nombre</th>
                        <th style="width: 10%" scope="col">Tipo de la solicitud</th>
                        <th style="width: 10%" scope="col">Correo</th>
                        <th style="width: 10%" scope="col">Teléfono</th>
                        <th style="width: 10%" scope="col">Detalle</th>
                        <th style="width: 10%" scope="col">Acción</th>

                    </thead>
                    <tbody>
                        @forelse ($user->solicitudes as $solicitud)

                        <tr>
                            @if ($solicitud->pivot->id == $idSol)
                            <th scope="row">
                                {{date_format(date_create($solicitud->getOriginal()['pivot_updated_at']),"d/m/Y") }}
                            </th>
                            <td>{{ $solicitud->getOriginal()['pivot_id'] }}</td>
                            <td>{{$user->rut}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$solicitud->tipo}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_telefono']}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_detalles']}}</td>


                            <td>
                                <form class="aceptar" method="POST" action="{{route('aceptar')}}">
                                    @csrf
                                    <input type="text" value="{{$solicitud->getOriginal()['pivot_id']  }}" name="id_solicitud" hidden>
                                    <input type="text" value="{{$user->id}}" name="id" hidden>
                                    <button type="sumbit" class="btn btn-info anular"
                                        style="color: white; background-color: grey; border-color:grey">Aceptar</button>
                                </form>
                            </td>
                            <td>
                                <form class="aceptar2" method="POST" action="{{route('aceptar2')}}">
                                    @csrf
                                        <button class="btn btn-outline-secondary" type="sumbit"  style="color: white; background-color: grey; border-color:grey">Aceptar/Observaciones</button>
                                        <input name="observacion" type="text" class="form-control" placeholder="escriba comentarios" aria-label="Example text with button addon" aria-describedby="button-addon1" value="">
                                        <input type="text" value="{{$solicitud->getOriginal()['pivot_id']  }}" name="id_solicitud" hidden>
                                        <input type="text" value="{{$user->id}}" name="id" hidden>
                                </form>
                            </td>
                            <td>
                                <form class="rechazar" method="POST" action="{{route('rechazar')}}">
                                    @csrf
                                    <button class="btn btn-outline-secondary" type="sumbit"  style="color: white; background-color: grey; border-color:grey">Rechazar/Observaciones</button>
                                    <input name="observacion" type="text" class="form-control" placeholder="escriba comentarios" aria-label="Example text with button addon" aria-describedby="button-addon1" value="">
                                    <input type="text" value="{{$solicitud->getOriginal()['pivot_id']  }}" name="id_solicitud" hidden>
                                    <input type="text" value="{{$user->id}}" name="id" hidden>
                                </form>
                            </td>



                          @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p>Sin solicitudes</p>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>












</div>
@endsection
