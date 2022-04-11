@extends('layouts.app')
@section('xtrajs')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="col-md-12">
                        <a href="{{route('home')}}" style="color:red;">
                           < Volver
                        </a>
                        <br>
                        <h3>{{$asignatura->nombre}}</h3>
                    </div>
                    <div class="row">  
                        <div class="col-md-6 offset-md-3">
                            <table class="table">
                                <thead>
                                    <th>Totalmente de acuerdo</th>
                                    <th>No totalmente de acuerdo</th>
                                </thead>
                                <tbody>
                                    <td>{{$pos_count}}</td>
                                    <td>{{$neg_count}}</td>
                                </tbody>
                            </table>
                            <br>
                            <div id="chart_div"></div> 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <center><p>
                              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTotal" aria-expanded="false" aria-controls="collapseTotal">
                                Respuestas para totalmente de acuerdo
                              </button>
                            </p>
                            </center>
                            <div class="collapse" id="collapseTotal">
                              <div class="card card-body">
                                <table class="table">
                                    <tbody>
                                        @foreach($pos_respuestas as $resp)
                                        <tr><td>{{$resp->p15_just}}</td></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <center>
                            <p>
                              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseParcial" aria-expanded="false" aria-controls="collapseParcial">
                                Respuestas para no totalmente de acuerdo
                              </button>
                            </p>
                            </center>
                            <div class="collapse" id="collapseParcial">
                              <div class="card card-body">
                                <table class="table">
                                    <tbody>
                                        @foreach($neg_respuestas as $resp)
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
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Totalmente de acuerdo', {{$pos_count}}],
          ['Parcialmente de acuerdo', {{$neg_count}}],
        ]);

        // Set chart options
        var options = {
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
@endsection