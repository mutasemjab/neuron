<?php $__env->startSection('title', 'تفاصيل طلب التوظيف'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب توظيف #<?php echo e($jobApplication->id); ?></h1></div>
    <a href="<?php echo e(route('admin.job-applications.index')); ?>" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
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
            <div class="panel-card-header"><h2 class="panel-card-title">بيانات المتقدم</h2></div>
            <div class="panel-card-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">الاسم</label><p><?php echo e($jobApplication->name); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف</label><p dir="ltr"><?php echo e($jobApplication->phone); ?></p></div>
                    <div class="col-md-6"><label class="form-label">البريد الإلكتروني</label><p dir="ltr"><?php echo e($jobApplication->email); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الوظيفة المتقدم لها</label><p><?php echo e($jobApplication->careerJob->title_ar ?? '—'); ?></p></div>
                    <div class="col-md-6"><label class="form-label">الفرع</label><p><?php echo e($jobApplication->branch->name_ar ?? '—'); ?></p></div>
                    <div class="col-12"><label class="form-label">الرسالة التعريفية</label><p><?php echo e($jobApplication->message ?: '—'); ?></p></div>
                    <?php if($jobApplication->cv): ?>
                    <div class="col-12">
                        <label class="form-label">السيرة الذاتية</label>
                        <p><a href="<?php echo e($jobApplication->cv_url); ?>" target="_blank" class="btn-outline-sm"><i class="bi bi-file-earmark-text"></i> عرض / تحميل السيرة الذاتية</a></p>
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
                <form action="<?php echo e(route('admin.job-applications.status', $jobApplication)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <select name="status" class="form-select mb-3">
                        <option value="new" <?php if($jobApplication->status === 'new'): echo 'selected'; endif; ?>>جديد</option>
                        <option value="reviewed" <?php if($jobApplication->status === 'reviewed'): echo 'selected'; endif; ?>>تمت المراجعة</option>
                        <option value="contacted" <?php if($jobApplication->status === 'contacted'): echo 'selected'; endif; ?>>تم التواصل</option>
                        <option value="rejected" <?php if($jobApplication->status === 'rejected'): echo 'selected'; endif; ?>>مرفوض</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: <?php echo e($jobApplication->created_at->format('Y-m-d H:i')); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\job_applications\show.blade.php ENDPATH**/ ?>