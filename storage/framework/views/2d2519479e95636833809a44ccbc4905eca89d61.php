<?php $t = $testimonial ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الشهادة</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">اسم المريض (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="patient_name_ar" class="form-control <?php $__errorArgs = ['patient_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('patient_name_ar', $t->patient_name_ar ?? '')); ?>" required>
                <?php $__errorArgs = ['patient_name_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Patient Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="patient_name_en" dir="ltr" class="form-control <?php $__errorArgs = ['patient_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('patient_name_en', $t->patient_name_en ?? '')); ?>" required>
                <?php $__errorArgs = ['patient_name_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوصف (عربي)</label>
                <input type="text" name="role_text_ar" class="form-control" value="<?php echo e(old('role_text_ar', $t->role_text_ar ?? '')); ?>" placeholder="مريض – فرع عمّان">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Role Text (English)</label>
                <input type="text" name="role_text_en" dir="ltr" class="form-control" value="<?php echo e(old('role_text_en', $t->role_text_en ?? '')); ?>" placeholder="Patient – Amman Branch">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الشهادة (عربي) <span class="text-danger">*</span></label>
                <textarea name="quote_ar" rows="3" class="form-control <?php $__errorArgs = ['quote_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('quote_ar', $t->quote_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['quote_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Quote (English) <span class="text-danger">*</span></label>
                <textarea name="quote_en" dir="ltr" rows="3" class="form-control <?php $__errorArgs = ['quote_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('quote_en', $t->quote_en ?? '')); ?></textarea>
                <?php $__errorArgs = ['quote_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الطبيب المعالج</label>
                <select name="doctor_id" class="form-select <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option value="">— بدون تحديد —</option>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($doctor->id); ?>" <?php if(old('doctor_id', $t->doctor_id ?? '') == $doctor->id): echo 'selected'; endif; ?>><?php echo e($doctor->name_ar); ?> — <?php echo e($doctor->specialization_ar); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">التقييم (1-5)</label>
                <input type="number" name="rating" min="1" max="5" class="form-control" value="<?php echo e(old('rating', $t->rating ?? 5)); ?>">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">العملية / الإجراء (عربي)</label>
                <input type="text" name="procedure_ar" class="form-control" value="<?php echo e(old('procedure_ar', $t->procedure_ar ?? '')); ?>" placeholder="مثال: جراحة الديسك بالمنظار">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Procedure (English)</label>
                <input type="text" name="procedure_en" dir="ltr" class="form-control" value="<?php echo e(old('procedure_en', $t->procedure_en ?? '')); ?>" placeholder="e.g. Endoscopic disc surgery">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">صورة المريض</label>
                <?php if($t && $t->avatar): ?>
                    <div class="mb-2"><img src="<?php echo e($t->avatar_url); ?>" style="height:60px;width:60px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0"></div>
                <?php endif; ?>
                <input type="file" name="avatar" accept="image/*" class="form-control">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $t->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $t->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\testimonials\_form.blade.php ENDPATH**/ ?>