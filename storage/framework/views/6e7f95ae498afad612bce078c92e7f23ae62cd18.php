<?php $__env->startSection('title', __('messages.subscription_orders')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title"><?php echo e(__('messages.subscription_orders')); ?></h1>
        <p class="page-sub">طلبات الاشتراك ومدفوعاتها عبر بوابة بنك الاتحاد</p>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show mb-3">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="<?php echo e(route('admin.subscription-orders.index')); ?>" class="badge <?php echo e(!request('status') ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">الكل</a>
    <a href="<?php echo e(route('admin.subscription-orders.index', ['status' => 'pending'])); ?>" class="badge <?php echo e(request('status')==='pending' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">قيد الانتظار (<?php echo e($counts['pending']); ?>)</a>
    <a href="<?php echo e(route('admin.subscription-orders.index', ['status' => 'completed'])); ?>" class="badge <?php echo e(request('status')==='completed' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">مكتمل (<?php echo e($counts['completed']); ?>)</a>
    <a href="<?php echo e(route('admin.subscription-orders.index', ['status' => 'declined'])); ?>" class="badge <?php echo e(request('status')==='declined' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">مرفوض (<?php echo e($counts['declined']); ?>)</a>
    <a href="<?php echo e(route('admin.subscription-orders.index', ['status' => 'failed'])); ?>" class="badge <?php echo e(request('status')==='failed' ? 'bg-dark' : 'bg-light text-dark border'); ?>" style="padding:8px 14px">فشل (<?php echo e($counts['failed']); ?>)</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        <?php if($subscriptionOrders->isEmpty()): ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-credit-card-2-front" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات اشتراك بعد</p>
            </div>
        <?php else: ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الباقة</th>
                        <th>المبلغ</th>
                        <th style="width:120px">الحالة</th>
                        <th>التاريخ</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $subscriptionOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-weight:500"><?php echo e($order->name); ?></td>
                        <td dir="ltr"><?php echo e($order->phone); ?></td>
                        <td><?php echo e($order->plan->title_ar ?? '—'); ?></td>
                        <td dir="ltr"><?php echo e(number_format((float) $order->amount, 2)); ?> <?php echo e($order->currency); ?></td>
                        <td>
                            <span class="badge bg-<?php echo e(['pending'=>'warning','completed'=>'success','declined'=>'danger','failed'=>'secondary'][$order->status] ?? 'secondary'); ?>"><?php echo e($order->status); ?></span>
                        </td>
                        <td><?php echo e($order->created_at->format('Y-m-d H:i')); ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('admin.subscription-orders.show', $order->id)); ?>" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="<?php echo e(route('admin.subscription-orders.destroy', $order->id)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3"><?php echo e($subscriptionOrders->links()); ?></div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\subscription-orders\index.blade.php ENDPATH**/ ?>