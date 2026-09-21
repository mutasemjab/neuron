<?php $c = $insuranceCompany ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات شركة التأمين</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_ar', $c->name_ar ?? '')); ?>" required>
                <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" dir="ltr" class="form-control <?php $__errorArgs = ['name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_en', $c->name_en ?? '')); ?>" required>
                <?php $__errorArgs = ['name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الاسم الفرعي (عربي)</label>
                <input type="text" name="subtitle_ar" class="form-control" value="<?php echo e(old('subtitle_ar', $c->subtitle_ar ?? '')); ?>">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Subtitle (English)</label>
                <input type="text" name="subtitle_en" dir="ltr" class="form-control" value="<?php echo e(old('subtitle_en', $c->subtitle_en ?? '')); ?>">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">شعار الشركة (يظهر بدل الاسم في الموقع)</label>
                <?php if($c && $c->logo): ?>
                    <div class="mb-2"><img src="<?php echo e($c->logo_url); ?>" style="height:60px;max-width:160px;object-fit:contain;border-radius:6px;border:1px solid #e2e8f0;padding:6px;background:#fff"></div>
                <?php endif; ?>
                <input type="file" name="logo" accept="image/*" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $c->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $c->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\insurance_companies\_form.blade.php ENDPATH**/ ?>