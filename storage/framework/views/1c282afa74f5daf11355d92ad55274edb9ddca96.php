<?php $b = $branch ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الفرع</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">اسم الفرع (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control <?php $__errorArgs = ['name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_ar', $b->name_ar ?? '')); ?>" required placeholder="فرع عمّان – الشميساني">
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
                <label class="form-label">Branch Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" dir="ltr" class="form-control <?php $__errorArgs = ['name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_en', $b->name_en ?? '')); ?>" required>
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
                <label class="form-label">شارة الفرع (عربي)</label>
                <input type="text" name="badge_ar" class="form-control" value="<?php echo e(old('badge_ar', $b->badge_ar ?? '')); ?>" placeholder="الفرع الرئيسي / مفتوح">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Badge (English)</label>
                <input type="text" name="badge_en" dir="ltr" class="form-control" value="<?php echo e(old('badge_en', $b->badge_en ?? '')); ?>" placeholder="Main Branch / Open">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <textarea name="address_ar" rows="2" class="form-control <?php $__errorArgs = ['address_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('address_ar', $b->address_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['address_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Address (English) <span class="text-danger">*</span></label>
                <textarea name="address_en" dir="ltr" rows="2" class="form-control <?php $__errorArgs = ['address_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('address_en', $b->address_en ?? '')); ?></textarea>
                <?php $__errorArgs = ['address_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">ساعات العمل (عربي)</label>
                <input type="text" name="working_hours_ar" class="form-control" value="<?php echo e(old('working_hours_ar', $b->working_hours_ar ?? '')); ?>" placeholder="السبت – الخميس 9ص – 9م">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Working Hours (English)</label>
                <input type="text" name="working_hours_en" dir="ltr" class="form-control" value="<?php echo e(old('working_hours_en', $b->working_hours_en ?? '')); ?>">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">رقم الهاتف</label>
                <input type="text" name="phone" dir="ltr" class="form-control" value="<?php echo e(old('phone', $b->phone ?? '')); ?>">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">نص البحث في خرائط جوجل</label>
                <input type="text" name="map_query" dir="ltr" class="form-control" value="<?php echo e(old('map_query', $b->map_query ?? '')); ?>" placeholder="Shmeisani Amman Jordan">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $b->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_main" value="1" id="is_main" <?php if(old('is_main', $b->is_main ?? false)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_main">فرع رئيسي</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $b->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\branches\_form.blade.php ENDPATH**/ ?>