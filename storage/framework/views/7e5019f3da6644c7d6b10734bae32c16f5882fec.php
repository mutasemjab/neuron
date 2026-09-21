<?php $__env->startSection('title', 'العطل والأيام المغلقة'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">العطل والأيام المغلقة</h1>
        <p class="page-sub">تواريخ لا يمكن للمرضى اختيارها بفورم حجز المواعيد داخل الأردن (بالإضافة للجمعة والتواريخ السابقة، المغلقة تلقائياً)</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('closed-date-add')): ?>
<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">إضافة يوم مغلق</h2></div>
    <div class="panel-card-body">
        <form action="<?php echo e(route('admin.closed-dates.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <label class="form-label">التاريخ <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('date')); ?>" required>
                    <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label">السبب (عربي)</label>
                    <input type="text" name="label_ar" class="form-control" value="<?php echo e(old('label_ar')); ?>" placeholder="مثال: عيد الفطر">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label">Reason (English)</label>
                    <input type="text" name="label_en" dir="ltr" class="form-control" value="<?php echo e(old('label_en')); ?>" placeholder="e.g. Eid al-Fitr">
                </div>
                <div class="col-12 col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($closedDates->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-calendar-x" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد أيام مغلقة مضافة بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>السبب (عربي)</th>
                        <th>Reason (English)</th>
                        <th style="width:80px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $closedDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $closedDate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($closedDate->date->format('Y-m-d')); ?></td>
                        <td><?php echo e($closedDate->label_ar ?: '—'); ?></td>
                        <td dir="ltr"><?php echo e($closedDate->label_en ?: '—'); ?></td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('closed-date-delete')): ?>
                            <form action="<?php echo e(route('admin.closed-dates.destroy', $closedDate)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\closed_dates\index.blade.php ENDPATH**/ ?>