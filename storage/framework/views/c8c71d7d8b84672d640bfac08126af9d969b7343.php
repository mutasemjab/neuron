<?php $__env->startSection('title', sett('articles_section.heading_main') . ' ' . sett('articles_section.heading_highlight') . ' — ' . sett('identity.site_name')); ?>
<?php $__env->startSection('meta_description', sett('seo.default_description')); ?>

<?php $__env->startSection('content'); ?>

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow"><?php echo e(sett('articles_section.eyebrow')); ?></span>
    <h1><?php echo e(sett('articles_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('articles_section.heading_highlight')); ?></span></h1>
    <div class="crumbs"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('front.nav_home')); ?></a> / <?php echo e(__('front.nav_articles')); ?></div>
  </div>
</div>

<section class="page-section">
  <div class="wrap">
    <div class="art-grid">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(route('articles.show', $article)); ?>" class="art reveal" style="text-decoration:none;color:inherit">
        <div class="art-img">
          <div class="ph" data-label="<?php echo e($article->category); ?>">
            <?php if($article->image): ?>
              <img data-src="<?php echo e($article->image_url); ?>" alt="<?php echo e($article->title); ?>">
            <?php endif; ?>
          </div>
          <?php if($article->category): ?><span class="art-cat"><?php echo e($article->category); ?></span><?php endif; ?>
        </div>
        <div class="art-body">
          <div class="art-meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg><?php echo e($article->published_at?->translatedFormat('d M Y')); ?></span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg><?php echo e($article->read_minutes); ?> <?php echo e(__('front.min_read')); ?></span>
          </div>
          <h3><?php echo e($article->title); ?></h3>
          <p><?php echo e($article->excerpt); ?></p>
          <span class="art-read"><?php echo e(__('front.read_article')); ?>

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
          </span>
        </div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($articles->hasPages()): ?>
    <div class="pager">
      <?php if($articles->onFirstPage()): ?>
        <span class="btn btn-ghost" style="opacity:.4"><?php echo e(__('front.prev')); ?></span>
      <?php else: ?>
        <a href="<?php echo e($articles->previousPageUrl()); ?>" class="btn btn-ghost"><?php echo e(__('front.prev')); ?></a>
      <?php endif; ?>
      <?php if($articles->hasMorePages()): ?>
        <a href="<?php echo e($articles->nextPageUrl()); ?>" class="btn btn-primary"><?php echo e(__('front.next')); ?></a>
      <?php else: ?>
        <span class="btn btn-primary" style="opacity:.4"><?php echo e(__('front.next')); ?></span>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\front\articles\index.blade.php ENDPATH**/ ?>