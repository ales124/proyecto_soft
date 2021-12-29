@extends('layouts.app')

@section('content')
<div class="col-lg-12 py-3">
    <div class="col-lg-12 text-center">
        @if (session('error'))
   <div class="alert alert-danger">
        {{ session('error') }}
   </div>
@endif
    </div>
</div>
<div class="container">
    <h1 style="font-size: 50px" class="text-center">Estadísticas del sistema</h1>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card h-100" style="width: 1100px; height:500px;">
                <div class="card-body">
                    <div id="chartContainerTipo" style="width: 1050px; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h1>La cantidad de solicitudes dentro del rango seleccionado es: {{$cantRango}}</h1>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">{{ __('Solicitudes por estado') }}</div>
        <div class="card-body">
           <div class="row justify-content-center">
            <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Estado "Pendiente":</div>
                <div class="card-body text-dark">
                  <p class="card-text">La cantidad de solicidtudes estado "Pendiente": {{($totalPendiente)}}</p>
                  <p class="card-text">Porcentaje: {{($PerctotalPendiente)}}%</p>
                </div>
              </div>
              <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Estado "Rechazada":</div>
                <div class="card-body text-dark">
                  <p class="card-text">La cantidad de solicidtudes estado "Rechazado": {{($totalRechazada)}}</p>
                  <p class="card-text">Porcentaje: {{($PerctotalRechazada)}}%</p>
                </div>
              </div>
              <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Estado "Aceptada":</div>
                <div class="card-body text-dark">
                  <p class="card-text">La cantidad de solicitudes estado "Aceptado": {{($totalAceptada)}}</p>
                  <p class="card-text">Porcentaje: {{($PerctotalAceptada)}}%</p>
                </div>
              </div>
              <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Estado "Aceptada con obs.":</div>
                <div class="card-body text-dark">
                  <p class="card-text">La cantidad de solicitudes estado "Aceptado con Observaciones": {{($totalAceptadaObs)}}</p>
                  <p class="card-text">Porcentaje: {{($PerctotalAceptadaObs)}}%</p>
                </div>
            </div>

            <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">Estado "Anulada":</div>
                    <div class="card-body text-dark">
                        <p class="card-text">La cantidad de solicitudes estado "Anulado": {{($totalAnulada)}}</p>
                        <p class="card-text">Porcentaje: {{($PerctotalAnulada)}}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class= "col-lg-12 login-form">
    <div class = "col-lg-12 login-form">
        <form id="formulario" method="POST" action=""
        enctype="multipart/form-data">
        @csrf
        <div class= "container">
            <p class="text">Desde</p>
            <input type="date" id="prueba1" class="form-control @error('Tipo') is-invalid @enderror" name="prueba1"
            value="{{ old('Tipo')}}" autocomplete="numero" autofocus>

            @error('numero')
            <span class="invalid-feedback" role="alert">
                <strong> {{$message}}</strong>
            </span>
            @enderror
        </div>
        <div class= "container">
            <p class="text">Hasta</p>
            <input type="date" id="prueba2" class="form-control @error('Tipo2') is-invalid @enderror" name="prueba2"
            value="{{ old('Tipo2')}}" autocomplete="numero" autofocus>

            @error('numero')
            <span class="invalid-feedback" role="alert">
                <strong> {{$message}}</strong>
            </span>
            @enderror
        </div>

          <div class="col-lg-12 py-3">
            <div class="col-lg-12 text-center">
                <button style="background-color: #003057;border-color:#003057; color:white" id="buttom" class="btn btn-outline-primary">{{ __('Filtrar') }}</button>
            </div>
         </div>
        </form>
<script>
    var chart = new CanvasJS.Chart("chartContainerTipo", {
    animationEnabled: true,
    theme: "light1",
    title:{
    text: "Solicitudes por tipo"
    },
    axisY: {
    title: "Cantidad de solicitudes"
    },
    data: [{
    type: "column",
    showInLegend: false,
    legendMarkerColor: "grey",

    legendText: "MMbbl = one million barrels",
    indexLabel: "{y}",
    dataPoints: [
    { y: JSON.parse("{{json_encode($cantTipo1)}}"), label: "Sobrecupo" },
    { y: JSON.parse("{{json_encode($cantTipo2)}}"), label: "Cambio" },
    { y: JSON.parse("{{json_encode($cantTipo3)}}"), label: "Eliminación" },
    { y: JSON.parse("{{json_encode($cantTipo4)}}"), label: "Inscripción" },
    { y: JSON.parse("{{json_encode($cantTipo5)}}"), label: "Ayudantía" },
    { y: JSON.parse("{{json_encode($cantTipo6)}}"), label: "Facilidades" },
    ]
    }]
    });
    chart.render();
</script>

@endsection
