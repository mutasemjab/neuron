<?php $__env->startSection('title', __('messages.appointments')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.appointments')); ?></h1>
        <p class="page-sub">طلبات حجز المواعيد الواردة من الموقع</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?php echo e(route('admin.appointments.index')); ?>" class="badge <?php echo e(!request('status') ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">الكل</a>
    <a href="<?php echo e(route('admin.appointments.index', ['status' => 'new'])); ?>" class="badge <?php echo e(request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">جديد (<?php echo e($counts['new']); ?>)</a>
    <a href="<?php echo e(route('admin.appointments.index', ['status' => 'contacted'])); ?>" class="badge <?php echo e(request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">تم التواصل (<?php echo e($counts['contacted']); ?>)</a>
    <a href="<?php echo e(route('admin.appointments.index', ['status' => 'confirmed'])); ?>" class="badge <?php echo e(request('status')==='confirmed' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">مؤكد (<?php echo e($counts['confirmed']); ?>)</a>
    <a href="<?php echo e(route('admin.appointments.index', ['status' => 'cancelled'])); ?>" class="badge <?php echo e(request('status')==='cancelled' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">ملغي (<?php echo e($counts['cancelled']); ?>)</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($appointments->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-calendar-check" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات حجز بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الفرع</th>
                        <th>الطبيب</th>
                        <th>التاريخ المفضّل</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($appointment->name); ?></td>
                        <td dir="ltr"><?php echo e($appointment->phone); ?></td>
                        <td><?php echo e($appointment->branch->name_ar ?? '—'); ?></td>
                        <td><?php echo e($appointment->doctor->name_ar ?? '—'); ?></td>
                        <td><?php echo e($appointment->preferred_date->format('Y-m-d')); ?> — <?php echo e($appointment->preferred_time_slot); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e(['new'=>'primary','contacted'=>'warning','confirmed'=>'success','cancelled'=>'secondary'][$appointment->status] ?? 'secondary'); ?>"><?php echo e($appointment->status); ?></span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.appointments.show', $appointment->id)); ?>" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="<?php echo e(route('admin.appointments.destroy', $appointment->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3"><?php echo e($appointments->links()); ?></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>