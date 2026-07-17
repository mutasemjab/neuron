<?php $__env->startSection('title', __('messages.site_settings')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.site_settings')); ?></h1>
        <p class="page-sub">إدارة كل نصوص وصور الموقع العامة (بالعربية والإنجليزية)</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger mb-3">
        <ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('admin.site-settings.update')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

<div class="panel-card">
    <div class="panel-card-body">
        <ul class="nav nav-pills mb-4 flex-wrap gap-2" role="tablist">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupKey => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" data-bs-toggle="pill"
                        data-bs-target="#tab-<?php echo e($groupKey); ?>" type="button"><?php echo e($group['label']); ?></button>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <div class="tab-content">
            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupKey => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-pane fade <?php echo e($loop->first ? 'show active' : ''); ?>" id="tab-<?php echo e($groupKey); ?>">
                <div class="row g-3">
                    <?php $__currentLoopData = $group['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $def): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $current = $settings[$key] ?? null; ?>

                        <?php if($def['type'] === 'image'): ?>
                            <div class="col-12 col-md-6">
                                <label class="form-label"><?php echo e($def['label']); ?></label><br>
                                <?php if($current && $current->value_ar): ?>
                                    <img src="<?php echo e(uploaded_image($current->value_ar, 'site')); ?>" alt=""
                                         style="height:70px;max-width:160px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;margin-bottom:8px">
                                <?php endif; ?>
                                <input type="file" name="<?php echo e(str_replace('.', '_', $key)); ?>" accept="image/*" class="form-control">
                            </div>
                        <?php elseif($def['translatable']): ?>
                            <div class="col-12 col-md-6">
                                <label class="form-label"><?php echo e($def['label']); ?> (عربي)</label>
                                <?php if($def['type'] === 'textarea'): ?>
                                    <textarea name="settings[<?php echo e($key); ?>][ar]" rows="3" class="form-control"><?php echo e(old("settings.$key.ar", $current->value_ar ?? '')); ?></textarea>
                                <?php else: ?>
                                    <input type="text" name="settings[<?php echo e($key); ?>][ar]" class="form-control"
                                           value="<?php echo e(old("settings.$key.ar", $current->value_ar ?? '')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label"><?php echo e($def['label']); ?> (English)</label>
                                <?php if($def['type'] === 'textarea'): ?>
                                    <textarea name="settings[<?php echo e($key); ?>][en]" rows="3" class="form-control" dir="ltr"><?php echo e(old("settings.$key.en", $current->value_en ?? '')); ?></textarea>
                                <?php else: ?>
                                    <input type="text" name="settings[<?php echo e($key); ?>][en]" class="form-control" dir="ltr"
                                           value="<?php echo e(old("settings.$key.en", $current->value_en ?? '')); ?>">
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="col-12 col-md-6">
                                <label class="form-label"><?php echo e($def['label']); ?></label>
                                <input type="text" name="settings[<?php echo e($key); ?>][raw]" class="form-control" dir="ltr"
                                       value="<?php echo e(old("settings.$key.raw", $current->value_ar ?? '')); ?>">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary-sm">
                <i class="bi bi-save"></i> حفظ الإعدادات
            </button>
        </div>
    </div>
</div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/site_settings/edit.blade.php ENDPATH**/ ?>