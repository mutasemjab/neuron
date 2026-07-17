<?php $a = $article ?? null; ?>

<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">محتوى المقال</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_ar', $a->title_ar ?? '')); ?>" required>
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
                <label class="form-label">Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en', $a->title_en ?? '')); ?>" required>
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
                <label class="form-label">التصنيف (عربي)</label>
                <input type="text" name="category_ar" class="form-control" value="<?php echo e(old('category_ar', $a->category_ar ?? '')); ?>" placeholder="آلام الظهر">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Category (English)</label>
                <input type="text" name="category_en" dir="ltr" class="form-control" value="<?php echo e(old('category_en', $a->category_en ?? '')); ?>" placeholder="Back Pain">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">مقتطف (عربي) <span class="text-danger">*</span></label>
                <textarea name="excerpt_ar" rows="2" class="form-control <?php $__errorArgs = ['excerpt_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('excerpt_ar', $a->excerpt_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['excerpt_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Excerpt (English) <span class="text-danger">*</span></label>
                <textarea name="excerpt_en" dir="ltr" rows="2" class="form-control <?php $__errorArgs = ['excerpt_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('excerpt_en', $a->excerpt_en ?? '')); ?></textarea>
                <?php $__errorArgs = ['excerpt_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نص المقال (عربي) <span class="text-danger">*</span></label>
                <textarea name="body_ar" rows="8" class="form-control <?php $__errorArgs = ['body_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('body_ar', $a->body_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['body_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Article Body (English) <span class="text-danger">*</span></label>
                <textarea name="body_en" dir="ltr" rows="8" class="form-control <?php $__errorArgs = ['body_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('body_en', $a->body_en ?? '')); ?></textarea>
                <?php $__errorArgs = ['body_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12">
                <label class="form-label">صورة المقال</label>
                <?php if($a && $a->image): ?>
                    <div class="mb-2"><img src="<?php echo e($a->image_url); ?>" style="height:80px;width:140px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0"></div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">دقائق القراءة</label>
                <input type="number" name="read_minutes" class="form-control" value="<?php echo e(old('read_minutes', $a->read_minutes ?? 5)); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">تاريخ النشر</label>
                <input type="date" name="published_at" class="form-control" value="<?php echo e(old('published_at', $a?->published_at?->format('Y-m-d'))); ?>">
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $a->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">منشور</label>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">SEO</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <label class="form-label">عنوان SEO (عربي)</label>
                <input type="text" name="meta_title_ar" class="form-control" value="<?php echo e(old('meta_title_ar', $a->meta_title_ar ?? '')); ?>">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Meta Title (English)</label>
                <input type="text" name="meta_title_en" dir="ltr" class="form-control" value="<?php echo e(old('meta_title_en', $a->meta_title_en ?? '')); ?>">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">وصف SEO (عربي)</label>
                <textarea name="meta_description_ar" rows="2" class="form-control"><?php echo e(old('meta_description_ar', $a->meta_description_ar ?? '')); ?></textarea>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Meta Description (English)</label>
                <textarea name="meta_description_en" dir="ltr" rows="2" class="form-control"><?php echo e(old('meta_description_en', $a->meta_description_en ?? '')); ?></textarea>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ المقال</button>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/articles/_form.blade.php ENDPATH**/ ?>