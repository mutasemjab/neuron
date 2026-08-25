<?php $__env->startSection('title', 'طلبات الاستشارة الأونلاين'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">طلبات الاستشارة الأونلاين</h1>
        <p class="page-sub">طلبات المرضى من خارج الأردن</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?php echo e(route('admin.consultations.index')); ?>" class="badge <?php echo e(!request('status') ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">الكل</a>
    <a href="<?php echo e(route('admin.consultations.index', ['status' => 'new'])); ?>" class="badge <?php echo e(request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">جديد (<?php echo e($counts['new']); ?>)</a>
    <a href="<?php echo e(route('admin.consultations.index', ['status' => 'contacted'])); ?>" class="badge <?php echo e(request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">تم التواصل (<?php echo e($counts['contacted']); ?>)</a>
    <a href="<?php echo e(route('admin.consultations.index', ['status' => 'scheduled'])); ?>" class="badge <?php echo e(request('status')==='scheduled' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">تم الجدولة (<?php echo e($counts['scheduled']); ?>)</a>
    <a href="<?php echo e(route('admin.consultations.index', ['status' => 'closed'])); ?>" class="badge <?php echo e(request('status')==='closed' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">مغلق (<?php echo e($counts['closed']); ?>)</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($consultations->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-camera-video" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات استشارة بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        <th>بلد الإقامة</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:100px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($consultation->name); ?></td>
                        <td dir="ltr"><?php echo e($consultation->email); ?></td>
                        <td dir="ltr"><?php echo e($consultation->phone_country_code); ?> <?php echo e($consultation->phone); ?></td>
                        <td><?php echo e($consultation->country_of_residence); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e(['new'=>'primary','contacted'=>'warning','scheduled'=>'success','closed'=>'secondary'][$consultation->status] ?? 'secondary'); ?>"><?php echo e($consultation->status); ?></span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.consultations.show', $consultation)); ?>" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="p-3"><?php echo e($consultations->links()); ?></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\consultations\index.blade.php ENDPATH**/ ?>