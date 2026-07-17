<?php
    $navServices = \App\Models\Service::active()->get();
    $waNumber = sett_raw('contact.whatsapp_number');
?>

<!-- ============ HEADER ============ -->
<header id="header">
  <div class="topbar">
    <div class="wrap">
      <div class="topbar-l">
        <a href="tel:<?php echo e(sett_raw('contact.phone')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span><?php echo e(sett('contact.hotline_note')); ?>: <?php echo e(sett_raw('contact.phone')); ?></span></a>
        <a href="mailto:<?php echo e(sett_raw('contact.email')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><span><?php echo e(sett_raw('contact.email')); ?></span></a>
      </div>
      <div class="topbar-r">
        <a href="<?php echo e(route('home')); ?>#locations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span><?php echo e(sett_raw('contact.branches_count')); ?> <?php echo e(__('front.topbar_branches')); ?></span></a>
        <span style="opacity:.4">|</span>
        <span><?php echo e(__('front.topbar_hours')); ?>: <?php echo e(sett('contact.working_hours')); ?></span>
        <span style="opacity:.4">|</span>
        <a href="<?php echo e(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL(app()->getLocale() === 'ar' ? 'en' : 'ar')); ?>" rel="alternate"><?php echo e(__('front.lang_switch')); ?></a>
      </div>
    </div>
  </div>

  <nav class="nav">
    <div class="wrap">
      <a href="<?php echo e(route('home')); ?>" class="logo" aria-label="<?php echo e(sett('identity.site_name')); ?>">
      
        <span class="logo-txt"><img src="<?php echo e(asset('assets_front/images/logo.png')); ?>" alt=""></span>
      </a>

      <div class="nav-links">
        <a href="<?php echo e(route('home')); ?>#home"><?php echo e(__('front.nav_home')); ?></a>
        <a href="<?php echo e(route('home')); ?>#about"><?php echo e(__('front.nav_about')); ?></a>
        <div class="has-drop">
          <a href="<?php echo e(route('home')); ?>#services"><?php echo e(__('front.nav_services')); ?></a>
          <div class="drop">
            <?php $__currentLoopData = $navServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('home')); ?>#services"><?php echo e($navService->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <a href="<?php echo e(route('home')); ?>#team"><?php echo e(__('front.nav_team')); ?></a>
        <a href="<?php echo e(route('home')); ?>#locations"><?php echo e(__('front.nav_locations')); ?></a>
        <a href="<?php echo e(route('articles.index')); ?>"><?php echo e(__('front.nav_articles')); ?></a>
        <a href="<?php echo e(route('home')); ?>#faq"><?php echo e(__('front.nav_faq')); ?></a>
      </div>

      <div class="nav-cta">
        <a href="<?php echo e(route('home')); ?>#booking" class="btn btn-primary"><span><?php echo e(__('front.book_now')); ?></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </a>
        <button class="burger" id="burger" aria-label="<?php echo e(__('front.nav_menu')); ?>"><span></span><span></span><span></span></button>
      </div>
    </div>
  </nav>
</header>

<!-- mobile menu -->
<div class="mobile-menu" id="mobileMenu">
  <a href="<?php echo e(route('home')); ?>#home"><?php echo e(__('front.nav_home')); ?></a>
  <a href="<?php echo e(route('home')); ?>#about"><?php echo e(__('front.nav_about')); ?></a>
  <a href="<?php echo e(route('home')); ?>#services"><?php echo e(__('front.nav_services')); ?></a>
  <a href="<?php echo e(route('home')); ?>#team"><?php echo e(__('front.nav_team')); ?></a>
  <a href="<?php echo e(route('home')); ?>#locations"><?php echo e(__('front.nav_locations')); ?></a>
  <a href="<?php echo e(route('home')); ?>#videos"><?php echo e(__('front.nav_videos')); ?></a>
  <a href="<?php echo e(route('articles.index')); ?>"><?php echo e(__('front.nav_articles')); ?></a>
  <a href="<?php echo e(route('home')); ?>#faq"><?php echo e(__('front.nav_faq')); ?></a>
  <a href="<?php echo e(route('home')); ?>#careers"><?php echo e(__('front.nav_careers')); ?></a>
  <a href="<?php echo e(route('home')); ?>#booking" class="btn btn-primary"><span><?php echo e(__('front.book_now')); ?></span></a>
</div>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views/front/includes/navbar.blade.php ENDPATH**/ ?>