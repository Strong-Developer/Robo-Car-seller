<?php $__env->startSection('content'); ?>


    <?php echo $__env->make('cms.pages.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>