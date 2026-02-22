

<?php $__env->startSection('content'); ?>

<h3 class="text-warning mb-4">قائمة العملاء</h3>

<div class="card bg-dark border-warning shadow-lg">
    <div class="card-body">
        <table class="table table-dark table-bordered text-center">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الجوال</th>
                    <th>عدد الحجوزات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($client->name); ?></td>
                    <td><?php echo e($client->phone); ?></td>
                    <td><?php echo e($client->bookings_count); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mycar\almasah-palace\resources\views/clients/index.blade.php ENDPATH**/ ?>