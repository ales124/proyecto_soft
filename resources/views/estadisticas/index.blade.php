@extends('layouts.app')

@section('content')

<div class="container">
    <input type="date">
    <h1 style="font-size: 50px" class="text-center">Estadísticas del sistema</h1>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card h-100" style="width: 1150px; height:500px;">
                <div class="card-body">
                    <div id="chartContainerTipo" style="width: 1100px; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card h-100" style="width: 1150px; height:500px;">
                <div class="card-body">
                    <div id="chartContainerStatus" style="width: 1100px; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var chart = new CanvasJS.Chart("chartContainerTipo", {
    animationEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
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
    var chart2 = new CanvasJS.Chart("chartContainerStatus", {
    animationEnabled: true,
    title:{
    text: "Solicitudes por estado",
    },
    axisY: {
		suffix: "%"
	},
	data: [
		{
			type: "stackedColumn",
			indexLabel: "{y}",
            yValueFormatString: "#,##0\"%\"",
			toolTipContent: "{y}",
    dataPoints: [
    { y: JSON.parse("{{json_encode($totalPendiente)}}"), label: "Pendiente" },
    { y: JSON.parse("{{json_encode($totalRechazada)}}"), label: "Rechazada" },
    { y: JSON.parse("{{json_encode($totalAceptada)}}"), label: "Aceptada" },
    { y: JSON.parse("{{json_encode($totalAceptadaObs)}}"), label: "Aceptada con obs." },
    { y: JSON.parse("{{json_encode($totalAnulada)}}"), label: "Anulada" },
    ]
    }]
    });
    chart.render();
    chart2.render();
</script>

@endsection
