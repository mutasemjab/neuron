<?php $p = $subscriptionPlan ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات باقة الاشتراك</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">عنوان الباقة (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_ar', $p->title_ar ?? '')); ?>" required placeholder="مثال: الباقة الذهبية">
                <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Plan Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en', $p->title_en ?? '')); ?>" required placeholder="e.g. Gold Plan">
                <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">وصف مختصر (عربي)</label>
                <input type="text" name="subtitle_ar" class="form-control" value="<?php echo e(old('subtitle_ar', $p->subtitle_ar ?? '')); ?>" placeholder="جملة قصيرة تحت العنوان">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Short Description (English)</label>
                <input type="text" name="subtitle_en" dir="ltr" class="form-control" value="<?php echo e(old('subtitle_en', $p->subtitle_en ?? '')); ?>">
            </div>

            <div class="col-12 col-md-4">
                <label class="form-label">السعر <span class="text-danger">*</span></label>
                <input type="number" step="0.01" min="0" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('price', $p->price ?? '')); ?>" required>
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">وصف السعر (عربي)</label>
                <input type="text" name="price_suffix_ar" class="form-control" value="<?php echo e(old('price_suffix_ar', $p->price_suffix_ar ?? '')); ?>" placeholder="مثال: دينار / شهرياً">
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">Price Suffix (English)</label>
                <input type="text" name="price_suffix_en" dir="ltr" class="form-control" value="<?php echo e(old('price_suffix_en', $p->price_suffix_en ?? '')); ?>" placeholder="e.g. JOD / month">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">المزايا (عربي)</label>
                <textarea name="features_ar" rows="5" class="form-control" placeholder="سطر لكل ميزة"><?php echo e(old('features_ar', $p->features_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل ميزة في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Features (English)</label>
                <textarea name="features_en" dir="ltr" rows="5" class="form-control" placeholder="One per line"><?php echo e(old('features_en', $p->features_en ?? '')); ?></textarea>
                <small class="text-muted">One feature per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">شارة الباقة (عربي)</label>
                <input type="text" name="badge_ar" class="form-control" value="<?php echo e(old('badge_ar', $p->badge_ar ?? '')); ?>" placeholder="مثال: الأكثر طلباً">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Badge (English)</label>
                <input type="text" name="badge_en" dir="ltr" class="form-control" value="<?php echo e(old('badge_en', $p->badge_en ?? '')); ?>" placeholder="e.g. Most Popular">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نص زر الاشتراك (عربي)</label>
                <input type="text" name="button_text_ar" class="form-control" value="<?php echo e(old('button_text_ar', $p->button_text_ar ?? '')); ?>" placeholder="مثال: اشترك الآن">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Button Text (English)</label>
                <input type="text" name="button_text_en" dir="ltr" class="form-control" value="<?php echo e(old('button_text_en', $p->button_text_en ?? '')); ?>" placeholder="e.g. Subscribe Now">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $p->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" <?php if(old('is_featured', $p->is_featured ?? false)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_featured">باقة مميزة (تُبرز في الواجهة)</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $p->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\subscription-plans\_form.blade.php ENDPATH**/ ?>