
<?php $__env->startSection('title', __('front.page_title') . ' | ' . sett('identity.site_name')); ?>
<?php $__env->startSection('meta_description', sett('seo.default_description')); ?>

<?php $__env->startSection('content'); ?>

<?php
    $featuredServices = $services->where('is_featured', true);
    $mainBranch = $branches->firstWhere('is_main', true) ?? $branches->first();
?>

<!-- ============ HERO ============ -->
<section class="hero" id="home">
  <div class="hero-bg">
    <?php if(sett_raw('hero.bg_image')): ?>
      <img data-src="<?php echo e(uploaded_image(sett_raw('hero.bg_image'), 'site')); ?>" alt="<?php echo e(sett('identity.site_name')); ?>">
    <?php endif; ?>
  </div>

  <div class="spine-motif" aria-hidden="true">
    <svg viewBox="0 0 120 900" preserveAspectRatio="none">
      <path class="spine-path" d="M60 0 C40 60,80 120,60 180 C40 240,80 300,60 360 C40 420,80 480,60 540 C40 600,80 660,60 720 C40 780,80 840,60 900"/>
      <g>
        <circle class="node" cx="60" cy="90" r="5"/>
        <circle class="node" cx="60" cy="270" r="5"/>
        <circle class="node" cx="60" cy="450" r="5"/>
        <circle class="node" cx="60" cy="630" r="5"/>
        <circle class="node" cx="60" cy="810" r="5"/>
      </g>
      <circle class="pulse" r="6" cx="60" cy="0">
        <animateMotion dur="4s" repeatCount="indefinite" path="M60 0 C40 60,80 120,60 180 C40 240,80 300,60 360 C40 420,80 480,60 540 C40 600,80 660,60 720 C40 780,80 840,60 900"/>
        <animate attributeName="opacity" values="0;1;1;0" dur="4s" repeatCount="indefinite"/>
      </circle>
    </svg>
  </div>

  <div class="wrap">
    <div class="hero-inner">
      <br>
      <span class="eyebrow"><?php echo e(sett('hero.eyebrow')); ?></span>
      <h1>
        <span class="ln"><i><?php echo e(sett('hero.heading_line1')); ?></i></span>
        <span class="ln"><i><?php echo e(sett('hero.heading_line2')); ?></i></span>
        <span class="ln"><i><?php echo e(sett('hero.heading_line3')); ?></i></span>
      </h1>
      <p class="lead"><?php echo e(sett('hero.lead')); ?></p>
      <div class="cta-row">
        <a href="<?php echo e(route('booking.page')); ?>" class="btn btn-primary btn-lg"><span><?php echo e(__('front.book_now')); ?></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="#services" class="btn btn-ghost btn-lg"><?php echo e(__('front.explore_services')); ?></a>
      </div>
    </div>
  </div>

  <div class="hero-chips">
    <div class="wrap">
      <?php $__currentLoopData = $heroStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="chip"><b data-count="<?php echo e($stat->number); ?>" <?php if($stat->suffix): ?> data-suffix="<?php echo e($stat->suffix); ?>" <?php endif; ?>>0</b><span><?php echo e($stat->label); ?></span></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  
</section>
<div class="trust"></div>

<!-- ============ SERVICES (featured cards) ============ -->
<section class="services" id="services">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php echo e(sett('services_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('services_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('services_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('services_section.paragraph')); ?></p>
    </div>

    <div class="serv-grid">
      <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="serv-card reveal <?php if(!$loop->first): ?> d<?php echo e($loop->iteration - 1); ?> <?php endif; ?>" data-service="<?php echo e($service->id); ?>">
        <div class="ph" data-label="<?php echo e($service->title); ?>">
          <?php if($service->image): ?><img data-src="<?php echo e($service->image_url); ?>" alt="<?php echo e($service->title); ?>"><?php endif; ?>
        </div>
        <div class="body">
          <span class="serv-num">/ <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?></span>
          <h3><?php echo e($service->title); ?></h3>
          <p><?php echo e($service->description); ?></p>
          <span class="serv-more"><?php echo e(__('front.read_details')); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section class="about" id="about">
  <div class="wrap">
    <div class="about-grid">
      <div class="about-media reveal">
        <div class="main-img ph" data-label="<?php echo e(sett('about.heading_main')); ?>">
          <?php if(sett_raw('about.image_main')): ?><img data-src="<?php echo e(uploaded_image(sett_raw('about.image_main'), 'site')); ?>" alt="<?php echo e(sett('identity.site_name')); ?>"><?php endif; ?>
        </div>
        <div class="sub-img ph" data-label="<?php echo e(sett('identity.site_name')); ?>">
          <?php if(sett_raw('about.image_sub')): ?><img data-src="<?php echo e(uploaded_image(sett_raw('about.image_sub'), 'site')); ?>" alt="<?php echo e(sett('identity.site_name')); ?>"><?php endif; ?>
        </div>
        <div class="about-badge"><b><?php echo e(sett_raw('about.badge_number')); ?></b><span><?php echo e(sett('about.badge_text')); ?></span></div>
      </div>

      <div class="about-txt reveal d1">
        <span class="eyebrow"><?php echo e(sett('about.eyebrow')); ?></span>
        <h2><?php echo e(sett('about.heading_main')); ?> <span class="tealword"><?php echo e(sett('about.heading_highlight')); ?></span></h2>
        <p><?php echo e(sett('about.paragraph')); ?></p>

        <div class="vm">
          <span class="vm-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v6m0 6v6m11-7h-6M7 12H1"/></svg></span>
          <div><h4><?php echo e(sett('about.vision_title')); ?></h4><p><?php echo e(sett('about.vision_text')); ?></p></div>
        </div>
        <div class="vm">
          <span class="vm-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span>
          <div><h4><?php echo e(sett('about.mission_title')); ?></h4><p><?php echo e(sett('about.mission_text')); ?></p></div>
        </div>

        <a href="#team" class="btn btn-dark" style="margin-top:12px"><span><?php echo e(__('front.know_our_team')); ?></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============ STATS ============ -->
<section class="stats">
  <div class="wrap">
    <div class="stats-badge-wrap reveal">
      <span class="stats-badge"><span class="pulse-dot"></span> <?php echo e(sett('stats_section.eyebrow')); ?></span>
    </div>
    <div class="stats-grid">
      <?php $__currentLoopData = $mainStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="stat reveal <?php if(!$loop->first): ?> d<?php echo e($loop->iteration - 1); ?> <?php endif; ?>"><b data-count="<?php echo e($stat->number); ?>" <?php if($stat->suffix): ?> data-suffix="<?php echo e($stat->suffix); ?>" <?php endif; ?>>0</b><span><?php echo e($stat->label); ?></span></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- ============ TEAM ============ -->
<section class="team" id="team">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow"><?php echo e(sett('team_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('team_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('team_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('team_section.paragraph')); ?></p>
    </div>

    <div class="team-grid" id="teamGrid">
      <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $initials = collect(explode(' ', $doctor->name))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('.');
      ?>
      <div class="doc reveal <?php if($loop->iteration % 4 !== 1): ?> d<?php echo e(($loop->iteration - 1) % 4); ?> <?php endif; ?>"
           data-href="<?php echo e(route('doctors.show', $doctor)); ?>"
           style="cursor:pointer">
        <div class="doc-img"><div class="ph" data-label="<?php echo e($initials); ?>">
            <?php if($doctor->image): ?><img data-src="<?php echo e($doctor->image_url); ?>" alt="<?php echo e($doctor->name); ?>"><?php endif; ?>
          </div>
          <div class="doc-social">
            <a href="<?php echo e(route('doctors.show', $doctor)); ?>" aria-label="<?php echo e(__('front.view_doctor_profile')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></a>
            <a href="<?php echo e(route('booking.page')); ?>" aria-label="<?php echo e(__('front.book_now')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg></a>
          </div>
        </div>
        <div class="doc-body">
          <span class="spec"><?php echo e($doctor->specialization); ?></span>
          <h3><?php echo e($doctor->name); ?></h3>
          <p><?php echo e($doctor->title); ?></p>
          <span class="doc-view"><?php echo e(__('front.view_doctor_profile')); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- ============ SERVICES DETAIL LIST ============ -->
<section class="svc-list" id="svc-list">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php echo e(sett('svc_list_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('svc_list_section.heading')); ?></h2>
      <p><?php echo e(sett('svc_list_section.paragraph')); ?></p>
    </div>

    <div class="svc-rows reveal d1" id="svcRows">
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="svc-row<?php echo e($loop->iteration > 3 ? ' svc-row--hidden' : ''); ?>" data-service="<?php echo e($service->id); ?>">
        <span class="n"><?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?></span>
        <div class="t"><h3><?php echo e($service->title); ?></h3><p><?php echo e($service->description); ?></p></div>
        <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7M7 7h10v10"/></svg></span>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($services->count() > 3): ?>
    <div class="svc-more-wrap reveal d2">
      <button class="svc-more-btn" id="svcMoreBtn"
        data-label-more="<?php echo e(__('front.svc_show_more')); ?>"
        data-label-less="<?php echo e(__('front.svc_show_less')); ?>">
        <span><?php echo e(__('front.svc_show_more')); ?></span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
      </button>
    </div>
    <?php endif; ?>
  </div>
</section>

<!-- ============ SUBSCRIPTION PLANS ============ -->
<?php if($subscriptionPlans->isNotEmpty()): ?>
<section class="plans" id="plans">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow"><?php echo e(sett('plans_section.eyebrow')); ?></span>
    </div>

    <div class="plans-grid reveal d1">
      <?php $__currentLoopData = $subscriptionPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="plan-card <?php if($plan->is_featured): ?> featured <?php endif; ?>">
        <?php if($plan->badge): ?><span class="plan-badge"><?php echo e($plan->badge); ?></span><?php endif; ?>
        <div class="plan-head">
          <h3><?php echo e($plan->title); ?></h3>
          <?php if($plan->subtitle): ?><p><?php echo e($plan->subtitle); ?></p><?php endif; ?>
        </div>
        <div class="plan-price">
          <b><?php echo e(rtrim(rtrim(number_format((float) $plan->price, 2), '0'), '.')); ?></b>
          <?php if($plan->price_suffix): ?><span><?php echo e($plan->price_suffix); ?></span><?php endif; ?>
        </div>
        <?php if(count($plan->features_list)): ?>
        <ul class="plan-features">
          <?php $__currentLoopData = $plan->features_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg><span><?php echo e($feature); ?></span></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
        <button type="button" class="btn <?php echo e($plan->is_featured ? 'btn-primary' : 'btn-ghost'); ?> plan-cta"
                data-plan-id="<?php echo e($plan->id); ?>"
                data-plan-title="<?php echo e($plan->title); ?>"
                data-plan-price="<?php echo e(rtrim(rtrim(number_format((float) $plan->price, 2), '0'), '.')); ?>"
                data-plan-suffix="<?php echo e($plan->price_suffix); ?>">
          <span><?php echo e($plan->button_text ?: __('front.subscribe_now')); ?></span>
        </button>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============ INSURANCE ============ -->
<section class="insurance" id="insurance">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow"><span class="pulse-dot"></span> <?php echo e(sett('insurance_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('insurance_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('insurance_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('insurance_section.paragraph')); ?></p>
    </div>
    <div class="ins-grid reveal d1">
      <?php $__currentLoopData = $insuranceCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="ins-card"><b><?php echo e($company->name); ?></b><?php if($company->subtitle): ?><small><?php echo e($company->subtitle); ?></small><?php endif; ?></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if($insuranceCompanies->count() > 4): ?>
    <div class="ins-more-wrap reveal d2">
      <button type="button" class="btn btn-ghost" id="insMoreBtn">
        <span><?php echo e(app()->getLocale() === 'ar' ? 'عرض المزيد' : 'Show More'); ?></span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
      </button>
    </div>
    <?php endif; ?>
  </div>
</section>

<?php if($insuranceCompanies->count() > 4): ?>
<!-- ============ INSURANCE — FULL LIST MODAL ============ -->
<div class="modal" id="insModal">
  <div class="modal-bg" data-close></div>
  <div class="modal-card ins-modal-card">
    <button class="modal-close" data-close><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
    <div class="modal-body">
      <h3><?php echo e(sett('insurance_section.heading_main')); ?> <?php echo e(sett('insurance_section.heading_highlight')); ?></h3>
      <p class="modal-sub"><?php echo e(sett('insurance_section.paragraph')); ?></p>
      <div class="ins-modal-grid">
        <?php $__currentLoopData = $insuranceCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="ins-card"><b><?php echo e($company->name); ?></b><?php if($company->subtitle): ?><small><?php echo e($company->subtitle); ?></small><?php endif; ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- ============ VIDEOS ============ -->
<?php if($videos->isNotEmpty()): ?>
<?php $mainVideo = $videos->firstWhere('is_main', true); $smallVideos = $videos->where('is_main', false); ?>
<section class="videos" id="videos">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php echo e(sett('videos_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('videos_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('videos_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('videos_section.paragraph')); ?></p>
    </div>

    <div class="vid-grid reveal d1">
      <?php if($mainVideo): ?>
      <button type="button" class="vid main" data-video-url="<?php echo e($mainVideo->embed_url); ?>" data-fallback-url="<?php echo e($mainVideo->video_url); ?>">
        <div class="ph" data-label="<?php echo e($mainVideo->title); ?>">
          <?php if($mainVideo->thumbnail): ?><img data-src="<?php echo e($mainVideo->thumbnail_url); ?>" alt="<?php echo e($mainVideo->title); ?>"><?php endif; ?>
        </div>
        <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <div class="vid-info"><?php if($mainVideo->tag): ?><span class="tag"><?php echo e($mainVideo->tag); ?></span><?php endif; ?><h3><?php echo e($mainVideo->title); ?></h3></div>
      </button>
      <?php endif; ?>
      <div class="vid-col">
        <?php $__currentLoopData = $smallVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button type="button" class="vid small" data-video-url="<?php echo e($video->embed_url); ?>" data-fallback-url="<?php echo e($video->video_url); ?>">
          <div class="ph" data-label="<?php echo e($video->title); ?>">
            <?php if($video->thumbnail): ?><img data-src="<?php echo e($video->thumbnail_url); ?>" alt="<?php echo e($video->title); ?>"><?php endif; ?>
          </div>
          <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          <div class="vid-info"><?php if($video->tag): ?><span class="tag"><?php echo e($video->tag); ?></span><?php endif; ?><h3><?php echo e($video->title); ?></h3></div>
        </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</section>

<!-- ============ VIDEO PLAYER MODAL ============ -->
<div class="modal" id="videoModal">
  <div class="modal-bg" data-close></div>
  <div class="modal-card video-modal-card">
    <button class="modal-close" data-close><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg></button>
    <div class="video-modal-frame" id="videoModalFrame"></div>
  </div>
</div>
<?php endif; ?>

<!-- ============ LOCATIONS ============ -->
<section class="locations" id="locations">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php echo e(sett('locations_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('locations_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('locations_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('locations_section.paragraph')); ?></p>
    </div>

    <div class="loc-grid">
      <div class="loc-list reveal">
        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="loc-card <?php if($branch->is_main || ($mainBranch && $branch->id === $mainBranch->id)): ?> active <?php endif; ?>" data-map="<?php echo e($branch->map_query); ?>">
          <div class="lc-top"><h3><?php echo e($branch->name); ?></h3><?php if($branch->badge): ?><span class="lc-badge"><?php echo e($branch->badge); ?></span><?php endif; ?></div>
          <div class="loc-detail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span><?php echo e($branch->address); ?></span></div>
          <div class="loc-detail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span dir="ltr"><?php echo e($branch->phone); ?></span>&nbsp;|&nbsp;<span><?php echo e($branch->working_hours); ?></span></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="loc-map reveal d1">
        <iframe id="mapFrame" src="https://maps.google.com/maps?q=<?php echo e(urlencode($mainBranch->map_query ?? '')); ?>&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy" title="<?php echo e(sett('identity.site_name')); ?>"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<?php if($testimonials->isNotEmpty()): ?>
<section class="testi" id="testi">

  
  <div class="testi-orb testi-orb-1" aria-hidden="true"></div>
  <div class="testi-orb testi-orb-2" aria-hidden="true"></div>
  <div class="testi-orb testi-orb-3" aria-hidden="true"></div>

  <div class="wrap testi-wrap">

    
    <div class="testi-header reveal">
      <div class="sec-head center">
        <span class="eyebrow testi-eyebrow"><?php echo e(sett('testimonials_section.eyebrow')); ?></span>
        <h2><?php echo e(sett('testimonials_section.heading')); ?></h2>
      </div>
      
      <div class="testi-rating-badge">
        <div class="testi-badge-stars">★★★★★</div>
        <div class="testi-badge-info">
          <strong><?php echo e($testimonials->avg('rating') >= 1 ? number_format($testimonials->avg('rating'), 1) : '5.0'); ?></strong>
          <span><?php echo e($testimonials->count()); ?>+ <?php echo e(app()->getLocale() === 'ar' ? 'تقييم موثق' : 'verified reviews'); ?></span>
        </div>
      </div>
    </div>

    
    
    <div class="testi-stage reveal d1">

      
      <button class="testi-arrow testi-arrow-prev" id="testiPrev" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'التالي' : 'Previous'); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
      </button>

      
      <div class="testi-viewport">
        <div class="testi-track" id="testiTrack">
          <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $tInitials = collect(explode(' ', $testimonial->patient_name))
              ->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('');
          ?>
          <div class="testi-slide">
            <div class="testi-card">

              
              <div class="testi-wm-q" aria-hidden="true">❝</div>

              
              <div class="testi-stars" aria-label="<?php echo e($testimonial->rating); ?> stars">
                <?php for($s = 1; $s <= 5; $s++): ?>
                  <span class="testi-star <?php echo e($s <= $testimonial->rating ? 'testi-star--on' : ''); ?>" style="--d:<?php echo e($s * 80); ?>ms">★</span>
                <?php endfor; ?>
              </div>

              
              <blockquote class="testi-quote"><?php echo e($testimonial->quote); ?></blockquote>

              
              <?php if($testimonial->doctor || $testimonial->procedure): ?>
              <div class="testi-pills">
                <?php if($testimonial->doctor): ?>
                <span class="testi-pill">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  <?php echo e($testimonial->doctor->name); ?>

                </span>
                <?php endif; ?>
                <?php if($testimonial->procedure): ?>
                <span class="testi-pill testi-pill--alt">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                  <?php echo e($testimonial->procedure); ?>

                </span>
                <?php endif; ?>
              </div>
              <?php endif; ?>

              
              <div class="testi-author">
                <div class="testi-av-wrap">
                  <div class="av ph" data-label="<?php echo e($tInitials); ?>">
                    <?php if($testimonial->avatar): ?><img data-src="<?php echo e($testimonial->avatar_url); ?>" alt="<?php echo e($testimonial->patient_name); ?>">
                    <?php else: ?>
                    <img data-src="<?php echo e(asset('assets_front/images/patient.png')); ?>" alt="<?php echo e($testimonial->patient_name); ?>">
                    <?php endif; ?>
                  </div>
                  <span class="testi-verified-dot" title="<?php echo e(app()->getLocale() === 'ar' ? 'مريض موثق' : 'Verified Patient'); ?>">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                  </span>
                </div>
                <div class="testi-meta">
                  <strong><?php echo e($testimonial->patient_name); ?></strong>
                  <span><?php echo e($testimonial->role_text); ?></span>
                </div>
                <span class="testi-verified-label">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                  <?php echo e(app()->getLocale() === 'ar' ? 'مريض موثق' : 'Verified Patient'); ?>

                </span>
              </div>

            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      
      <button class="testi-arrow testi-arrow-next" id="testiNext" aria-label="<?php echo e(app()->getLocale() === 'ar' ? 'السابق' : 'Next'); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </div>

    
    <div class="testi-footer reveal d2">
      <div class="testi-nav" id="testiNav"></div>
      <span class="testi-counter" id="testiCounter"></span>
    </div>

  </div>
</section>
<?php endif; ?>

<!-- ============ ARTICLES ============ -->
<?php if($articles->isNotEmpty()): ?>
<section class="articles" id="articles">
  <div class="wrap">
    <div class="art-head reveal">
      <div class="sec-head" style="margin-bottom:0">
        <span class="eyebrow"><?php echo e(sett('articles_section.eyebrow')); ?></span>
        <h2><?php echo e(sett('articles_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('articles_section.heading_highlight')); ?></span></h2>
      </div>
      <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-ghost"><?php echo e(__('front.all_articles')); ?>

        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>

    <div class="art-grid">
      <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <article class="art reveal <?php if(!$loop->first): ?> d<?php echo e($loop->iteration - 1); ?> <?php endif; ?>">
        <a href="<?php echo e(route('articles.show', $article)); ?>" style="color:inherit;text-decoration:none">
        <div class="art-img">
          <div class="ph" data-label="<?php echo e($article->category); ?>">
            <?php if($article->image): ?><img data-src="<?php echo e($article->image_url); ?>" alt="<?php echo e($article->title); ?>"><?php endif; ?>
          </div>
          <?php if($article->category): ?><span class="art-cat"><?php echo e($article->category); ?></span><?php endif; ?>
        </div>
        <div class="art-body">
          <div class="art-meta"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg><?php echo e($article->published_at?->translatedFormat('d M Y')); ?></span><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg><?php echo e($article->read_minutes); ?> <?php echo e(__('front.min_read')); ?></span></div>
          <h3><?php echo e($article->title); ?></h3>
          <p><?php echo e($article->excerpt); ?></p>
          <span class="art-read"><?php echo e(__('front.read_article')); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
        </a>
      </article>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============ FAQ ============ -->
<section class="faq" id="faq">
  <div class="wrap">
    <div class="faq-grid">
      <div class="reveal">
        <div class="sec-head" style="margin-bottom:32px">
          <span class="eyebrow"><?php echo e(sett('faq_section.eyebrow')); ?></span>
          <h2><?php echo e(sett('faq_section.heading')); ?></h2>
        </div>
        <div class="faq-side">
          <h3><?php echo e(sett('faq_section.side_title')); ?></h3>
          <p><?php echo e(sett('faq_section.side_text')); ?></p>
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><div><b dir="ltr"><?php echo e(sett_raw('contact.phone')); ?></b></div></div>
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><div><b><?php echo e(sett_raw('contact.email')); ?></b></div></div>
          <button type="button" class="contact-line" id="faqChatBtn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><div><b><?php echo e(app()->getLocale() === 'ar' ? 'تحدث معنا مباشرة' : 'Chat With Us'); ?></b></div></button>
        </div>
      </div>

      <div class="faq-list reveal d1">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="faq-item <?php if($loop->first): ?> open <?php endif; ?>">
          <button class="faq-q"><?php echo e($faq->question); ?><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></span></button>
          <div class="faq-a"><p><?php echo e($faq->answer); ?></p></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</section>

<!-- ============ CAREERS ============ -->
<?php if($careerJobs->isNotEmpty()): ?>
<section class="careers" id="careers">
  <div class="wrap">
    <div class="art-head reveal">
      <div class="sec-head" style="margin-bottom:0">
        <span class="eyebrow"><?php echo e(sett('careers_section.eyebrow')); ?></span>
        <h2><?php echo e(sett('careers_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('careers_section.heading_highlight')); ?></span></h2>
      </div>
      <a href="<?php echo e(route('careers.apply', $careerJobs->first())); ?>" class="btn btn-ghost"><?php echo e(__('front.submit_application')); ?></a>
    </div>
    <div class="career-grid <?php if($careerJobs->count() === 1): ?> career-grid--single <?php endif; ?>">
      <?php $__currentLoopData = $careerJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="job reveal <?php if(!$loop->first): ?> d<?php echo e($loop->iteration - 1); ?> <?php endif; ?>">
        <?php if($job->type): ?><span class="job-type"><?php echo e($job->type); ?></span><?php endif; ?>
        <h3><?php echo e($job->title); ?></h3>
        <p><?php echo e($job->description); ?></p>
        <div class="job-foot">
          <?php if($job->location): ?><span class="loc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><?php echo e($job->location); ?></span><?php endif; ?>
          <a href="<?php echo e(route('careers.apply', $job)); ?>" class="job-apply"><?php echo e(__('front.apply_now')); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ============ CTA BAND ============ -->
<section class="cta-band">
  <div class="wrap">
    <div class="cta-inner reveal">
      <div class="cta-pulse" aria-hidden="true"><span></span><span></span><span></span></div>
      <h2><?php echo e(sett('cta_band.heading')); ?></h2>
      <p><?php echo e(sett('cta_band.paragraph')); ?></p>
      <div class="cta-row">
        <a href="<?php echo e(route('booking.page')); ?>" class="btn btn-primary btn-lg"><span><?php echo e(__('front.book_now')); ?></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="tel:<?php echo e(sett_raw('contact.phone')); ?>" class="btn btn-ghost btn-lg" style="color:#fff;border-color:rgba(255,255,255,.3)"><?php echo e(__('front.call_us')); ?>: <?php echo e(sett_raw('contact.phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
(function () {
  const btn   = document.getElementById('insMoreBtn');
  const modal = document.getElementById('insModal');
  if (!btn || !modal) return;

  btn.addEventListener('click', () => modal.classList.add('open'));
  modal.querySelectorAll('[data-close]').forEach(el => {
    el.addEventListener('click', () => modal.classList.remove('open'));
  });
})();

(function () {
  const modal = document.getElementById('videoModal');
  const frame = document.getElementById('videoModalFrame');
  if (!modal || !frame) return;

  function closeVideoModal() {
    modal.classList.remove('open');
    frame.innerHTML = '';
  }

  document.querySelectorAll('[data-video-url]').forEach(el => {
    el.addEventListener('click', () => {
      const embedUrl = el.dataset.videoUrl;
      if (embedUrl) {
        frame.innerHTML = '<iframe src="' + embedUrl + '?autoplay=1&rel=0" title="video" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
        modal.classList.add('open');
      } else if (el.dataset.fallbackUrl) {
        window.open(el.dataset.fallbackUrl, '_blank', 'noopener');
      }
    });
  });

  modal.querySelectorAll('[data-close]').forEach(el => {
    el.addEventListener('click', closeVideoModal);
  });
})();

(function () {
  const btn = document.getElementById('faqChatBtn');
  const toggle = document.getElementById('chatToggle');
  if (!btn || !toggle) return;

  btn.addEventListener('click', () => toggle.click());
})();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\front\home.blade.php ENDPATH**/ ?>