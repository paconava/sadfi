
<?php $__env->startSection('xtrajs'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('xtracss'); ?>
<style>
.tab-content > .tab-pane:not(.active) {
    display: block;
    height: 0;
    overflow-y: hidden;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <?php if(session('status')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

      </div>
      <?php endif; ?>
      <div class="col-md-12">
        <a href="<?php echo e(route('home')); ?>" style="color:red;">< Volver</a>
        <form method="POST" action="<?php echo e(route('resultados_pdf')); ?>" target="_blank">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="asignatura" value="<?php echo e($asignatura->id); ?>">
          <input type="hidden" name="departamento" value="<?php echo e($departamento); ?>">
          <input type="hidden" name="chartImg" id="chartImg" value="">
          <input type='submit' class='btn btn-danger btn-wd' value='Exportar a PDF' style="float:right;" />
        </form>
        <br>
        <h3><?php echo e($asignatura->nombre); ?></h3>
      </div>
      <div class="row">
          <div class="col-md-8 offset-md-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Resultados absolutos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Porcentajes</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div id="columnchart_material" style="width: 800px; height: 500px;"></div>
              </div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><div id="columnchart_material2" style="width: 800px; height: 500px;"></div>
              </div>
            </div>
          </div>
        </div>
      <br>
      <div class="accordion" id="accordionExample">
        <?php $__currentLoopData = $semestres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
          <div class="card-header" id="heading<?php echo e($sem->semestre); ?>">
            <h5 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($sem->semestre); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($sem->semestre); ?>"><?php echo e($sem->semestre); ?></button>
            </h5>
          </div>
          <div id="collapse<?php echo e($sem->semestre); ?>" class="collapse" aria-labelledby="heading<?php echo e($sem->semestre); ?>" data-parent="#accordionExample" style="width: 100%;">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 offset-md-4">
                  <table class="table">
                    <thead align="center">
                      <th>Totalmente de acuerdo</th>
                      <th>No totalmente de acuerdo</th>
                    </thead>
                    <tbody align="center" style="font-size: 40px;">
                      <td><?php echo e($sem->pos_count); ?></td>
                      <td><?php echo e($sem->neg_count); ?></td>
                    </tbody>
                  </table>
                </div>  
              </div>
              <br>
              <div class="row">
                <div class="col-md-6" align="center">
                  <!--                                     <p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTotal<?php echo e($sem->semestre); ?>" aria-expanded="false" aria-controls="collapseTotal<?php echo e($sem->semestre); ?>">Respuestas para totalmente de acuerdo</button></p> -->
                  <div>
                    <div class="card card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr><th>
                            Respuestas para totalmente de acuerdo
                          </th></tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $sem->pos_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr><td><?php echo e($resp->p15_just); ?></td></tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" align="center">
                  <!--                                     <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseParcial<?php echo e($sem->semestre); ?>" aria-expanded="false" aria-controls="collapseParcial<?php echo e($sem->semestre); ?>">Respuestas para no totalmente de acuerdo</button> -->
                  <div>
                    <div class="card card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr><th>
                            Respuestas para no totalmente de acuerdo
                          </th></tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $sem->neg_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <hr>
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
<script type="text/javascript">
  var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
  triggerTabList.forEach(function (triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function (event) {
      event.preventDefault()
      tabTrigger.show()
    })
  })
</script>
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
        vAxis: {format: '0', title: 'No. de profesores'},
        hAxis: {title: 'Semestre'}
      };

      var chart_input = document.getElementById('chartImg');
      var chart = new google.visualization.BarChart(document.getElementById('columnchart_material'));
      console.log(chart);

      google.visualization.events.addListener(chart, 'ready', function () {
        chart_input.value = chart.getImageURI();
      });

      chart.draw(data, options);

      data = google.visualization.arrayToDataTable([
        ['Semestre', 'Totalmente de acuerdo', 'No totalmente de acuerdo'],
        <?php foreach ($semestres as $sem): ?>
          ['<?php echo $sem->semestre; ?>', 
          <?php
          if (($sem->pos_count + $sem->neg_count) > 0)
            echo $sem->pos_count/($sem->pos_count + $sem->neg_count);
          else echo 0;
          ?>, 
          <?php
          if (($sem->pos_count + $sem->neg_count) > 0)
            echo $sem->neg_count/($sem->pos_count + $sem->neg_count);
          else echo 0;
          ?>],
        <?php endforeach ?>
        ]);


      var formatter = new google.visualization.NumberFormat({pattern:'##%'});
      formatter.format(data, 1);
      formatter.format(data, 2);

      options = {
        orientation: 'horizontal',
        vAxis: {format: '##%', title: 'Porcentaje de profesores'},
        hAxis: {title: 'Semestre'}
      };

      chart = new google.visualization.BarChart(document.getElementById('columnchart_material2'));
      chart.draw(data, options);
    }
    $(function () {
        $('#myTab li:last-child a').tab('show')
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/resultados.blade.php ENDPATH**/ ?>