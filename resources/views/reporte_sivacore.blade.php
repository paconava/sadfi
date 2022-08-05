@extends('layouts.app')

@section('content')
<div class="container" style="text-align:justify; font-size:15px;">
    <center><h3>FACULTAD DE INGENIERÍA<br>PERFIL DE INGRESO<br>GENERACIÓN {{$generacion}}</h3></center>
    <h3>Introducción</h3>
    <p>El presente informe tiene como objetivo mostrar información relativa al perfil de
    ingreso de los alumnos de la generación {{$generacion}} de la Facultad de Ingeniería, con la
    intención de aportar elementos para el análisis de las características de la
    población que se incorporen en el diseño y desarrollo de programas y actividades
    educativas que favorezcan el avance académico de los estudiantes desde el inicio
    de su formación profesional.</p>
    <p>La información estadística que se presenta se obtuvo del Cuestionario
    Sociodemográfico y de Antecedentes Escolares que se aplica, desde 1997, a
    todos los alumnos de primer ingreso y que recopila e integra información de
    diversas áreas.</p>
    <p>A partir de la generación 2009, el instrumento se aplica vía internet; las preguntas
    se han ido modificando de acuerdo a las necesidades del contexto, agregando
    reactivos que tienen que ver con el conocimiento, uso de nuevas tecnologías de
    información y con un cuestionario para medir conductas orientadas hacia el
    estudio.</p>
    <p>Para el presente informe se retomó información de cinco áreas específicas:
    <ol type='A' style="text-align:justify; font-size:15px;">
        <li>
            <b>Datos generales</b>: Comprende las características básicas del alumnado.
        </li>
        <li>
            <b>Perfil escolar</b>: Donde se explora la trayectoria escolar de los alumnos, en
            términos de sus estudios de bachillerato, el lugar e institución en que los
            realizaron, así como promedio y duración de los mismos.
        </li>
        <li>
            <b>Indicadores socioeconómicos</b>: En esta área se muestran resultados de
            algunas características socioeconómicas del alumnado tales como ingreso 
            mensual en el hogar, situación laboral, así como bienes y servicios con que
            cuenta, etc.
        </li>
        <li>
            <b>Hábitos y distribución del tiempo</b>: Reporta la información relacionada con
            los hábitos de lectura, las actividades que se realizan en la biblioteca y el
            tiempo que emplean en diferentes actividades.
        </li>
        <li>
            <b>Sistema de valoración de conductas orientadas hacia el estudio
            (SIVACORE)</b>: Se presentan los resultados de la aplicación del cuestionario
            SIVACORE, que valora ocho conductas.
        </li>
    </ol>
    </p>
    <center><h3>A: DATOS GENERALES</h3></center>
    <p>Para la generación {{$generacion}}, contestaron el Cuestionario Sociodemográfico y de
    Antecedentes Escolares {{$total}} alumnos. El {{$hombres}}% son hombres y el {{$mujeres}}%
    mujeres</p>
    <center><h3>B: PERFIL ESCOLAR</h3></center>
    <p>
    El {{$bach_unam}}% de los alumnos que ingresan en esta generación estudiaron su
    bachillerato en el sistema de la UNAM (<strong>Tabla 1</strong>), el {{$pase_reglamentado}}% ingresaron por pase
    reglamentado y {{$concurso}}% por concurso de selección.
    </p>
    <h5>Tabla 1 Bachillerato de procedencia</h5>
    <table class="table table-sm">
        <thead>
            <th></th>
            <th></th>
            <th>%</th>
        </thead>
        <tbody>
            @foreach($bach_opciones as $op)
            <tr>
                <td><b>{{$op->valor}}</b></td>
                <td>{{$op->texto}}</td>
                <td><b>{{$op->porcentaje}}</b></td>
            </tr>
            @endforeach
            <tr>
                <td colspan=2><b>* ZMCM= Zona Metropolitana de la Ciudad de México</b></td>
                <td><b>N = {{$total}}</b></td>
            </tr>
        </tbody>
    </table>
    <p>
    En cuanto al promedio de calificaciones que obtuvieron en el bachillerato, la moda
    es {{$calif_moda}} (<strong>Tabla 2</strong>); cabe señalar que el {{$a_tiempo}}% cursó su bachillerato en los
    3 años reglamentarios.
    </p>
    <h5>Tabla 2 Promedio de calificaciones en el bachillerato</h5>
    <center>
    <table class="table table-sm" style="width:50%;">
        <thead>
            <th></th>
            <th></th>
            <th>%</th>
        </thead>
        <tbody>
            @foreach($calif_opciones as $op)
            <tr>
                <td><b>{{$op->valor}}</b></td>
                <td>{{$op->texto}}</td>
                <td><b>{{$op->porcentaje}}</b></td>
            </tr>
            @endforeach
            <tr>
                <td colspan=3><b>N = {{$total}}</b></td>
            </tr>
        </tbody>
    </table>
    </center>
    <p>
    En la pregunta de la razón principal por la que eligieron la carrera, las tres
    opciones que más destacan son: 
    <?php
        $sliced_array = array_slice($razones, 0, 1);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), ";
        $sliced_array = array_slice($razones, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%) y ";
        $sliced_array = array_slice($razones, 2, 3);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%). ";
    ?>
    Al reactivo de por qué eligieron la
    UNAM para estudiar, las respuestas principales son: 
    <?php
        $sliced_array = array_slice($razones_unam, 0, 1);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), ";
        $sliced_array = array_slice($razones_unam, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%) y ";
        $sliced_array = array_slice($razones_unam, 2, 3);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%). ";
    ?>
    <br><br>
    Por otro lado el {{$posgrado_ext}}% de la población dice que al terminar la carrera estudiará un
    posgrado en el extranjero. Así mismo el {{$perspectiva}}% consideran que tendrán una buena
    o muy buena perspectiva de empleo al terminar la carrera. 
    </p>
    <center><h3>C: DATOS SOCIOECONÓMICOS</h3></center>
    <p>
    El {{$padres_juntos}}% contestó que sus padres viven juntos, el {{$hermanos}}% mencionó que tienen
    entre uno y dos hermanos, en cuanto al nivel máximo de estudios de sus padres el
    mayor porcentaje se centró en el de 
    <?php
        $sliced_array = array_slice($estudios_padre, 0, 1);
        echo key($sliced_array)." para el padre (".$sliced_array[key($sliced_array)]."%), seguido de ";
        $sliced_array = array_slice($estudios_padre, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%) ";
    ?>
    y para la madre destaca el de 
    <?php
        $sliced_array = array_slice($estudios_madre, 0, 1);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), seguido de ";
        $sliced_array = array_slice($estudios_madre, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%). ";
    ?>
    La principal ocupación para el padre es ser 
    <?php
        $sliced_array = array_slice($ocupacion_padre, 0, 1);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), seguido de ";
        $sliced_array = array_slice($ocupacion_padre, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), ";
    ?>
    el de la madre 
    <?php
        $sliced_array = array_slice($ocupacion_madre, 0, 1);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%), seguido de ";
        $sliced_array = array_slice($ocupacion_madre, 1, 2);
        echo key($sliced_array)." (".$sliced_array[key($sliced_array)]."%). ";
    ?>
    </p>
</div>
@endsection