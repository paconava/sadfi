@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Catálogo de cuestionario SIVACORE</h1>
	<hr>
	<h2>Generación </h2>
	<div class="row">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>

	<script>
	window.onload = function () {

	var chart = new CanvasJS.Chart("chartContainer", {
		title: {
			text: "Generación vs Generación"
		},
		axisY2: {
			title: "Cantidad"	},
		toolTip: {
			shared: true
		},
		legend: {
			cursor: "pointer",
			verticalAlign: "top",
			horizontalAlign: "center",
			dockInsidePlotArea: true,
			itemclick: toogleDataSeries
		},
		data: [{
			type:"line",
			axisYType: "secondary",
			name: "Generación 1",
			showInLegend: true,
			markerSize: 0,
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "line",
			axisYType: "secondary",
			name: "Generación 2",
			showInLegend: true,
			markerSize: 0,
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();

	function toogleDataSeries(e){
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else{
			e.dataSeries.visible = true;
		}
		chart.render();
	}

	}
	</script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
@endsection
