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
    <h1 class="table-white">Alumnos agregados</h1>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Fila</th>
                <th scope="col">Nombre estudiante</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nuevos as $key=>$value )
            <tr>
                <td class= "table-succes text-black">{{$key}}</td>
                <td class= "table-succes text-black">{{$value->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
   </div>







@endsection
