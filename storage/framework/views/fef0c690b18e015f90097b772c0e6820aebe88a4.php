<?php $__env->startSection('title', __('messages.testimonials')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.testimonials')); ?></h1>
        <p class="page-sub">آراء وقصص المرضى</p>
    </div>
    <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة شهادة
    </a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($testimonials->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-quote" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد شهادات بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الصورة</th>
                        <th>اسم المريض (عربي)</th>
                        <th>Name (English)</th>
                        <th>الطبيب المعالج</th>
                        <th style="width:80px">التقييم</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($testimonial->order_index); ?></td>
                        <td>
                            <?php if($testimonial->avatar): ?>
                                <img src="<?php echo e($testimonial->avatar_url); ?>" alt="" style="height:44px;width:44px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0">
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($testimonial->patient_name_ar); ?></td>
                        <td dir="ltr"><?php echo e($testimonial->patient_name_en); ?></td>
                        <td><?php echo e($testimonial->doctor->name_ar ?? '—'); ?></td>
                        <td><?php echo e(str_repeat('★', $testimonial->rating)); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.testimonials.toggle', $testimonial->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="badge border-0 <?php echo e($testimonial->is_active ? 'bg-success' : 'bg-secondary'); ?>" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    <?php echo e($testimonial->is_active ? 'نشط' : 'معطل'); ?>

                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.testimonials.edit', $testimonial->id)); ?>" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.testimonials.destroy', $testimonial->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>