

<?php $__env->startSection('content'); ?>

<h3 class="text-warning mb-4">مركز التقارير</h3>

<div class="row">
    <div class="col-md-4">
        <a href="<?php echo e(route('reports.daily')); ?>" class="btn btn-warning w-100 mb-3">
            التقرير اليومي
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?php echo e(route('reports.monthly')); ?>" class="btn btn-secondary w-100 mb-3">
            التقرير الشهري
        </a>
    </div>

   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mycar\almasah-palace\resources\views/reports/index.blade.php ENDPATH**/ ?>