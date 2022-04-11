<?php $__env->startSection('xtrajs'); ?>
<link href="css/material-bootstrap-wizard.css" rel="stylesheet" />
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
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form class="form-group" method="POST" action="<?php echo e(route('resultados')); ?>">
                            <?php echo csrf_field(); ?>

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Programa de estudios
                                    </h3>
                                    <h5>Opinión de los profesores por asignatura.</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#details" data-toggle="tab">División</a></li>
                                        <li><a href="#captain" data-toggle="tab">Departamento</a></li>
                                        <li><a href="#description" data-toggle="tab">Asignatura</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="details">
                                        <h4 class="info-text">Seleccione la división</h4>
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <select id="division-dropdown" name="division" class="form-control" required>
                                                    <option value="" selected>-- Seleccione una opción --</option>
                                                    <?php $__currentLoopData = $divisiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($div->id); ?>"><?php echo e($div->siglas); ?> - <?php echo e($div->nombre); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="captain">
                                        <h4 class="info-text">Seleccione el departamento</h4>
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <select id="departamento-dropdown" name="departamento" class="form-control" required>
                                                    <option value="" selected>-- Seleccione una opción --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="description">
                                        <h4 class="info-text">Seleccione la asignatura</h4>
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <select id="asignatura-dropdown" name="asignatura" class="form-control" required>
                                                    <option value="" selected>-- Seleccione una opción --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Siguiente' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Aceptar' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.bootstrap.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="js/material-bootstrap-wizard.js"></script>
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#loader').hide();
        $.ajaxSetup({
          beforeSend: function() {
             $('#loader').show();
          },
          complete: function(){
             $('#loader').hide();
          },
          success: function() {}
        });
        $('#division-dropdown').change(function () {
            var id = $(this).val();
            console.log(id);
            if(id == ""){
                return
            }
            $('#departamento-dropdown').find('option').not(':first').remove();
            $.ajax({
                url:"getDepartamento/"+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].nombre;
                            var option = "<option value='"+id+"'>"+name+"</option>"; 
                            $("#departamento-dropdown").append(option);
                        }
                    }
                }
            })
        });

        $('#departamento-dropdown').change(function () {
            var id = $(this).val();
            console.log(id);
            if(id == ""){
                return
            }
            $('#asignatura-dropdown').find('option').not(':first').remove();
            $.ajax({
                url:"getAsignatura/"+id,
                type:'get',
                dataType:'json',
                success:function (response) {
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].nombre;
                            var option = "<option value='"+id+"'>"+name+"</option>"; 
                            $("#asignatura-dropdown").append(option);
                        }
                    }
                }
            })
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/home.blade.php ENDPATH**/ ?>