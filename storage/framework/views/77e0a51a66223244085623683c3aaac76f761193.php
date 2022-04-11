
<?php $__env->startSection('xtrajs'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                        <a href="<?php echo e(route('home')); ?>" style="color:red;">
                           < Volver
                        </a>
                        <br>
                        <h3><?php echo e($asignatura->nombre); ?></h3>
                    </div>
                    <div class="row">  
                        <div class="col-md-6 offset-md-3">
                            <table class="table">
                                <thead>
                                    <th>Totalmente de acuerdo</th>
                                    <th>No totalmente de acuerdo</th>
                                </thead>
                                <tbody>
                                    <td><?php echo e($pos_count); ?></td>
                                    <td><?php echo e($neg_count); ?></td>
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
                                        <?php $__currentLoopData = $pos_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr><td><?php echo e($resp->p15_just); ?></td></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php $__currentLoopData = $neg_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr><td><?php echo e($resp->p15_just); ?></td></tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
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
          ['Totalmente de acuerdo', <?php echo e($pos_count); ?>],
          ['Parcialmente de acuerdo', <?php echo e($neg_count); ?>],
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/resultados.blade.php ENDPATH**/ ?>