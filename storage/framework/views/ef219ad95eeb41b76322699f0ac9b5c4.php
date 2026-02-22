

<?php $__env->startSection('content'); ?>

<h3 class="text-warning mb-4">التقرير اليومي للإيرادات</h3>

<!-- فورم اختيار التاريخ -->
<form method="GET" action="<?php echo e(route('reports.daily')); ?>" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="date" name="date" class="form-control"
                   value="<?php echo e($date); ?>">
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning">عرض</button>
        </div>
    </div>
</form>

<!-- ملخص -->
<div class="card bg-dark border-warning shadow-lg mb-4">
    <div class="card-body text-white">
        التاريخ: <strong><?php echo e($date); ?></strong><br>
        إجمالي الإيرادات:
        <span class="text-success">
            <?php echo e(number_format($total)); ?> ريال
        </span>
    </div>
</div>

<!-- جدول العمليات -->
<div class="card bg-dark border-warning shadow-lg">
    <div class="card-body">
        <table class="table table-dark table-bordered text-center">
            <thead>
                <tr>
                    <th>العميل</th>
                    <th>المبلغ</th>
                    <th>تاريخ الدفع</th>
                    <th>ملاحظات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($payment->booking->client->name); ?></td>
                    <td><?php echo e(number_format($payment->amount)); ?> ريال</td>
                    <td><?php echo e($payment->payment_date); ?></td>
                    <td><?php echo e($payment->notes); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4">لا توجد عمليات في هذا اليوم</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mycar\almasah-palace\resources\views/payments/daily.blade.php ENDPATH**/ ?>