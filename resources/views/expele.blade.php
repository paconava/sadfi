@extends('layouts.app')

@section('content')
<h1>Expediente Electrónico</h1>
<center>
<hr>
@if(isset($data->acta_nacimiento))
<h2>Acta de Nacimiento</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,{{$data->acta_nacimiento->pdf}}" width="100%" height="600px"></iframe>
	</div>    
</div>
@endif
@if(isset($data->certificado))
<hr>
<h2>Certificado</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,{{$data->certificado->pdf}}" width="100%" height="600px"></iframe>
	</div>    
</div>
@endif
@if(isset($data->curp))
<hr>
<h2>CURP</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,{{$data->curp->pdf}}" width="100%" height="600px"></iframe>
	</div>    
</div>
@endif
@if(isset($data->boleta_credencial))
<hr>
<h2>Boleta credencial</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,{{$data->boleta_credencial->pdf}}" width="100%" height="600px"></iframe>
	</div>    
</div>
@endif
@if(!isset($data->boleta_credencial) && !isset($data->acta_nacimiento) && !isset($data->certificado) && !isset($data->curp))
<h3>El alumno está registrado pero no cuenta con documentos digitales.</h3>
@endif
</center>
@endsection
