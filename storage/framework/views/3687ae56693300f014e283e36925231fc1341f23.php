<html>
    <head>
    	<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <style>
            /** Define the margins of your page **/
            @page  {
                margin: 80px 80px;
            }
			.page-break {
			    page-break-after: always;
			}
			.row {
			  display: flex;
			}

			.column {
			  float: left;
			}

			.left {
			  width: 45%;
			}

			.right {
			  width: 45%;
			}
        </style>
    </head>
    <body>
        <div>
	        <img src="images/logos/unampdf.png" style="float:left; max-height: 120px;" alt="UNAM" title="UNAM">
	        <img src="images/logos/fipdf.png" style="float: right; max-height: 120px;" alt="Facultad de Ingeniería">
	        <center>
	        	<br>
	        	UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO<br>
	        	FACULTAD DE INGENIERÍA <br>
	        	SECRETARÍA DE APOYO A LA DOCENCIA <br>
	        	COORDINACIÓN DE EVALUACIÓN EDUCATIVA
	        </center>
        </div>
        <br>
        <div style="margin-top: 300px; margin-bottom: 300px; text-align: center; font-size: 25px;">
        	OPINIÓN DE LOS PROFESORES CON RESPECTO AL PROGRAMA DE ESTUDIOS DE LA ASIGNATURA:<br>
        	<b><?php echo e($asignatura->nombre); ?></b>
        </div>
        <div>
	        <img src="images/logos/autonomiapdf.png" style="float:left; max-height: 120px;" alt="Autonomía">
	        <img src="images/logos/unamnacionpdf.png" style="float: right; max-height: 120px;" alt="UNAM la universidad de la nación">
        </div>
        <div class="page-break"></div>
        <div style="text-align: center;">
        	Resultados por semestre:<br>
        	<img src="<?php echo e($chartImg); ?>" style="max-width: 100%;">
        </div>
        <?php $__currentLoopData = $semestres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="#<?php echo e($sem->semestre); ?>"><?php echo e($sem->semestre); ?></a><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $semestres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="page-break"></div>
        <div style="text-align:center;margin-bottom: 20px;">
        	<a name="<?php echo e($sem->semestre); ?>" style="font-size: 25px;">Semestre <?php echo e($sem->semestre); ?></a><br>
        </div>
				<table style="min-width: 100%;">
					<tbody>
						<tr>
							<td style="font-size: 20px; font-weight: bold; text-align:center;">
								Totalmente de acuerdo 
								<?php if($sem->pos_count == 1): ?>
								(<?php echo e($sem->pos_count); ?> respuesta)
								<?php else: ?>
								(<?php echo e($sem->pos_count); ?> respuestas)
								<?php endif; ?>
							</td>
						</tr>
						<tr><hr></tr>
						<?php $__currentLoopData = $sem->pos_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<?php echo e($resp->p15_just); ?>

							</td>
						</tr>
						<tr><hr></tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<div class="page-break"></div>
				<table style="min-width: 100%;">
					<tbody>
						<tr>
							<td style="font-size: 20px; font-weight: bold; text-align:center;">
								No totalmente de acuerdo 
								<?php if($sem->neg_count == 1): ?>
								(<?php echo e($sem->neg_count); ?> respuesta)
								<?php else: ?>
								(<?php echo e($sem->neg_count); ?> respuestas)
								<?php endif; ?>
							</td>
						</tr>
						<tr><hr></tr>
						<?php $__currentLoopData = $sem->neg_respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<?php echo e($resp->p15_just); ?>

							</td>
						</tr>
						<tr><hr></tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </body>
</html><?php /**PATH /var/www/resources/views/pdf/resultados_pdf.blade.php ENDPATH**/ ?>