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
<link href="<?php echo e(asset('assets_front/css/style.css')); ?>" rel="stylesheet">
<?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="<?php echo e(app()->getLocale() === 'en' ? 'lang-en' : 'lang-ar'); ?>">

<!-- ======= NAV ======= -->
<?php echo $__env->make('front.includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ======= CONTENT ======= -->
<?php echo $__env->yieldContent('content'); ?>

<!-- ======= FOOTER ======= -->
<?php echo $__env->make('front.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- floating buttons -->
<?php if($waNum = sett_raw('contact.whatsapp_number')): ?>
<a href="https://wa.me/<?php echo e($waNum); ?>" class="wa" aria-label="WhatsApp" target="_blank" rel="noopener">
  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.571-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.148.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg></a>
<?php endif; ?>
<button class="totop" id="toTop" aria-label="<?php echo e(__('front.scroll_to_top')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg></button>

<!-- ============ DOCTOR MODAL ============ -->
<div class="modal" id="docModal">
  <div class="modal-bg" data-close></div>
  <div class="modal-card">
    <button class="modal-close" data-close><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
    <div class="modal-img"><div class="ph" id="mImg"></div></div>
    <div class="modal-body">
      <span class="spec" id="mSpec"></span>
      <h3 id="mName"></h3>
      <p class="modal-sub" id="mTitle"></p>
      <div class="modal-section">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg><?php echo e(__('front.modal_bio')); ?></h4>
        <p id="mBio"></p>
      </div>
      <div class="modal-section">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg><?php echo e(__('front.modal_certs')); ?></h4>
        <ul id="mCerts"></ul>
      </div>
      <div class="modal-section">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><?php echo e(__('front.modal_specialties')); ?></h4>
        <div class="modal-tags" id="mTags"></div>
      </div>
      <a href="#booking" class="btn btn-primary" data-close style="width:100%;margin-top:10px"><span><?php echo e(__('front.book_with_doctor')); ?></span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
      </a>
    </div>
  </div>
</div>

<script src="<?php echo e(asset('assets_front/js/app.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\nuron\resources\views/layouts/front.blade.php ENDPATH**/ ?>