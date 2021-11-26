@extends('layouts.app')

@section('content')


@if(session()->has('failures'))
<div class="alert alert-danger">
    El archivo se subió con {{count(session()->get('failures'))}} problemas:<br>
  <ul id= "problemas" style="display:none" >
  <br>
    @foreach(session()->get('failures') as $validation)
        @foreach($validation->errors() as $error)
            <li>{{ $error }} en la fila {{ $validation->row() }} del archivo.</li>
        @endforeach
    @endforeach
  </ul>
  <br>
<button class="delete btn btn-danger btn-sm" id="vermas" onClick="ver" style="display:block"> Ver más </button>
<button class="delete btn btn-danger btn-sm" id="vermenos" onClick="ver" style="display:none"> Ver menos </button>
</div>
@endif


<form  method="post" action="{{route('cargaMasiva')}}" enctype="multipart/form-data">
    @csrf
    @if (Session::has('message'))
    <p>{{Session::get('message')}}</p>
        @endif

                 <input type="file" id="adjunto" name="file" >
    <div>
      <button>Subir</button>
    </div>
   </form>







@endsection
