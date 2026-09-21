<?php $__currentLoopData = explode("\n", $content); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(trim($line) === '') continue; ?>
    <?php if(str_starts_with(trim($line), '## ')): ?>
        <h2><?php echo e(trim(substr(trim($line), 3))); ?></h2>
    <?php else: ?>
        <p><?php echo e($line); ?></p>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\front\_legal_content.blade.php ENDPATH**/ ?>