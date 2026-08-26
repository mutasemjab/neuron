<?php $d = $doctor ?? null; ?>

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الطبيب</h2></div>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_ar', $d->name_ar ?? '')); ?>" required>
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name_en', $d->name_en ?? '')); ?>" required>
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
                <label class="form-label">التخصص (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="specialization_ar" class="form-control <?php $__errorArgs = ['specialization_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('specialization_ar', $d->specialization_ar ?? '')); ?>" required placeholder="مثال: جراحة العمود الفقري">
                <?php $__errorArgs = ['specialization_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Specialization (English) <span class="text-danger">*</span></label>
                <input type="text" name="specialization_en" dir="ltr" class="form-control <?php $__errorArgs = ['specialization_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('specialization_en', $d->specialization_en ?? '')); ?>" required>
                <?php $__errorArgs = ['specialization_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">المسمى الوظيفي (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control <?php $__errorArgs = ['title_ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_ar', $d->title_ar ?? '')); ?>" required placeholder="مثال: استشاري جراحة العمود الفقري">
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
                <label class="form-label">Job Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control <?php $__errorArgs = ['title_en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title_en', $d->title_en ?? '')); ?>" required>
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
                <label class="form-label">نبذة (عربي)</label>
                <textarea name="bio_ar" rows="3" class="form-control"><?php echo e(old('bio_ar', $d->bio_ar ?? '')); ?></textarea>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Bio (English)</label>
                <textarea name="bio_en" dir="ltr" rows="3" class="form-control"><?php echo e(old('bio_en', $d->bio_en ?? '')); ?></textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الشهادات والخبرات (عربي)</label>
                <textarea name="certifications_ar" rows="3" class="form-control" placeholder="سطر لكل شهادة"><?php echo e(old('certifications_ar', $d->certifications_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل شهادة في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Certifications (English)</label>
                <textarea name="certifications_en" dir="ltr" rows="3" class="form-control" placeholder="One per line"><?php echo e(old('certifications_en', $d->certifications_en ?? '')); ?></textarea>
                <small class="text-muted">One certification per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">التعليم (عربي)</label>
                <textarea name="education_ar" rows="3" class="form-control" placeholder="سطر لكل مؤهل علمي"><?php echo e(old('education_ar', $d->education_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل مؤهل في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Education (English)</label>
                <textarea name="education_en" dir="ltr" rows="3" class="form-control" placeholder="One per line"><?php echo e(old('education_en', $d->education_en ?? '')); ?></textarea>
                <small class="text-muted">One qualification per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">التدريب (عربي)</label>
                <textarea name="training_ar" rows="3" class="form-control" placeholder="سطر لكل برنامج تدريبي"><?php echo e(old('training_ar', $d->training_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل برنامج تدريبي في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Training (English)</label>
                <textarea name="training_en" dir="ltr" rows="3" class="form-control" placeholder="One per line"><?php echo e(old('training_en', $d->training_en ?? '')); ?></textarea>
                <small class="text-muted">One training program per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الانتساب (عربي)</label>
                <textarea name="affiliation_ar" rows="3" class="form-control" placeholder="سطر لكل جهة انتساب"><?php echo e(old('affiliation_ar', $d->affiliation_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل انتساب في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Affiliation (English)</label>
                <textarea name="affiliation_en" dir="ltr" rows="3" class="form-control" placeholder="One per line"><?php echo e(old('affiliation_en', $d->affiliation_en ?? '')); ?></textarea>
                <small class="text-muted">One affiliation per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">العضويات المهنية (عربي)</label>
                <textarea name="memberships_ar" rows="3" class="form-control" placeholder="سطر لكل عضوية"><?php echo e(old('memberships_ar', $d->memberships_ar ?? '')); ?></textarea>
                <small class="text-muted">اكتب كل عضوية في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Professional Memberships (English)</label>
                <textarea name="memberships_en" dir="ltr" rows="3" class="form-control" placeholder="One per line"><?php echo e(old('memberships_en', $d->memberships_en ?? '')); ?></textarea>
                <small class="text-muted">One membership per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوسوم / التخصصات الدقيقة (عربي)</label>
                <input type="text" name="tags_ar" class="form-control" value="<?php echo e(old('tags_ar', $d->tags_ar ?? '')); ?>" placeholder="مفصولة بفواصل: الديسك، المنظار">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Tags (English)</label>
                <input type="text" name="tags_en" dir="ltr" class="form-control" value="<?php echo e(old('tags_en', $d->tags_en ?? '')); ?>" placeholder="Comma separated">
            </div>

            <div class="col-12">
                <label class="form-label">صورة الطبيب</label>
                <?php if($d && $d->image): ?>
                    <div class="mb-2"><img src="<?php echo e($d->image_url); ?>" style="height:80px;width:80px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0"></div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['image'];
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
                <input type="number" name="order_index" class="form-control" value="<?php echo e(old('order_index', $d->order_index ?? 0)); ?>">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" <?php if(old('is_active', $d->is_active ?? true)): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="panel-card mt-3">
    <div class="panel-card-header d-flex align-items-center justify-content-between">
        <h2 class="panel-card-title mb-0">الأبحاث والمنشورات العلمية</h2>
        <button type="button" class="btn-primary-sm" id="addPubBtn">
            <i class="bi bi-plus-lg"></i> إضافة بحث
        </button>
    </div>
    <div class="panel-card-body">

        <div id="pubList">
            <?php
                $pubs = old('publications', $d?->publications?->toArray() ?? []);
            ?>

            <?php $__empty_1 = true; $__currentLoopData = $pubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $pub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="pub-row border rounded p-3 mb-3 position-relative">
                <button type="button" class="btn-danger-sm pub-remove position-absolute" style="top:10px;inset-inline-end:10px" title="حذف">
                    <i class="bi bi-trash"></i>
                </button>
                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <label class="form-label">عنوان البحث (عربي) <span class="text-danger">*</span></label>
                        <input type="text" name="publications[<?php echo e($i); ?>][title_ar]" class="form-control" value="<?php echo e($pub['title_ar'] ?? ''); ?>" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Research Title (English)</label>
                        <input type="text" name="publications[<?php echo e($i); ?>][title_en]" dir="ltr" class="form-control" value="<?php echo e($pub['title_en'] ?? ''); ?>">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">سنة النشر</label>
                        <input type="number" name="publications[<?php echo e($i); ?>][year]" class="form-control" value="<?php echo e($pub['year'] ?? ''); ?>" min="1900" max="2100" placeholder="<?php echo e(date('Y')); ?>">
                    </div>
                    <div class="col-12 col-md-9">
                        <label class="form-label">رابط البحث (URL)</label>
                        <input type="url" name="publications[<?php echo e($i); ?>][url]" dir="ltr" class="form-control" value="<?php echo e($pub['url'] ?? ''); ?>" placeholder="https://...">
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted text-center py-3" id="pubEmpty">لا توجد أبحاث مضافة بعد.</p>
            <?php endif; ?>
        </div>

    </div>
</div>

<div class="mt-3">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>


<template id="pubTemplate">
    <div class="pub-row border rounded p-3 mb-3 position-relative">
        <button type="button" class="btn-danger-sm pub-remove position-absolute" style="top:10px;inset-inline-end:10px" title="حذف">
            <i class="bi bi-trash"></i>
        </button>
        <div class="row g-2">
            <div class="col-12 col-md-6">
                <label class="form-label">عنوان البحث (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="publications[__IDX__][title_ar]" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Research Title (English)</label>
                <input type="text" name="publications[__IDX__][title_en]" dir="ltr" class="form-control">
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label">سنة النشر</label>
                <input type="number" name="publications[__IDX__][year]" class="form-control" min="1900" max="2100" placeholder="<?php echo e(date('Y')); ?>">
            </div>
            <div class="col-12 col-md-9">
                <label class="form-label">رابط البحث (URL)</label>
                <input type="url" name="publications[__IDX__][url]" dir="ltr" class="form-control" placeholder="https://...">
            </div>
        </div>
    </div>
</template>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    const list    = document.getElementById('pubList');
    const empty   = document.getElementById('pubEmpty');
    const addBtn  = document.getElementById('addPubBtn');
    const tmpl    = document.getElementById('pubTemplate');
    let idx       = list.querySelectorAll('.pub-row').length;

    function refreshEmpty() {
        if (empty) empty.style.display = list.querySelectorAll('.pub-row').length ? 'none' : '';
    }

    refreshEmpty();

    addBtn.addEventListener('click', function () {
        const html = tmpl.innerHTML.replaceAll('__IDX__', idx++);
        const div  = document.createElement('div');
        div.innerHTML = html;
        const row = div.firstElementChild;
        list.appendChild(row);
        row.querySelector('input').focus();
        refreshEmpty();
        bindRemove(row);
    });

    function bindRemove(row) {
        row.querySelector('.pub-remove').addEventListener('click', function () {
            row.remove();
            refreshEmpty();
        });
    }

    list.querySelectorAll('.pub-row').forEach(bindRemove);
})();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\doctors\_form.blade.php ENDPATH**/ ?>