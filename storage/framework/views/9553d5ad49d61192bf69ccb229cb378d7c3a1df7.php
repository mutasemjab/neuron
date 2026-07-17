<?php
    $footServices = \App\Models\Service::active()->limit(5)->get();
?>

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand">
        <a href="<?php echo e(route('home')); ?>" class="logo">
          <span class="logo-footer"><img src="<?php echo e(asset('assets_front/images/logo.png')); ?>" alt="<?php echo e(sett('identity.site_name')); ?>"></span>
        </a>
        <p><?php echo e(sett('footer.about_text')); ?></p>
        <div class="foot-social">
          <?php if(sett_raw('social.facebook_url')): ?><a href="<?php echo e(sett_raw('social.facebook_url')); ?>" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a><?php endif; ?>
          <?php if(sett_raw('social.instagram_url')): ?><a href="<?php echo e(sett_raw('social.instagram_url')); ?>" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg></a><?php endif; ?>
          <?php if(sett_raw('social.youtube_url')): ?><a href="<?php echo e(sett_raw('social.youtube_url')); ?>" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-4-.5-5.8a3 3 0 0 0-2.1-2.1C18.6 3.5 12 3.5 12 3.5s-6.6 0-8.4.6A3 3 0 0 0 1.5 6.2C1 8 1 12 1 12s0 4 .5 5.8a3 3 0 0 0 2.1 2.1c1.8.6 8.4.6 8.4.6s6.6 0 8.4-.6a3 3 0 0 0 2.1-2.1C23 16 23 12 23 12zM10 15.5v-7l6 3.5z"/></svg></a><?php endif; ?>
          <?php if($waNumber = sett_raw('contact.whatsapp_number')): ?><a href="https://wa.me/<?php echo e($waNumber); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.2-1.7-.9-2-1-.3-.1-.5-.2-.6.2s-.7 1-.9 1.1c-.2.2-.3.2-.6 0-.3-.2-1.2-.5-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6l.5-.5c.1-.2.2-.3.3-.5s0-.3 0-.5c-.1-.2-.6-1.5-.9-2-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.3.3-1 1-1 2.4s1 2.8 1.2 3c.2.2 2 3.1 5 4.3 2.5 1 2.5.7 3 .6.5 0 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.2-.3-.2-.6-.4zM12 2a10 10 0 0 0-8.6 15l-1.4 5 5.1-1.3A10 10 0 1 0 12 2z"/></svg></a><?php endif; ?>
        </div>
      </div>

      <div class="foot-col">
        <h4><?php echo e(__('front.footer_quick_links')); ?></h4>
        <ul>
          <li><a href="<?php echo e(route('home')); ?>#about"><?php echo e(__('front.nav_about')); ?></a></li>
          <li><a href="<?php echo e(route('home')); ?>#services"><?php echo e(__('front.nav_services')); ?></a></li>
          <li><a href="<?php echo e(route('home')); ?>#team"><?php echo e(__('front.nav_team')); ?></a></li>
          <li><a href="<?php echo e(route('articles.index')); ?>"><?php echo e(__('front.nav_articles')); ?></a></li>
          <li><a href="<?php echo e(route('home')); ?>#careers"><?php echo e(__('front.nav_careers')); ?></a></li>
        </ul>
      </div>

      <div class="foot-col">
        <h4><?php echo e(__('front.footer_our_services')); ?></h4>
        <ul>
          <?php $__currentLoopData = $footServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('home')); ?>#services"><?php echo e($footService->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>

      <div class="foot-col">
        <h4><?php echo e(__('front.footer_contact_us')); ?></h4>
        <ul class="foot-contact">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span><?php echo e(sett('contact.address_short')); ?></span></li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span dir="ltr"><?php echo e(sett_raw('contact.phone')); ?></span></li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><span><?php echo e(sett_raw('contact.email')); ?></span></li>
        </ul>
      </div>
    </div>

    <div class="foot-bottom">
      <span>© <?php echo e(now()->year); ?> <?php echo e(sett('footer.copyright_brand')); ?>. <?php echo e(sett('footer.rights_text')); ?>.</span>
      <div style="display:flex;gap:22px"><a href="#"><?php echo e(__('front.footer_privacy')); ?></a><a href="#"><?php echo e(__('front.footer_terms')); ?></a></div>
    </div>
  </div>
</footer>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>