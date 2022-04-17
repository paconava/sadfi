<html>
    <head>
    	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 80px 80px;
            }
			.page-break {
			    page-break-after: always;
			}
			.row {
			  display: flex;
			}

			.column {
			  float: left;
			}

			.left {
			  width: 45%;
			}

			.right {
			  width: 45%;
			}
        </style>
    </head>
    <body>
        <div>
	        <img src="images/logos/unampdf.png" style="float:left; max-height: 120px;" alt="UNAM" title="UNAM">
	        <img src="images/logos/fipdf.png" style="float: right; max-height: 120px;" alt="Facultad de Ingeniería">
	        <center>
	        	<br>
	        	UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO<br>
	        	FACULTAD DE INGENIERÍA <br>
	        	SECRETARÍA DE APOYO A LA DOCENCIA <br>
	        	COORDINACIÓN DE EVALUACIÓN EDUCATIVA
	        </center>
        </div>
        <br>
        <div style="margin-top: 300px; margin-bottom: 300px; text-align: center; font-size: 25px;">
        	OPINIÓN DE LOS PROFESORES CON RESPECTO AL PROGRAMA DE ESTUDIOS DE LA ASIGNATURA:<br>
        	<b>{{$asignatura->nombre}}</b>
        </div>
        <div>
	        <img src="images/logos/autonomiapdf.png" style="float:left; max-height: 120px;" alt="Autonomía">
	        <img src="images/logos/unamnacionpdf.png" style="float: right; max-height: 120px;" alt="UNAM la universidad de la nación">
        </div>
        <div class="page-break"></div>
        <div style="text-align: center;">
        	Resultados por semestre:<br>
        	<img src="{{$chartImg}}" style="max-width: 100%;">
        </div>
        @foreach($semestres as $sem)
        <a href="#{{$sem->semestre}}">{{$sem->semestre}}</a><br>
        @endforeach
        @foreach($semestres as $sem)
        <div class="page-break"></div>
        <div style="text-align:center;margin-bottom: 20px;">
        	<a name="{{$sem->semestre}}" style="font-size: 25px;">Semestre {{$sem->semestre}}</a><br>
        </div>
				<table style="min-width: 100%;">
					<tbody>
						<tr>
							<td style="font-size: 20px; font-weight: bold; text-align:center;">
								Totalmente de acuerdo 
								@if($sem->pos_count == 1)
								({{$sem->pos_count}} respuesta)
								@else
								({{$sem->pos_count}} respuestas)
								@endif
							</td>
						</tr>
						<tr><hr></tr>
						@foreach($sem->pos_respuestas as $resp)
						<tr>
							<td>
								{{$resp->p15_just}}
							</td>
						</tr>
						<tr><hr></tr>
						@endforeach
					</tbody>
				</table>
				<div class="page-break"></div>
				<table style="min-width: 100%;">
					<tbody>
						<tr>
							<td style="font-size: 20px; font-weight: bold; text-align:center;">
								No totalmente de acuerdo 
								@if($sem->neg_count == 1)
								({{$sem->neg_count}} respuesta)
								@else
								({{$sem->neg_count}} respuestas)
								@endif
							</td>
						</tr>
						<tr><hr></tr>
						@foreach($sem->neg_respuestas as $resp)
						<tr>
							<td>
								{{$resp->p15_just}}
							</td>
						</tr>
						<tr><hr></tr>
						@endforeach
					</tbody>
				</table>
        @endforeach

    </body>
</html>