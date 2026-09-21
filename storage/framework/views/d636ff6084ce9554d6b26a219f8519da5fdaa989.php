<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(app()->getLocale() === 'ar' ? 'rtl' : 'ltr'); ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php
    // @section('title', $value) shorthand HTML-escapes $value on store, so decode
    // it back to plain text here — every {{ }} usage below escapes it exactly once.
    $seoTitle       = trim(html_entity_decode($__env->yieldContent('title')) ?: sett('seo.default_title'));
    $seoDescription = trim(html_entity_decode($__env->yieldContent('meta_description')) ?: sett('seo.default_description'));
    $seoKeywords    = sett('seo.default_keywords');
    $seoImage       = sett_raw('seo.og_image') ? uploaded_image(sett_raw('seo.og_image'), 'site') : asset('favicon.ico');
    $geo = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::class;
?>

<title><?php echo e($seoTitle); ?></title>
<meta name="description" content="<?php echo e($seoDescription); ?>">
<meta name="keywords" content="<?php echo e($seoKeywords); ?>">
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?php echo e(url()->current()); ?>">


<?php $__currentLoopData = $geo::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<link rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e($geo::getLocalizedURL($localeCode, null, [], true)); ?>" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<link rel="alternate" hreflang="x-default" href="<?php echo e($geo::getLocalizedURL($geo::getDefaultLocale(), null, [], true)); ?>" />


<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo e(sett('identity.site_name')); ?> <?php echo e(sett('identity.brand_tag')); ?>">
<meta property="og:title" content="<?php echo e($seoTitle); ?>">
<meta property="og:description" content="<?php echo e($seoDescription); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:image" content="<?php echo e($seoImage); ?>">
<meta property="og:locale" content="<?php echo e(app()->getLocale() === 'ar' ? 'ar_JO' : 'en_US'); ?>">


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seoTitle); ?>">
<meta name="twitter:description" content="<?php echo e($seoDescription); ?>">
<meta name="twitter:image" content="<?php echo e($seoImage); ?>">


<script type="application/ld+json">
<?php echo json_encode([
    '@context'  => 'https://schema.org',
    '@type'     => 'MedicalClinic',
    'name'      => sett('identity.site_name') . ' ' . sett('identity.brand_tag'),
    'url'       => url('/'),
    'telephone' => sett_raw('contact.phone'),
    'email'     => sett_raw('contact.email'),
    'address'   => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => sett('contact.address_short'),
        'addressCountry'  => 'JO',
    ],
    'medicalSpecialty' => 'Neurology',
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>

</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500;600;700;800;900&family=Cairo:wght@400;500;600;700&family=Sora:wght@400;500;600&display=swap" rel="stylesheet">
<link href="<?php echo e(asset_v('assets_front/css/style.css')); ?>" rel="stylesheet">
<?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="<?php echo e(app()->getLocale() === 'en' ? 'lang-en' : 'lang-ar'); ?>">

<!-- ======= NAV ======= -->
<?php echo $__env->make('front.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ======= CONTENT ======= -->
<?php echo $__env->yieldContent('content'); ?>

<!-- ======= FOOTER ======= -->
<?php echo $__env->make('front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- ======= FLOATING ACTION BUTTONS ======= -->
<div class="fab-stack">
  
  <a href="tel:<?php echo e(sett_raw('contact.phone')); ?>" class="fab fab-call" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Call Us'); ?>">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
    <span class="fab-tooltip"><?php echo e(app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Call Us'); ?></span>
  </a>
  
  <button class="fab fab-chat" id="chatToggle" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'تحدث معنا' : 'Chat with us'); ?>">
    <svg class="fab-chat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
    <svg class="fab-chat-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    <span class="fab-badge" id="chatBadge"></span>
    <span class="fab-tooltip"><?php echo e(app()->getLocale() === 'ar' ? 'تحدث معنا' : 'Chat with us'); ?></span>
  </button>
</div>

<button class="totop" id="toTop" aria-label="<?php echo e(__('front.scroll_to_top')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg></button>

<!-- ======= CHAT WIDGET ======= -->
<div class="chat-widget" id="chatWidget" role="dialog" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'المساعد الذكي' : 'AI Assistant'); ?>">
  <div class="chat-header">
    <div class="chat-avatar">
      <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
    </div>
    <div class="chat-header-info">
      <strong><?php echo e(app()->getLocale() === 'ar' ? 'سارة' : 'Sara'); ?></strong>
      <span><span class="chat-online-dot"></span><?php echo e(app()->getLocale() === 'ar' ? 'متاحة الآن' : 'Available now'); ?></span>
    </div>
    <button class="chat-header-close" id="chatClose" aria-label="Close">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>
  </div>

  <div class="chat-messages" id="chatMessages">
    <div class="chat-msg chat-msg--bot">
      <div class="chat-bubble">
        <?php echo e(app()->getLocale() === 'ar'
          ? 'أهلاً! أنا سارة من فريق ' . sett('identity.site_name') . '. كيف أقدر أساعدك اليوم؟'
          : 'Hello! I\'m Sara from the ' . sett('identity.site_name') . ' team. How can I help you today?'); ?>

      </div>
    </div>
  </div>

  <div class="chat-footer">
    <div class="chat-input-wrap">
      <textarea class="chat-input" id="chatInput" rows="1"
        placeholder="<?php echo e(app()->getLocale() === 'ar' ? 'اكتب رسالتك...' : 'Type your message...'); ?>"
        maxlength="1000"></textarea>
      <button class="chat-send" id="chatSend" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'إرسال' : 'Send'); ?>">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/></svg>
      </button>
    </div>
    <div class="chat-footer-actions">
      <button class="chat-clear" id="chatClear">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.33"/></svg>
        <?php echo e(app()->getLocale() === 'ar' ? 'محادثة جديدة' : 'New chat'); ?>

      </button>
    </div>
  </div>
</div>

<?php
  $chatMsgUrl  = route('chatbot.message');
  $chatClrUrl  = route('chatbot.clear');
  $chatGreeting = app()->getLocale() === 'ar'
    ? 'أهلاً! أنا سارة من فريق ' . sett('identity.site_name') . '. كيف أقدر أساعدك اليوم؟'
    : 'Hello! I\'m Sara from the ' . sett('identity.site_name') . ' team. How can I help you today?';
?>
<script>
window.ChatbotConfig = {
  messageUrl: <?php echo json_encode($chatMsgUrl, 15, 512) ?>,
  clearUrl:   <?php echo json_encode($chatClrUrl, 15, 512) ?>,
  csrf:       <?php echo json_encode(csrf_token(), 15, 512) ?>,
  locale:     <?php echo json_encode(app()->getLocale(), 15, 512) ?>,
  greeting:   <?php echo json_encode($chatGreeting, 15, 512) ?>,
};
</script>

<!-- ============ SUBSCRIPTION CHECKOUT MODAL ============ -->
<div class="modal" id="subModal">
  <div class="modal-bg" data-close></div>
  <div class="modal-card sub-modal-card">
    <button class="modal-close" data-close><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
    <div class="modal-body">

      <div class="sub-plan-summary">
        <span id="subPlanTitle"></span>
        <span class="sub-plan-price"><b id="subPlanPrice"></b><small id="subPlanSuffix"></small></span>
      </div>

      <div class="sub-step" id="subStepForm">
        <h3><?php echo e(__('front.sub_modal_title')); ?></h3>
        <p class="modal-sub"><?php echo e(__('front.sub_modal_subtitle')); ?></p>
        <form id="subCheckoutForm" novalidate>
          <div class="field">
            <label><?php echo e(__('front.form_full_name')); ?> <span class="req">*</span></label>
            <input type="text" name="name" required placeholder="<?php echo e(__('front.form_full_name_ph')); ?>">
          </div>
          <div class="field">
            <label><?php echo e(__('front.form_phone')); ?> <span class="req">*</span></label>
            <input type="tel" name="phone" dir="ltr" required placeholder="<?php echo e(__('front.form_phone_ph')); ?>">
          </div>
          <div class="field">
            <label><?php echo e(__('front.sub_form_email')); ?></label>
            <input type="email" name="email" dir="ltr" placeholder="<?php echo e(__('front.sub_form_email_ph')); ?>">
          </div>
          <p class="sub-error" id="subFormError" style="display:none"></p>
          <button type="submit" class="btn btn-primary" style="width:100%"><span><?php echo e(__('front.sub_form_submit')); ?></span></button>
        </form>
      </div>

      <div class="sub-step" id="subStepLoading" style="display:none">
        <div class="sub-spinner"></div>
        <p id="subLoadingText"><?php echo e(__('front.sub_processing')); ?></p>
      </div>

      <div class="sub-step" id="subStepPayment" style="display:none">
        <div id="payment-form"></div>
      </div>

      <div class="sub-step sub-step-result" id="subStepResult" style="display:none">
        <div class="sub-result-icon" id="subResultIcon"></div>
        <h3 id="subResultTitle"></h3>
        <p id="subResultText"></p>
        <button type="button" class="btn btn-ghost" id="subResultClose" style="width:100%"><?php echo e(__('front.sub_close')); ?></button>
      </div>

    </div>
  </div>
</div>

<script>
window.SubscriptionCheckoutConfig = {
  checkoutUrlTemplate: <?php echo json_encode(route('subscriptions.checkout', ['subscriptionPlan' => '__PLAN_ID__']), 512) ?>,
  resultUrlTemplate:   <?php echo json_encode(route('subscriptions.result', ['subscriptionOrder' => '__ORDER_ID__']), 512) ?>,
  csrf:                <?php echo json_encode(csrf_token(), 15, 512) ?>,
  locale:              <?php echo json_encode(app()->getLocale(), 15, 512) ?>,
  i18n: {
    processing:   <?php echo json_encode(__('front.sub_processing'), 15, 512) ?>,
    paying:       <?php echo json_encode(__('front.sub_paying'), 15, 512) ?>,
    successTitle: <?php echo json_encode(__('front.sub_success_title'), 15, 512) ?>,
    successText:  <?php echo json_encode(__('front.sub_success_text'), 15, 512) ?>,
    failedTitle:  <?php echo json_encode(__('front.sub_failed_title'), 15, 512) ?>,
    failedText:   <?php echo json_encode(__('front.sub_failed_text'), 15, 512) ?>,
    initFailed:   <?php echo json_encode(__('front.sub_init_failed'), 15, 512) ?>,
    tryAgain:     <?php echo json_encode(__('front.sub_try_again'), 15, 512) ?>,
  },
};
</script>

<script src="<?php echo e(asset_v('assets_front/js/app.js')); ?>"></script>
<script src="<?php echo e(asset_v('assets_front/js/subscription-checkout.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views\layouts\front.blade.php ENDPATH**/ ?>