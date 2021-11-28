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







@endsection
