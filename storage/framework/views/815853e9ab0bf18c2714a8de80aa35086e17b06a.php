<?php $__env->startSection('title', __('messages.employee_title')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.employee_title')); ?></h1>
        <p class="page-sub">إدارة موظفي لوحة التحكم وأدوارهم</p>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-add')): ?>
    <a href="<?php echo e(route('admin.employee.create')); ?>" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> <?php echo e(__('messages.new_employee')); ?>

    </a>
    <?php endif; ?>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show mb-3">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($data->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-people" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا يوجد موظفون بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('messages.name_field')); ?></th>
                        <th><?php echo e(__('messages.user_name_col')); ?></th>
                        <th>البريد الإلكتروني</th>
                        <th>الأدوار</th>
                        <th style="width:130px"><?php echo e(__('messages.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($employee->name); ?></td>
                        <td dir="ltr"><?php echo e($employee->username); ?></td>
                        <td dir="ltr"><?php echo e($employee->email); ?></td>
                        <td>
                            <?php $__empty_1 = true; $__currentLoopData = $employee->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <span class="badge bg-light text-dark border"><?php echo e($role->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-edit')): ?>
                                <a href="<?php echo e(route('admin.employee.edit', $employee->id)); ?>" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-delete')): ?>
                                <form action="<?php echo e(route('admin.employee.destroy', $employee->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="p-3"><?php echo e($data->links()); ?></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\employee\index.blade.php ENDPATH**/ ?>