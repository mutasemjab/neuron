
<?php $__env->startSection('title', 'قاعدة معرفة الشات بوت'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">قاعدة معرفة الشات بوت</h1>
        <p class="page-sub">المعلومات التي يستخدمها المساعد الذكي للإجابة على أسئلة المرضى</p>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn-outline-sm" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="bi bi-upload"></i> استيراد من ملف
        </button>
        <a href="<?php echo e(route('admin.chatbot.create')); ?>" class="btn-primary-sm">
            <i class="bi bi-plus-lg"></i> إضافة معلومة
        </a>
    </div>
</div>


<div class="modal fade" id="importModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-upload me-2"></i>استيراد أسئلة وأجوبة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('admin.chatbot.import')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <?php if($errors->has('file')): ?>
                        <div class="alert alert-danger py-2"><?php echo e($errors->first('file')); ?></div>
                    <?php endif; ?>
                    <p class="text-muted small mb-3">
                        ارفع ملف Excel أو CSV يحتوي على الأسئلة والأجوبة.
                        أعمدة الملف المطلوبة: <code>category, title_ar, content_ar</code>
                        (الأعمدة الاختيارية: <code>title_en, content_en, tags, order_index</code>)
                    </p>
                    <div class="mb-3">
                        <label class="form-label fw-medium">الملف <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required>
                        <div class="form-text">صيغ مدعومة: xlsx, xls, csv — بحد أقصى 10 ميغابايت</div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="truncate_first" value="1" id="truncateCheck">
                        <label class="form-check-label text-danger" for="truncateCheck">
                            حذف جميع البيانات الحالية قبل الاستيراد
                        </label>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <a href="<?php echo e(route('admin.chatbot.template')); ?>" class="text-decoration-none small">
                            <i class="bi bi-download me-1"></i> تحميل قالب Excel نموذجي
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-upload me-1"></i> استيراد
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Re-open modal automatically if there are validation errors
    <?php if($errors->has('file')): ?>
        document.addEventListener('DOMContentLoaded', function() {
            new bootstrap.Modal(document.getElementById('importModal')).show();
        });
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($entries->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-robot" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد معلومات بعد — أضف معلومات لتغذية المساعد الذكي</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:50px">#</th>
                        <th>العنوان</th>
                        <th style="width:130px">التصنيف</th>
                        <th style="width:200px">الكلمات المفتاحية</th>
                        <th style="width:90px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $entries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($entry->order_index); ?></td>
                        <td>
                            <div class="fw-medium"><?php echo e($entry->title_ar); ?></div>
                            <?php if($entry->title_en): ?>
                                <small class="text-muted" dir="ltr"><?php echo e($entry->title_en); ?></small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark"><?php echo e($entry->category); ?></span>
                        </td>
                        <td>
                            <small class="text-muted"><?php echo e(Str::limit($entry->tags, 60)); ?></small>
                        </td>
                        <td>
                            <form action="<?php echo e(route('admin.chatbot.toggle', $entry->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="badge border-0 <?php echo e($entry->is_active ? 'bg-success' : 'bg-secondary'); ?>" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    <?php echo e($entry->is_active ? 'نشط' : 'معطل'); ?>

                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.chatbot.edit', $entry->id)); ?>" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.chatbot.destroy', $entry->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\chatbot\index.blade.php ENDPATH**/ ?>