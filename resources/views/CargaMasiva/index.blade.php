@extends('layouts.app')

@section('content')


<form  method="post" style="text-align: center;" action="{{route('cargaMasiva')}}" enctype="multipart/form-data" name="adjunto">
    @csrf
    @if (Session::has('message'))
    <p>{{Session::get('message')}}</p>
        @endif
            <div class="col-lg-12 py-3">
                <div class="col-lg-12 text-left">
                    <a href="http://127.0.0.1:8000/home" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Atras') }}</a>
                </div>
            </div>
    <input type="file" id="adjunto" name="file" >
    <div style="text-align: center;">
      <button>Subir</button>
    </div>
</form>

   @if($nuevos)
    <h1 class="table-white">Estudiantes agregados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NRC</th>
                <th scope="col">Nombre estudiante</th>
                <th scope="col">Rut</th>
                <th scope="col">E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nuevos as $key=>$value )
            <tr>
                <td class= "table-succes text-black">{{$key}}</td>
                <td class= "table-succes text-black">{{$value->name}}</td>
                <td class= "table-succes text-black">{{$value->rut}}</td>
                <td class= "table-succes text-black">{{$value->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if ($eliminados)
    <h1 claas="text-white">Estudiantes no agregados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NRC</th>
                <th scope="col">Nombre estudiante</th>
                <th scope="col">Rut</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eliminados as $key => $value)
            @if ($value)
            <tr>
                <td class="table_danger text-black">{{$key}}</td>
                @foreach ($value as $newKey => $error)
                <td class="table-danger text-black">{{$error[0]}}</td>
                @endforeach
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endif

   </div>







@endsection
