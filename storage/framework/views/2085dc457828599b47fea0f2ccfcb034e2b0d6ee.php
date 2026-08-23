<?php $__env->startPush('styles'); ?>
<style>
.perm-groups { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 14px; }
.perm-group { border: 1px solid #e5e9f2; border-radius: 10px; overflow: hidden; }
.perm-group-head { background: #f8f9fc; padding: 10px 14px; border-bottom: 1px solid #e5e9f2; }
.perm-group-head label { display: flex; align-items: center; gap: 8px; margin: 0; cursor: pointer; font-size: .9rem; }
.perm-group-items { padding: 10px 14px; display: flex; flex-direction: column; gap: 8px; }
.perm-item { display: flex; align-items: center; gap: 8px; margin: 0; font-size: .85rem; color: #4b5563; cursor: pointer; }
.perm-item input, .perm-group-head input { width: 15px; height: 15px; cursor: pointer; }
</style>
<?php $__env->stopPush(); ?>

<div class="perm-groups">
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="perm-group">
        <div class="perm-group-head">
            <label>
                <input type="checkbox" class="perm-group-toggle" data-group="<?php echo e($key); ?>">
                <?php echo e($group['label']); ?>

            </label>
        </div>
        <div class="perm-group-items">
            <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label class="perm-item">
                <input type="checkbox" name="perms[]" value="<?php echo e($item['id']); ?>"
                    class="perm-item-checkbox perm-group-<?php echo e($key); ?>"
                    <?php echo e(in_array($item['id'], $checked ?? []) ? 'checked' : ''); ?>>
                <?php echo e($item['label']); ?>

            </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
    document.querySelectorAll('.perm-group-toggle').forEach(function (toggle) {
        var group = toggle.dataset.group;
        var items = document.querySelectorAll('.perm-group-' + group);

        function syncToggle() {
            toggle.checked = items.length > 0 && Array.from(items).every(function (i) { return i.checked; });
        }
        syncToggle();

        toggle.addEventListener('change', function () {
            items.forEach(function (i) { i.checked = toggle.checked; });
        });
        items.forEach(function (i) { i.addEventListener('change', syncToggle); });
    });
})();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\admin\roles\_permission_groups.blade.php ENDPATH**/ ?>