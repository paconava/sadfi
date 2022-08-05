@extends('layouts.app')

@section('content')
<div class="container" style="text-align:justify;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Información Sociodemográfica de los alumnos de nuevo ingreso de la 
                Facultad de Ingeniería</h2>
            
                Objetivo:<br>
                <br>
                Identificar las características del alumno, desde el punto de vista académico y 
                socioeconómico. Con el fin de obtener una visión real del perfil con el que 
                ingresa y prever cual sería, entre otras, su rendimiento y desarrollo escolar.<br>
                <br>
                Alcances:<br>
                <br>
                <div style="margin-left:25px">
                    <ul>
                        <li>Generar una base de datos confiable, con información sobre antecedentes escolares y situación socioeconómica de los alumnos de nuevo ingreso de cada generación.</li>
                        <li>Identificar a los alumnos en riesgo de fracaso escolar (deserción, rezago, eficiencia terminal, etc.)</li>
                        <li>Proponer los programas adecuados para su atención.</li>
                        <li>Informar a cada División o Unidad responsable sobre el perfil de ingreso de sus alumnos, por carrera.</li>
                    </ul>
                </div>
            <div align="center">
                <h3>Informe por generación:</h3>
                <form class="form-group" method="POST" action="{{ route('reporte_sivacore') }}">
                {!! csrf_field() !!}
                    <select name="generacion" class="form-control" style="width:250px;">
                        <option value="" selected>-- Seleccione una opción --</option>
                        <option value="20101">2010-1</option>
                        <option value="20111">2011-1</option>
                        <option value="20121">2012-1</option>
                        <option value="20131">2013-1</option>
                        <option value="20141">2014-1</option>
                        <option value="20151">2015-1</option>
                        <option value="20161">2016-1</option>
                        <option value="20171">2017-1</option>
                        <option value="20181">2018-1</option>
                        <option value="20191">2019-1</option>
                    </select>
                    <div align="center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary btn-lg">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
