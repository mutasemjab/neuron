<?php $__env->startSection('title', __('messages.stats')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.stats')); ?></h1>
        <p class="page-sub">الأرقام المتحركة (الواجهة الرئيسية وقسم الإحصائيات)</p>
    </div>
    <a href="<?php echo e(route('admin.stats.create')); ?>" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة رقم
    </a>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php $__currentLoopData = ['hero' => 'شرائط الواجهة الرئيسية (Hero)', 'main' => 'قسم الإحصائيات']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title"><?php echo e($label); ?></h2></div>
    <div class="panel-card-body p-0">
        <?php $rows = $stats[$section] ?? collect(); ?>
        <?php if($rows->isEmpty()): ?>
            <div class="text-center py-4 text-muted">لا توجد أرقام بعد</div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الرقم</th>
                        <th>التسمية (عربي)</th>
                        <th>Label (English)</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($stat->order_index); ?></td>
                        <td dir="ltr"><?php echo e($stat->number); ?><?php echo e($stat->suffix); ?></td>
                        <td><?php echo e($stat->label_ar); ?></td>
                        <td dir="ltr"><?php echo e($stat->label_en); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.stats.toggle', $stat->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="badge border-0 <?php echo e($stat->is_active ? 'bg-success' : 'bg-secondary'); ?>" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    <?php echo e($stat->is_active ? 'نشط' : 'معطل'); ?>

                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.stats.edit', $stat->id)); ?>" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.stats.destroy', $stat->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\stats\index.blade.php ENDPATH**/ ?>