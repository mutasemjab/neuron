<?php $__env->startSection('title', 'تفاصيل طلب الحجز'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب حجز #<?php echo e($appointment->id); ?></h1></div>
    <a href="<?php echo e(route('admin.appointments.index')); ?>" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">بيانات المريض</h2></div>
            <div class="panel-card-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">الاسم</label><p><?php echo e($appointment->name); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف</label><p dir="ltr"><?php echo e($appointment->phone); ?></p></div>
                    <div class="col-md-6"><label class="form-label">نوع الحجز</label><p><?php echo e($appointment->booking_type === 'international' ? 'خارج الأردن' : 'داخل الأردن'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الفرع</label><p><?php echo e($appointment->branch->name_ar ?? '—'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الطبيب / التخصص</label><p><?php echo e($appointment->doctor->name_ar ?? '—'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">التاريخ المفضّل</label><p><?php echo e($appointment->preferred_date->format('Y-m-d')); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الوقت المفضّل</label><p><?php echo e($appointment->preferred_time_slot); ?></p></div>
                    <div class="col-12"><label class="form-label">ملاحظات</label><p><?php echo e($appointment->notes ?: '—'); ?></p></div>
                    <?php if($appointment->attachment): ?>
                    <div class="col-12">
                        <label class="form-label">الملفات المرضية المرفقة</label>
                        <p><a href="<?php echo e($appointment->attachment_url); ?>" target="_blank" class="btn-outline-sm"><i class="bi bi-paperclip"></i> عرض / تحميل الملف</a></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">حالة الطلب</h2></div>
            <div class="panel-card-body">
                <form action="<?php echo e(route('admin.appointments.status', $appointment->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <select name="status" class="form-select mb-3">
                        <option value="new" <?php if($appointment->status === 'new'): echo 'selected'; endif; ?>>جديد</option>
                        <option value="contacted" <?php if($appointment->status === 'contacted'): echo 'selected'; endif; ?>>تم التواصل</option>
                        <option value="confirmed" <?php if($appointment->status === 'confirmed'): echo 'selected'; endif; ?>>مؤكد</option>
                        <option value="cancelled" <?php if($appointment->status === 'cancelled'): echo 'selected'; endif; ?>>ملغي</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: <?php echo e($appointment->created_at->format('Y-m-d H:i')); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\appointments\show.blade.php ENDPATH**/ ?>