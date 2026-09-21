<?php $__env->startSection('title', __('messages.edit_role')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title"><?php echo e(__('messages.edit_role')); ?></h1></div>
    <a href="<?php echo e(route('admin.role.index')); ?>" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger mb-3">
        <ul class="mb-0"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('admin.role.update', $role->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="panel-card mb-3">
        <div class="panel-card-body">
            <div class="col-12 col-md-6">
                <label class="form-label"><?php echo e(__('messages.name_field')); ?> <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name', $role->name)); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>

    <div class="panel-card">
        <div class="panel-card-header"><h2 class="panel-card-title"><?php echo e(__('messages.permissions')); ?></h2></div>
        <div class="panel-card-body">
            <?php echo $__env->make('admin.roles._permission_groups', ['checked' => old('perms', $role_permissions)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> <?php echo e(__('messages.Save')); ?></button>
        <a href="<?php echo e(route('admin.role.index')); ?>" class="btn-outline-sm"><?php echo e(__('messages.Cancel')); ?></a>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\roles\edit.blade.php ENDPATH**/ ?>