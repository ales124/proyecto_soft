@extends('layouts.app')

@section('content')


<form  method="post" action="{{route('cargaMasiva')}}" enctype="multipart/form-data" name="adjunto">
    @csrf
    @if (Session::has('message'))
    <p>{{Session::get('message')}}</p>
        @endif

                 <input type="file" id="adjunto" name="file" >
    <div>
      <button>Subir</button>
    </div>
   </form>



   @if($nuevos)
    <h1 class="table-white">Alumnos agregados</h1>
    <table class="table table-dark">
        <thead>
            <tr>

                <th scope="col">Fila</th>
                <th scope="col">Nombre Alumno</th>

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
</div>

 @if($erorres)
    <h1 class="table-white">Alumnos no agregados</h1>
    <table class="table table-red">
        <thead>
            <tr>

                <th scope="col">Fila</th>
                <th scope="col">Nombre Alumno</th>

            </tr>


        </thead>
        <tbody>
            @foreach ($errores as $key=>$value )
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
