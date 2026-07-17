<?php $__env->startSection('title', __('messages.dashboard')); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.dashboard')); ?></h1>
        <p class="page-sub"><?php echo e(__('messages.welcome_back')); ?>, <?php echo e(auth('admin')->user()->name); ?></p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><?php echo e(__('messages.dashboard')); ?></li>
        </ol>
    </nav>
</div>


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>


<div class="row g-3 mb-4">

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#eff6ff;color:#2563eb">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-value"><?php echo e(number_format($stats['new_appointments'])); ?></div>
            <div class="stat-label"><?php echo e(__('messages.new_appointments')); ?></div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#f0fdf4;color:#059669">
                <i class="bi bi-person-badge"></i>
            </div>
            <div class="stat-value"><?php echo e(number_format($stats['total_doctors'])); ?></div>
            <div class="stat-label"><?php echo e(__('messages.total_doctors')); ?></div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#faf5ff;color:#7c3aed">
                <i class="bi bi-geo-alt"></i>
            </div>
            <div class="stat-value"><?php echo e(number_format($stats['total_branches'])); ?></div>
            <div class="stat-label"><?php echo e(__('messages.total_branches')); ?></div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon" style="background:#fef2f2;color:#dc2626">
                <i class="bi bi-envelope"></i>
            </div>
            <div class="stat-value"><?php echo e(number_format($stats['unread_messages'])); ?></div>
            <div class="stat-label"><?php echo e(__('messages.unread_messages')); ?></div>
        </div>
    </div>

</div>


<div class="row g-3 mb-3">

    <div class="col-12 col-xl-8">
        <div class="panel-card h-100">
            <div class="panel-card-header">
                <h2 class="panel-card-title"><?php echo e(__('messages.recent_appointments')); ?></h2>
                <a href="<?php echo e(route('admin.appointments.index')); ?>" class="btn-outline-sm"><?php echo e(__('messages.view_all')); ?></a>
            </div>
            <div class="panel-card-body p-0">
                <div style="overflow-x:auto">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('messages.patient')); ?></th>
                                <th><?php echo e(__('messages.phone')); ?></th>
                                <th><?php echo e(__('messages.branch')); ?></th>
                                <th><?php echo e(__('messages.date')); ?></th>
                                <th><?php echo e(__('messages.Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td style="font-weight:500"><?php echo e($appointment->name); ?></td>
                                <td style="color:var(--muted)" dir="ltr"><?php echo e($appointment->phone); ?></td>
                                <td style="color:var(--muted)"><?php echo e($appointment->branch->name ?? '—'); ?></td>
                                <td style="color:var(--muted)"><?php echo e($appointment->preferred_date->format('Y-m-d')); ?></td>
                                <td><span class="badge bg-secondary"><?php echo e($appointment->status); ?></span></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4" style="color:var(--muted)"><?php echo e(__('messages.no_appointments_yet')); ?></td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="panel-card h-100">
            <div class="panel-card-header">
                <h2 class="panel-card-title"><?php echo e(__('messages.new_messages')); ?></h2>
                <a href="<?php echo e(route('admin.contact_messages.index')); ?>" class="btn-outline-sm"><?php echo e(__('messages.view_all')); ?></a>
            </div>
            <div class="panel-card-body">
                <?php $__empty_1 = true; $__currentLoopData = $recentContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="activity-item">
                    <div class="activity-dot" style="background:#eff6ff;color:#2563eb">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title"><?php echo e($msg->first_name); ?> <?php echo e($msg->last_name); ?></div>
                        <div class="activity-time"><?php echo e(Str::limit($msg->subject, 40)); ?> · <?php echo e($msg->created_at->diffForHumans()); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-center py-3" style="color:var(--muted);font-size:.85rem"><?php echo e(__('messages.no_new_messages')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>


<div class="row g-3">
    <div class="col-12">
        <div class="panel-card">
            <div class="panel-card-header">
                <h2 class="panel-card-title"><?php echo e(__('messages.quick_actions')); ?></h2>
            </div>
            <div class="panel-card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo e(route('admin.doctors.create')); ?>" class="btn-outline-sm">
                        <i class="bi bi-person-plus"></i> <?php echo e(__('messages.add_doctor')); ?>

                    </a>
                    <a href="<?php echo e(route('admin.services.create')); ?>" class="btn-outline-sm">
                        <i class="bi bi-heart-pulse"></i> <?php echo e(__('messages.add_service')); ?>

                    </a>
                    <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn-outline-sm">
                        <i class="bi bi-journal-text"></i> <?php echo e(__('messages.add_article')); ?>

                    </a>
                    <a href="<?php echo e(route('admin.contact_messages.index')); ?>" class="btn-outline-sm">
                        <i class="bi bi-envelope"></i> <?php echo e(__('messages.view_messages')); ?>

                        <?php if($stats['unread_messages'] > 0): ?>
                            <span class="pill pill-warning ms-1"><?php echo e($stats['unread_messages']); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>