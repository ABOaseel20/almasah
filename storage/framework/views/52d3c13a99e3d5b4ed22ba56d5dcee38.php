

<?php $__env->startSection('content'); ?>

<h3 class="text-warning mb-4">لوحة التحكم</h3>

<!-- الإحصائيات -->
<div class="row mb-4">

    <div class="col-md-3">
        <div class="card bg-dark text-white text-center p-3">
            <h6>إجمالي الحجوزات</h6>
            <h3 class="counter" data-target="<?php echo e($totalBookings); ?>">0</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark text-white text-center p-3">
            <h6>إجمالي الإيرادات</h6>
            <h3 class="counter" data-target="<?php echo e($totalRevenue); ?>">0</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark text-white text-center p-3">
            <h6>إيرادات اليوم</h6>
            <h3 class="counter" data-target="<?php echo e($todayRevenue); ?>">0</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark text-white text-center p-3">
            <h6>إيرادات الشهر</h6>
            <h3 class="counter" data-target="<?php echo e($monthRevenue); ?>">0</h3>
        </div>
    </div>

</div>

<!-- أفضل قاعة -->
<?php if($topHall): ?>
<div class="card bg-dark text-white p-3 mb-4">
    <h5>أفضل قاعة هذا الشهر</h5>
    <strong><?php echo e($topHall->name); ?></strong>
</div>
<?php endif; ?>

<!-- تنبيه مناسبات قادمة -->
<?php if($upcomingBookings->count()): ?>
<div class="card bg-dark text-white p-3 mb-4 border-warning">
    <h5>مناسبات خلال 7 أيام</h5>
    <ul>
        <?php $__currentLoopData = $upcomingBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($booking->client->name); ?> - <?php echo e($booking->event_date); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<!-- تنبيه عقود غير مكتملة -->
<?php if($unpaidBookings->count()): ?>
<div class="card bg-dark text-white p-3 mb-4 border-danger">
    <h5>عقود غير مكتملة الدفع</h5>
    <ul>
        <?php $__currentLoopData = $unpaidBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($booking->client->name); ?> -
                المتبقي:
                <?php echo e(number_format($booking->total_price - $booking->paid_amount)); ?> ريال
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<!-- الرسم البياني -->
<div class="card bg-dark text-white p-4">
    <canvas id="revenueChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// عدادات متحركة
document.querySelectorAll('.counter').forEach(counter=>{
    const update=()=>{
        const target=+counter.dataset.target;
        const current=+counter.innerText;
        const inc=target/100;
        if(current<target){
            counter.innerText=Math.ceil(current+inc);
            setTimeout(update,20);
        }else{
            counter.innerText=target.toLocaleString();
        }
    };
    update();
});

// رسم بياني
new Chart(document.getElementById('revenueChart'), {
    type: 'line',
    data: {
        labels: <?php echo json_encode($chartLabels, 15, 512) ?>,
        datasets: [{
            label: 'إيرادات الشهر الحالي',
            data: <?php echo json_encode($chartData, 15, 512) ?>,
            borderWidth: 2,
            tension: 0.3
        }]
    }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\mycar\almasah-palace\resources\views/dashboard/index.blade.php ENDPATH**/ ?>