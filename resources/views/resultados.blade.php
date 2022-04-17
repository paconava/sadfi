@extends('layouts.app')
@section('xtrajs')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-12">
                <a href="{{route('home')}}" style="color:red;">< Volver</a>
                <form method="POST" action="{{route('resultados_pdf')}}" target="_blank">
                    {{csrf_field()}}
                    <input type="hidden" name="asignatura" value="{{$asignatura->id}}">
                    <input type="hidden" name="departamento" value="{{$departamento}}">
                    <input type="hidden" name="chartImg" id="chartImg" value="">
                    <input type='submit' class='btn btn-danger btn-wd' value='Exportar a PDF' style="float:right;" />
                </form>
                <br>
                <h3>{{$asignatura->nombre}}</h3>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div> 
                </div>
            </div>
            <br>
            <div class="accordion" id="accordionExample">
                @foreach($semestres as $sem)
                <div class="card">
                    <div class="card-header" id="heading{{$sem->semestre}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$sem->semestre}}" aria-expanded="false" aria-controls="collapse{{$sem->semestre}}">{{$sem->semestre}}</button>
                        </h5>
                    </div>
                    <div id="collapse{{$sem->semestre}}" class="collapse" aria-labelledby="heading{{$sem->semestre}}" data-parent="#accordionExample" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <table class="table">
                                        <thead align="center">
                                            <th>Totalmente de acuerdo</th>
                                            <th>No totalmente de acuerdo</th>
                                        </thead>
                                        <tbody align="center" style="font-size: 40px;">
                                            <td>{{$sem->pos_count}}</td>
                                            <td>{{$sem->neg_count}}</td>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6" align="center">
                                    <p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTotal{{$sem->semestre}}" aria-expanded="false" aria-controls="collapseTotal{{$sem->semestre}}">Respuestas para totalmente de acuerdo</button></p>
                                    <div class="collapse" id="collapseTotal{{$sem->semestre}}">
                                        <div class="card card-body">
                                            <table class="table table-no-border">
                                                <tbody>
                                                    @foreach($sem->pos_respuestas as $resp)
                                                    <tr><td>{{$resp->p15_just}}</td></tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" align="center">
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseParcial{{$sem->semestre}}" aria-expanded="false" aria-controls="collapseParcial{{$sem->semestre}}">Respuestas para no totalmente de acuerdo</button>
                                    <div class="collapse" id="collapseParcial{{$sem->semestre}}">
                                        <div class="card card-body">
                                            <table class="table">
                                                <tbody>
                                                    @foreach($sem->neg_respuestas as $resp)
                                                    <tr><td>{{$resp->p15_just}}</td></tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMaterial);

    function drawMaterial() {
        var data = google.visualization.arrayToDataTable([
            ['Semestre', 'Totalmente de acuerdo', 'No totalmente de acuerdo'],
            <?php foreach ($semestres as $sem): ?>
                ['<?php echo $sem->semestre; ?>', <?php echo $sem->pos_count; ?>, <?php echo $sem->neg_count; ?>],
                <?php endforeach ?>
                ]);
        var options = {
            orientation: 'horizontal',
            vAxis: {format: '0'},
            series: {
                0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
                1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
            },
            axes: {
                x: {
                    distance: {label: 'parsecs'}, // Bottom x-axis.
                    brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
                }
            }
        };
        var chart_input = document.getElementById('chartImg');
        var chart = new google.visualization.BarChart(document.getElementById('columnchart_material'));
        console.log(chart);
        
        google.visualization.events.addListener(chart, 'ready', function () {
            chart_input.value = chart.getImageURI();
        });

        chart.draw(data, options);


    }
</script>
@endsection