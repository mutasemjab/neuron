<?php $__env->startSection('title', sett('legal.terms_title') . ' — ' . sett('identity.site_name')); ?>
<?php $__env->startSection('meta_description', sett('legal.terms_title')); ?>

<?php $__env->startPush('styles'); ?>
<style>
.pp-page { padding: 150px 0 100px; }
.pp-wrap { max-width: 800px; margin: 0 auto; }
.pp-crumbs { color: var(--muted); font-size: .85rem; margin-bottom: 18px; }
.pp-crumbs a { color: var(--teal); text-decoration: none; }
.pp-crumbs span { margin: 0 6px; }
.pp-title { font-size: clamp(1.8rem, 3.6vw, 2.4rem); color: var(--ink); margin-bottom: 8px; }
.pp-updated { color: var(--muted); font-size: .85rem; margin-bottom: 32px; }
.pp-content h2 { font-size: 1.2rem; color: var(--ink); margin: 32px 0 12px; }
.pp-content h2:first-child { margin-top: 0; }
.pp-content p { color: var(--ink-soft); font-size: 1rem; line-height: 1.9; margin-bottom: 10px; }
@media(max-width:600px) { .pp-page { padding: 120px 0 70px; } }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="pp-page">
  <div class="wrap">
    <div class="pp-wrap">

      <div class="pp-crumbs">
        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('front.nav_home')); ?></a>
        <span>/</span>
        <span><?php echo e(sett('legal.terms_title')); ?></span>
      </div>

      <h1 class="pp-title"><?php echo e(sett('legal.terms_title')); ?></h1>
      <p class="pp-updated"><?php echo e(app()->getLocale() === 'ar' ? 'آخر تحديث' : 'Last updated'); ?>: <?php echo e(now()->translatedFormat('d M Y')); ?></p>
      <div class="pp-content">
        <?php echo $__env->make('front._legal_content', ['content' => sett('legal.terms_content')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\front\terms.blade.php ENDPATH**/ ?>