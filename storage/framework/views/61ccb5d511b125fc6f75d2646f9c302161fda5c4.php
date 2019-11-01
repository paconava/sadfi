<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="row">   
                        <div class="col-md-6">
                            Escolaridad máxima de los padres:
                            <br>
                            <form class="form-group" method="POST" action="<?php echo e(url('/sadfi')); ?>">
                                <?php echo csrf_field(); ?>

                                <select name="generacion" class="form-control">
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
                            <hr>
                            Lo mismo gen vs gen
                            <br>
                            <form class="form-group" method="POST" action="<?php echo e(url('/genvsgen')); ?>">
                                <?php echo csrf_field(); ?>

                                <select name="cual" class="form-control">
                                    <option value="" selected>-- Seleccione una opción --</option>
                                    <option value="p">Padre</option>
                                    <option value="m">Madre</option>
                                </select>
                                <select name="genvsgen1" class="form-control">
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
                                <select name="genvsgen2" class="form-control">
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
                        <div class="col-md-6 col-md-offset-6">
                            EXPELE por Num Cta:
                            <br>
                            <form class="form-group" method="POST" action="<?php echo e(url('/expele')); ?>">
                                <?php echo csrf_field(); ?>

                                <input type="text" name="num_cta" maxlength="9" />
                                <div align="center" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary btn-lg">Aceptar</button>
                                </div>
                            </form>
                            
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laravel\sad\resources\views/home.blade.php ENDPATH**/ ?>