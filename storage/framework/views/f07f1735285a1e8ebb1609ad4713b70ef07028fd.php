<?php $__env->startSection('title', 'تعديل الرقم'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل الرقم</h1></div>
    <a href="<?php echo e(route('admin.stats.index')); ?>" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger mb-3">
        <ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    </div>
<?php endif; ?>

<div class="row g-3">
<div class="col-12 col-xl-9">
<form action="<?php echo e(route('admin.stats.update', $stat->id)); ?>" method="POST">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
<?php echo $__env->make('admin.stats._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\stats\edit.blade.php ENDPATH**/ ?>