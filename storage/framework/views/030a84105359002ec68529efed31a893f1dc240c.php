<?php $__env->startSection('content-title'); ?> Affichage d'un formulaire <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<i><?php echo e(strftime('%d/%m/%Y', strtotime($forms->date))); ?></i>
<strong><?php echo e($forms->title); ?></strong>
<?php echo e($forms->message); ?><br/>

<em>par <?php echo e($forms->user->firstname); ?></em><br/>

<a href="<?php echo e(url('forms/')); ?>">Retour à la liste</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/haya0002/public_html/V6Form/resources/views/forms/consult.blade.php ENDPATH**/ ?>