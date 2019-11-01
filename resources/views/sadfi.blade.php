@extends('layouts.app')

@section('content')
<h1>Catálogo de cuestionario SIVACORE</h1>
<hr>
<h2>Generación {{substr($gen,0,4).'-'.$gen[4]}}</h2>
<h3>Total: {{$total}}</h3>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div id="chartContainer1" style="height: 370px; width: 100%;"></div>        
	</div>   
	<div class="col-md-10 col-md-offset-1">
		<div id="chartContainer2" style="height: 370px; width: 100%;"></div>        
	</div>
</div>
<script>
	window.onload = function () {
		var chart1 = new CanvasJS.Chart("chartContainer1", {
			title: {
				text: "Nivel de estudios padre"
			},
			axisY: {
				title: "Cantidad"
			},
			data: [{
				type: "line",
				dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
			}]
		});
		var chart2 = new CanvasJS.Chart("chartContainer2", {
			title: {
				text: "Nivel de estudios madre"
			},
			axisY: {
				title: "Cantidad"
			},
			data: [{
				type: "line",
				dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart1.render();
		chart2.render();
	}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
