<?php $__env->startSection('content'); ?>
<h1>Expediente Electrónico</h1>
<center>
<hr>
<?php if(isset($data->acta_nacimiento)): ?>
<h2>Acta de Nacimiento</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,<?php echo e($data->acta_nacimiento->pdf); ?>" width="100%" height="600px"></iframe>
	</div>    
</div>
<?php endif; ?>
<?php if(isset($data->certificado)): ?>
<hr>
<h2>Certificado</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,<?php echo e($data->certificado->pdf); ?>" width="100%" height="600px"></iframe>
	</div>    
</div>
<?php endif; ?>
<?php if(isset($data->curp)): ?>
<hr>
<h2>CURP</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,<?php echo e($data->curp->pdf); ?>" width="100%" height="600px"></iframe>
	</div>    
</div>
<?php endif; ?>
<?php if(isset($data->boleta_credencial)): ?>
<hr>
<h2>Boleta credencial</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<iframe src="data:application/pdf;base64,<?php echo e($data->boleta_credencial->pdf); ?>" width="100%" height="600px"></iframe>
	</div>    
</div>
<?php endif; ?>
<?php if(!isset($data->boleta_credencial) && !isset($data->acta_nacimiento) && !isset($data->certificado) && !isset($data->curp)): ?>
<h3>El alumno está registrado pero no cuenta con documentos digitales.</h3>
<?php endif; ?>
</center>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laravel\sad\resources\views/expele.blade.php ENDPATH**/ ?>