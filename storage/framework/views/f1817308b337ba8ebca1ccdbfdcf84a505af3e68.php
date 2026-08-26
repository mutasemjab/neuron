<div class="panel-card mb-3">
    <div class="panel-card-body">

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-medium">التصنيف <span class="text-danger">*</span></label>
                <select name="category" class="form-select <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <?php
                        $cats = [
                            'general'   => 'عام',
                            'services'  => 'الخدمات والعلاجات',
                            'doctors'   => 'الأطباء',
                            'locations' => 'المواقع والفروع',
                            'insurance' => 'التأمين',
                            'hours'     => 'أوقات العمل والمواعيد',
                            'pricing'   => 'الأسعار',
                            'faq'       => 'أسئلة شائعة',
                        ];
                    ?>
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($val); ?>" <?php echo e(old('category', $chatbot?->category ?? '') === $val ? 'selected' : ''); ?>>
                            <?php echo e($label); ?> (<?php echo e($val); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-medium">الترتيب</label>
                <input type="number" name="order_index" class="form-control"
                    value="<?php echo e(old('order_index', $chatbot?->order_index ?? 0)); ?>" min="0">
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                        <?php echo e(old('is_active', $chatbot?->is_active ?? true) ? 'checked' : ''); ?>>
                    <label class="form-check-label">نشط</label>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-medium">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    value="<?php echo e(old('title_ar', $chatbot?->title_ar ?? '')); ?>" required placeholder="مثال: ساعات العمل">
                <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6" dir="ltr">
                <label class="form-label fw-medium">Title (English)</label>
                <input type="text" name="title_en" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    value="<?php echo e(old('title_en', $chatbot?->title_en ?? '')); ?>" placeholder="e.g. Working Hours">
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-medium">المحتوى (عربي) <span class="text-danger">*</span></label>
                <textarea name="content_ar" rows="8" class="form-control <?php $__errorArgs = ['content_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    required placeholder="اكتب المعلومة بالكامل بالعربية..."><?php echo e(old('content_ar', $chatbot?->content_ar ?? '')); ?></textarea>
                <?php $__errorArgs = ['content_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-6" dir="ltr">
                <label class="form-label fw-medium">Content (English)</label>
                <textarea name="content_en" rows="8" class="form-control"
                    placeholder="Write the full information in English..."><?php echo e(old('content_en', $chatbot?->content_en ?? '')); ?></textarea>
            </div>
        </div>

        <div class="mt-3">
            <label class="form-label fw-medium">الكلمات المفتاحية (tags)</label>
            <input type="text" name="tags" class="form-control"
                value="<?php echo e(old('tags', $chatbot?->tags ?? '')); ?>"
                placeholder="مثال: موعد، حجز، وقت، ساعات، عمل — افصل بين الكلمات بفاصلة">
            <div class="form-text">الكلمات المفتاحية تساعد في البحث الدقيق داخل قاعدة المعرفة</div>
        </div>

    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn-primary-sm px-4">
        <i class="bi bi-check-lg"></i> حفظ
    </button>
    <a href="<?php echo e(route('admin.chatbot.index')); ?>" class="btn-outline-sm">إلغاء</a>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\chatbot\_form.blade.php ENDPATH**/ ?>