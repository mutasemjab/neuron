<?php $__env->startSection('title', 'طلبات التوظيف'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">طلبات التوظيف</h1>
        <p class="page-sub">طلبات التقديم على الوظائف الواردة من الموقع</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?php echo e(route('admin.job-applications.index')); ?>" class="badge <?php echo e(!request('status') ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">الكل</a>
    <a href="<?php echo e(route('admin.job-applications.index', ['status' => 'new'])); ?>" class="badge <?php echo e(request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">جديد (<?php echo e($counts['new']); ?>)</a>
    <a href="<?php echo e(route('admin.job-applications.index', ['status' => 'reviewed'])); ?>" class="badge <?php echo e(request('status')==='reviewed' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">تمت المراجعة (<?php echo e($counts['reviewed']); ?>)</a>
    <a href="<?php echo e(route('admin.job-applications.index', ['status' => 'contacted'])); ?>" class="badge <?php echo e(request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">تم التواصل (<?php echo e($counts['contacted']); ?>)</a>
    <a href="<?php echo e(route('admin.job-applications.index', ['status' => 'rejected'])); ?>" class="badge <?php echo e(request('status')==='rejected' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">مرفوض (<?php echo e($counts['rejected']); ?>)</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($applications->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-person-badge" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات توظيف بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>البريد الإلكتروني</th>
                        <th>الفرع</th>
                        <th>الوظيفة</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($application->name); ?></td>
                        <td dir="ltr"><?php echo e($application->phone); ?></td>
                        <td dir="ltr"><?php echo e($application->email); ?></td>
                        <td><?php echo e($application->branch->name_ar ?? '—'); ?></td>
                        <td><?php echo e($application->careerJob->title_ar ?? '—'); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e(['new'=>'primary','reviewed'=>'info','contacted'=>'warning','rejected'=>'secondary'][$application->status] ?? 'secondary'); ?>"><?php echo e($application->status); ?></span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.job-applications.show', $application)); ?>" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="<?php echo e(route('admin.job-applications.destroy', $application)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3"><?php echo e($applications->links()); ?></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\job_applications\index.blade.php ENDPATH**/ ?>