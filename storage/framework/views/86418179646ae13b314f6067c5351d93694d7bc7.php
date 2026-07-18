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
        <a href="#booking" class="btn btn-primary btn-lg"><span><?php echo e(__('front.book_now')); ?></span>
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
           data-name="<?php echo e($doctor->name); ?>"
           data-spec="<?php echo e($doctor->specialization); ?>"
           data-title="<?php echo e($doctor->title); ?>"
           data-bio="<?php echo e($doctor->bio); ?>"
           data-img="<?php echo e($doctor->image_url); ?>"
           data-initials="<?php echo e($initials); ?>"
           data-certs="<?php echo e(json_encode($doctor->certifications_list, JSON_UNESCAPED_UNICODE)); ?>"
           data-tags="<?php echo e(json_encode($doctor->tags_list, JSON_UNESCAPED_UNICODE)); ?>">
        <div class="doc-img"><div class="ph" data-label="<?php echo e($initials); ?>">
            <?php if($doctor->image): ?><img data-src="<?php echo e($doctor->image_url); ?>" alt="<?php echo e($doctor->name); ?>"><?php endif; ?>
          </div>
          <div class="doc-social">
            <a href="#" aria-label="<?php echo e(__('front.view_doctor_profile')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></a>
            <a href="#booking" aria-label="<?php echo e(__('front.book_now')); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg></a>
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
<section class="svc-list">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php echo e(sett('svc_list_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('svc_list_section.heading')); ?></h2>
      <p><?php echo e(sett('svc_list_section.paragraph')); ?></p>
    </div>

    <div class="svc-rows reveal d1">
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="svc-row" data-service="<?php echo e($service->id); ?>">
        <span class="n"><?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?></span>
        <div class="t"><h3><?php echo e($service->title); ?></h3><p><?php echo e($service->description); ?></p></div>
        <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7M7 7h10v10"/></svg></span>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

<!-- ============ INSURANCE ============ -->
<section class="insurance">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow"><?php echo e(sett('insurance_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('insurance_section.heading_main')); ?> <span class="tealword"><?php echo e(sett('insurance_section.heading_highlight')); ?></span></h2>
      <p><?php echo e(sett('insurance_section.paragraph')); ?></p>
    </div>
    <div class="ins-grid reveal d1">
      <?php $__currentLoopData = $insuranceCompanies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="ins-card"><b><?php echo e($company->name); ?></b><small><?php echo e($company->subtitle); ?></small></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section>

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
      <a class="vid main" href="<?php echo e($mainVideo->video_url ?: '#'); ?>" target="_blank" rel="noopener">
        <div class="ph" data-label="<?php echo e($mainVideo->title); ?>">
          <?php if($mainVideo->thumbnail): ?><img data-src="<?php echo e($mainVideo->thumbnail_url); ?>" alt="<?php echo e($mainVideo->title); ?>"><?php endif; ?>
        </div>
        <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <div class="vid-info"><?php if($mainVideo->tag): ?><span class="tag"><?php echo e($mainVideo->tag); ?></span><?php endif; ?><h3><?php echo e($mainVideo->title); ?></h3></div>
      </a>
      <?php endif; ?>
      <div class="vid-col">
        <?php $__currentLoopData = $smallVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="vid small" href="<?php echo e($video->video_url ?: '#'); ?>" target="_blank" rel="noopener">
          <div class="ph" data-label="<?php echo e($video->title); ?>">
            <?php if($video->thumbnail): ?><img data-src="<?php echo e($video->thumbnail_url); ?>" alt="<?php echo e($video->title); ?>"><?php endif; ?>
          </div>
          <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          <div class="vid-info"><?php if($video->tag): ?><span class="tag"><?php echo e($video->tag); ?></span><?php endif; ?><h3><?php echo e($video->title); ?></h3></div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</section>
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
<section class="testi">
  <div class="wrap testi-wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow"><?php echo e(sett('testimonials_section.eyebrow')); ?></span>
      <h2><?php echo e(sett('testimonials_section.heading')); ?></h2>
    </div>

    <div class="reveal d1" style="overflow:hidden">
      <div class="testi-track" id="testiTrack">
        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $tInitials = collect(explode(' ', $testimonial->patient_name))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('.'); ?>
        <div class="testi-slide">
          <div class="testi-card">
            <div class="testi-card-top">
              <div class="testi-author">
                <div class="av ph" data-label="<?php echo e($tInitials); ?>">
                  <?php if($testimonial->avatar): ?><img data-src="<?php echo e($testimonial->avatar_url); ?>" alt="<?php echo e($testimonial->patient_name); ?>"><?php endif; ?>
                </div>
                <div class="meta"><b><?php echo e($testimonial->patient_name); ?></b><span><?php echo e($testimonial->role_text); ?></span></div>
              </div>
              <div class="testi-stars"><?php echo e(str_repeat('★', $testimonial->rating)); ?></div>
            </div>

            <p class="testi-quote-text"><span class="qmark">"</span><?php echo e($testimonial->quote); ?></p>

            <?php if($testimonial->doctor || $testimonial->procedure): ?>
            <div class="testi-doctor-info">
              <?php if($testimonial->doctor): ?>
              <div class="item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><?php echo e(__('front.testi_treated_by')); ?>: <b><?php echo e($testimonial->doctor->name); ?></b></div>
              <?php endif; ?>
              <?php if($testimonial->procedure): ?>
              <div class="item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg><?php echo e(__('front.testi_procedure')); ?>: <b><?php echo e($testimonial->procedure); ?></b></div>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="testi-nav" id="testiNav"></div>
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
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><div><b dir="ltr"><?php echo e(sett_raw('contact.phone')); ?></b><span><?php echo e(sett('contact.hotline_note')); ?></span></div></div>
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><div><b><?php echo e(sett_raw('contact.email')); ?></b><span><?php echo e(__('front.call_us')); ?></span></div></div>
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

<!-- ============ BOOKING ============ -->
<section class="booking" id="booking">
  <div class="wrap">
    <div class="book-card reveal">
      <div class="book-side">
        <span class="eyebrow"><?php echo e(sett('booking_section.eyebrow')); ?></span>
        <h2><?php echo e(sett('booking_section.heading')); ?></h2>
        <p><?php echo e(sett('booking_section.paragraph')); ?></p>
        <div class="book-feats">
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span>
            <div><b><?php echo e(sett('booking_section.feat1_title')); ?></b><span><?php echo e(sett('booking_section.feat1_text')); ?></span></div>
          </div>
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
            <div><b><?php echo e(sett('booking_section.feat2_title')); ?></b><span><?php echo e(sett('booking_section.feat2_text')); ?></span></div>
          </div>
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg></span>
            <div><b><?php echo e(sett('booking_section.feat3_title')); ?></b><span><?php echo e(sett('booking_section.feat3_text')); ?></span></div>
          </div>
        </div>
      </div>

      <div class="book-form">
        <form id="bookForm" action="<?php echo e(route('appointments.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-row">
            <div class="field"><label><?php echo e(__('front.form_full_name')); ?> <span class="req">*</span></label><input type="text" name="name" required placeholder="<?php echo e(__('front.form_full_name_ph')); ?>"></div>
            <div class="field"><label><?php echo e(__('front.form_phone')); ?> <span class="req">*</span></label><input type="tel" name="phone" required placeholder="<?php echo e(__('front.form_phone_ph')); ?>"></div>
          </div>
          <div class="form-row">
            <div class="field"><label><?php echo e(__('front.form_branch')); ?> <span class="req">*</span></label>
              <select name="branch_id" required>
                <option value=""><?php echo e(__('front.form_branch_ph')); ?></option>
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="field"><label><?php echo e(__('front.form_doctor')); ?></label>
              <select name="doctor_id">
                <option value=""><?php echo e(__('front.form_doctor_ph')); ?></option>
                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?> — <?php echo e($doctor->specialization); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="field"><label><?php echo e(__('front.form_date')); ?> <span class="req">*</span></label><input type="date" name="preferred_date" min="<?php echo e(now()->toDateString()); ?>" required></div>
            <div class="field"><label><?php echo e(__('front.form_time')); ?> <span class="req">*</span></label>
              <select name="preferred_time_slot" required>
                <option value=""><?php echo e(__('front.form_time_ph')); ?></option>
                <option><?php echo e(__('front.time_slot_morning')); ?></option>
                <option><?php echo e(__('front.time_slot_noon')); ?></option>
                <option><?php echo e(__('front.time_slot_afternoon')); ?></option>
                <option><?php echo e(__('front.time_slot_evening')); ?></option>
              </select>
            </div>
          </div>
          <div class="field full" style="margin-bottom:18px"><label><?php echo e(__('front.form_notes')); ?></label><textarea name="notes" placeholder="<?php echo e(__('front.form_notes_ph')); ?>"></textarea></div>
          <button type="submit" class="btn btn-primary btn-lg"><span><?php echo e(__('front.form_submit')); ?></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </form>

        <div class="form-success" id="formSuccess">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3><?php echo e(__('front.form_success_title')); ?></h3>
          <p><?php echo e(__('front.form_success_text')); ?></p>
        </div>
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
      <a href="#booking" class="btn btn-ghost"><?php echo e(__('front.submit_application')); ?></a>
    </div>
    <div class="career-grid">
      <?php $__currentLoopData = $careerJobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="job reveal <?php if(!$loop->first): ?> d<?php echo e($loop->iteration - 1); ?> <?php endif; ?>">
        <?php if($job->type): ?><span class="job-type"><?php echo e($job->type); ?></span><?php endif; ?>
        <h3><?php echo e($job->title); ?></h3>
        <p><?php echo e($job->description); ?></p>
        <div class="job-foot">
          <?php if($job->location): ?><span class="loc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><?php echo e($job->location); ?></span><?php endif; ?>
          <a href="#booking" class="job-apply"><?php echo e(__('front.apply_now')); ?> <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
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
        <a href="#booking" class="btn btn-primary btn-lg"><span><?php echo e(__('front.book_now')); ?></span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="tel:<?php echo e(sett_raw('contact.phone')); ?>" class="btn btn-ghost btn-lg" style="color:#fff;border-color:rgba(255,255,255,.3)"><?php echo e(__('front.call_us')); ?>: <?php echo e(sett_raw('contact.phone')); ?></a>
      </div>
    </div>
  </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views/front/home.blade.php ENDPATH**/ ?>