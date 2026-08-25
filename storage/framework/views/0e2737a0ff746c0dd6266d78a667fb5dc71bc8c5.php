<?php $__env->startSection('title', 'تفاصيل طلب الاستشارة'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب استشارة #<?php echo e($consultation->id); ?></h1></div>
    <a href="<?php echo e(route('admin.consultations.index')); ?>" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
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
                    <div class="col-md-6"><label class="form-label">الاسم</label><p><?php echo e($consultation->name); ?></p></div>
                    <div class="col-md-6"><label class="form-label">البريد الإلكتروني</label><p dir="ltr"><?php echo e($consultation->email); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف / واتساب</label><p dir="ltr"><?php echo e($consultation->phone_country_code); ?> <?php echo e($consultation->phone); ?></p></div>
                    <div class="col-md-6"><label class="form-label">بلد الإقامة</label><p><?php echo e($consultation->country_of_residence); ?></p></div>
                    <div class="col-md-6"><label class="form-label">تاريخ الميلاد</label><p><?php echo e($consultation->date_of_birth->format('Y-m-d')); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الموافقة على سياسة الخصوصية</label><p><?php echo e($consultation->privacy_consent ? 'نعم' : 'لا'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الأيام المناسبة</label><p><?php echo e($consultation->preferred_days_label ?: '—'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الفترة المناسبة</label><p><?php echo e($consultation->preferred_periods_label ?: '—'); ?></p></div>
                    <div class="col-12"><label class="form-label">وصف الحالة / الاستفسار الطبي</label><p style="white-space:pre-line"><?php echo e($consultation->condition_description); ?></p></div>
                    <?php if(!empty($consultation->attachment_urls)): ?>
                    <div class="col-12">
                        <label class="form-label">التقارير والصور الطبية المرفقة</label>
                        <div class="d-flex gap-2 flex-wrap">
                            <?php $__currentLoopData = $consultation->attachment_urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($url); ?>" target="_blank" class="btn-outline-sm"><i class="bi bi-file-earmark-text"></i> ملف <?php echo e($i + 1); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
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
                <form action="<?php echo e(route('admin.consultations.status', $consultation)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <select name="status" class="form-select mb-3">
                        <option value="new" <?php if($consultation->status === 'new'): echo 'selected'; endif; ?>>جديد</option>
                        <option value="contacted" <?php if($consultation->status === 'contacted'): echo 'selected'; endif; ?>>تم التواصل</option>
                        <option value="scheduled" <?php if($consultation->status === 'scheduled'): echo 'selected'; endif; ?>>تم الجدولة</option>
                        <option value="closed" <?php if($consultation->status === 'closed'): echo 'selected'; endif; ?>>مغلق</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: <?php echo e($consultation->created_at->format('Y-m-d H:i')); ?></p>

                <form action="<?php echo e(route('admin.consultations.destroy', $consultation)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')" class="mt-3">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn-danger-sm w-100 justify-content-center"><i class="bi bi-trash"></i> حذف الطلب</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\consultations\show.blade.php ENDPATH**/ ?>