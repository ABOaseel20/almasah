

<?php $__env->startSection('content'); ?>

<div class="row mb-4">
    <div class="col-md-6">
        <h3 class="text-warning">إدارة القاعات</h3>
    </div>
    <div class="col-md-6 text-start">
        <a href="<?php echo e(route('halls.create')); ?>" class="btn btn-warning">
            إضافة قاعة جديدة
        </a>
    </div>
</div>

<div class="card bg-dark border-warning shadow-lg">
    <div class="card-body">

        <table class="table table-dark table-striped table-hover text-center align-middle mb-0">
            <thead class="table-warning text-dark">
                <tr>
                    <th>اسم القاعة</th>
                    <th>السعة</th>
                    <th>السعر</th>
                    <th>الحالة</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $halls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($hall->name); ?></td>
                    <td><?php echo e($hall->capacity); ?></td>
                    <td><?php echo e($hall->price); ?> ريال</td>
                    <td>
                        <span class="badge bg-success">
                            <?php echo e($hall->status); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">لا توجد قاعات مضافة بعد</td>
                </tr>
                <?php endif; ?>
            </tbody>

        </table>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mycar\almasah-palace\resources\views/hall/index.blade.php ENDPATH**/ ?>