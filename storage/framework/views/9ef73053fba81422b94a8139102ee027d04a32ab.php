<?php $v = $video ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الفيديو</h2></div>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_ar', $v->title_ar ?? '')); ?>" required>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en', $v->title_en ?? '')); ?>" required>
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
                <label class="form-label">الوسم (عربي)</label>
                <input type="text" name="tag_ar" class="form-control" value="<?php echo e(old('tag_ar', $v->tag_ar ?? '')); ?>" placeholder="جولة افتراضية">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Tag (English)</label>
                <input type="text" name="tag_en" dir="ltr" class="form-control" value="<?php echo e(old('tag_en', $v->tag_en ?? '')); ?>" placeholder="Virtual Tour">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">رابط الفيديو (يوتيوب)</label>
                <input type="url" name="video_url" dir="ltr" class="form-control <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('video_url', $v->video_url ?? '')); ?>">
                <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">الصورة المصغرة</label>
                <?php if($v && $v->thumbnail): ?>
                    <div class="mb-2"><img src="<?php echo e($v->thumbnail_url); ?>" style="height:60px;width:100px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0"></div>
                <?php endif; ?>
                <input type="file" name="thumbnail" accept="image/*" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $v->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_main" value="1" id="is_main" <?php if(old('is_main', $v->is_main ?? false)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_main">فيديو رئيسي (بطاقة كبيرة)</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $v->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\videos\_form.blade.php ENDPATH**/ ?>