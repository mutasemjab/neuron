<?php $__env->startSection('title', __('messages.subscription_plans')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.subscription_plans')); ?></h1>
        <p class="page-sub">باقات الاشتراك المعروضة في الموقع</p>
    </div>
    <a href="<?php echo e(route('admin.subscription-plans.create')); ?>" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة باقة
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
        <?php if($subscriptionPlans->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-credit-card-2-front" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد باقات اشتراك بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>العنوان (عربي)</th>
                        <th>Title (English)</th>
                        <th>السعر</th>
                        <th style="width:90px">مميزة</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $subscriptionPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($plan->order_index); ?></td>
                        <td><?php echo e($plan->title_ar); ?></td>
                        <td dir="ltr"><?php echo e($plan->title_en); ?></td>
                        <td><?php echo e(number_format((float) $plan->price, 2)); ?> <?php echo e($plan->price_suffix_ar); ?></td>
                        <td>
                            <?php if($plan->is_featured): ?>
                                <span class="badge bg-warning text-dark">مميزة</span>
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="<?php echo e(route('admin.subscription-plans.toggle', $plan->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="badge border-0 <?php echo e($plan->is_active ? 'bg-success' : 'bg-secondary'); ?>" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    <?php echo e($plan->is_active ? 'نشط' : 'معطل'); ?>

                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.subscription-plans.edit', $plan->id)); ?>" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.subscription-plans.destroy', $plan->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\subscription-plans\index.blade.php ENDPATH**/ ?>