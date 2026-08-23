<?php $f = $faq ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات السؤال</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">السؤال (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="question_ar" class="form-control <?php $__errorArgs = ['question_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('question_ar', $f->question_ar ?? '')); ?>" required>
                <?php $__errorArgs = ['question_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Question (English) <span class="text-danger">*</span></label>
                <input type="text" name="question_en" dir="ltr" class="form-control <?php $__errorArgs = ['question_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('question_en', $f->question_en ?? '')); ?>" required>
                <?php $__errorArgs = ['question_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الإجابة (عربي) <span class="text-danger">*</span></label>
                <textarea name="answer_ar" rows="4" class="form-control <?php $__errorArgs = ['answer_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('answer_ar', $f->answer_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['answer_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Answer (English) <span class="text-danger">*</span></label>
                <textarea name="answer_en" dir="ltr" rows="4" class="form-control <?php $__errorArgs = ['answer_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('answer_en', $f->answer_en ?? '')); ?></textarea>
                <?php $__errorArgs = ['answer_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $f->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $f->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\faqs\_form.blade.php ENDPATH**/ ?>