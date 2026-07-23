@extends('layouts.front')
@section('title', __('front.page_title') . ' | ' . sett('identity.site_name'))
@section('meta_description', sett('seo.default_description'))

@section('content')

@php
    $featuredServices = $services->where('is_featured', true);
    $mainBranch = $branches->firstWhere('is_main', true) ?? $branches->first();
@endphp

<!-- ============ HERO ============ -->
<section class="hero" id="home">
  <div class="hero-bg">
    @if(sett_raw('hero.bg_image'))
      <img data-src="{{ uploaded_image(sett_raw('hero.bg_image'), 'site') }}" alt="{{ sett('identity.site_name') }}">
    @endif
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
      <span class="eyebrow">{{ sett('hero.eyebrow') }}</span>
      <h1>
        <span class="ln"><i>{{ sett('hero.heading_line1') }}</i></span>
        <span class="ln"><i>{{ sett('hero.heading_line2') }}</i></span>
        <span class="ln"><i>{{ sett('hero.heading_line3') }}</i></span>
      </h1>
      <p class="lead">{{ sett('hero.lead') }}</p>
      <div class="cta-row">
        <a href="#booking" class="btn btn-primary btn-lg"><span>{{ __('front.book_now') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="#services" class="btn btn-ghost btn-lg">{{ __('front.explore_services') }}</a>
      </div>
    </div>
  </div>

  <div class="hero-chips">
    <div class="wrap">
      @foreach($heroStats as $stat)
      <div class="chip"><b data-count="{{ $stat->number }}" @if($stat->suffix) data-suffix="{{ $stat->suffix }}" @endif>0</b><span>{{ $stat->label }}</span></div>
      @endforeach
    </div>
  </div>
  
</section>
<div class="trust"></div>

<!-- ============ SERVICES (featured cards) ============ -->
<section class="services" id="services">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">{{ sett('services_section.eyebrow') }}</span>
      <h2>{{ sett('services_section.heading_main') }} <span class="tealword">{{ sett('services_section.heading_highlight') }}</span></h2>
      <p>{{ sett('services_section.paragraph') }}</p>
    </div>

    <div class="serv-grid">
      @foreach($featuredServices as $service)
      <div class="serv-card reveal @if(!$loop->first) d{{ $loop->iteration - 1 }} @endif" data-service="{{ $service->id }}">
        <div class="ph" data-label="{{ $service->title }}">
          @if($service->image)<img data-src="{{ $service->image_url }}" alt="{{ $service->title }}">@endif
        </div>
        <div class="body">
          <span class="serv-num">/ {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
          <h3>{{ $service->title }}</h3>
          <p>{{ $service->description }}</p>
          <span class="serv-more">{{ __('front.read_details') }} <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section class="about" id="about">
  <div class="wrap">
    <div class="about-grid">
      <div class="about-media reveal">
        <div class="main-img ph" data-label="{{ sett('about.heading_main') }}">
          @if(sett_raw('about.image_main'))<img data-src="{{ uploaded_image(sett_raw('about.image_main'), 'site') }}" alt="{{ sett('identity.site_name') }}">@endif
        </div>
        <div class="sub-img ph" data-label="{{ sett('identity.site_name') }}">
          @if(sett_raw('about.image_sub'))<img data-src="{{ uploaded_image(sett_raw('about.image_sub'), 'site') }}" alt="{{ sett('identity.site_name') }}">@endif
        </div>
        <div class="about-badge"><b>{{ sett_raw('about.badge_number') }}</b><span>{{ sett('about.badge_text') }}</span></div>
      </div>

      <div class="about-txt reveal d1">
        <span class="eyebrow">{{ sett('about.eyebrow') }}</span>
        <h2>{{ sett('about.heading_main') }} <span class="tealword">{{ sett('about.heading_highlight') }}</span></h2>
        <p>{{ sett('about.paragraph') }}</p>

        <div class="vm">
          <span class="vm-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M12 1v6m0 6v6m11-7h-6M7 12H1"/></svg></span>
          <div><h4>{{ sett('about.vision_title') }}</h4><p>{{ sett('about.vision_text') }}</p></div>
        </div>
        <div class="vm">
          <span class="vm-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span>
          <div><h4>{{ sett('about.mission_title') }}</h4><p>{{ sett('about.mission_text') }}</p></div>
        </div>

        <a href="#team" class="btn btn-dark" style="margin-top:12px"><span>{{ __('front.know_our_team') }}</span>
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
      <span class="stats-badge"><span class="pulse-dot"></span> {{ sett('stats_section.eyebrow') }}</span>
    </div>
    <div class="stats-grid">
      @foreach($mainStats as $stat)
      <div class="stat reveal @if(!$loop->first) d{{ $loop->iteration - 1 }} @endif"><b data-count="{{ $stat->number }}" @if($stat->suffix) data-suffix="{{ $stat->suffix }}" @endif>0</b><span>{{ $stat->label }}</span></div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============ TEAM ============ -->
<section class="team" id="team">
  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow">{{ sett('team_section.eyebrow') }}</span>
      <h2>{{ sett('team_section.heading_main') }} <span class="tealword">{{ sett('team_section.heading_highlight') }}</span></h2>
      <p>{{ sett('team_section.paragraph') }}</p>
    </div>

    <div class="team-grid" id="teamGrid">
      @foreach($doctors as $doctor)
      @php
        $initials = collect(explode(' ', $doctor->name))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('.');
      @endphp
      <div class="doc reveal @if($loop->iteration % 4 !== 1) d{{ ($loop->iteration - 1) % 4 }} @endif"
           data-name="{{ $doctor->name }}"
           data-spec="{{ $doctor->specialization }}"
           data-title="{{ $doctor->title }}"
           data-bio="{{ $doctor->bio }}"
           data-img="{{ $doctor->image_url }}"
           data-initials="{{ $initials }}"
           data-certs="{{ json_encode($doctor->certifications_list, JSON_UNESCAPED_UNICODE) }}"
           data-tags="{{ json_encode($doctor->tags_list, JSON_UNESCAPED_UNICODE) }}">
        <div class="doc-img"><div class="ph" data-label="{{ $initials }}">
            @if($doctor->image)<img data-src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}">@endif
          </div>
          <div class="doc-social">
            <a href="#" aria-label="{{ __('front.view_doctor_profile') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></a>
            <a href="#booking" aria-label="{{ __('front.book_now') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg></a>
          </div>
        </div>
        <div class="doc-body">
          <span class="spec">{{ $doctor->specialization }}</span>
          <h3>{{ $doctor->name }}</h3>
          <p>{{ $doctor->title }}</p>
          <span class="doc-view">{{ __('front.view_doctor_profile') }} <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============ SERVICES DETAIL LIST ============ -->
<section class="svc-list">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">{{ sett('svc_list_section.eyebrow') }}</span>
      <h2>{{ sett('svc_list_section.heading') }}</h2>
      <p>{{ sett('svc_list_section.paragraph') }}</p>
    </div>

    <div class="svc-rows reveal d1">
      @foreach($services as $service)
      <div class="svc-row" data-service="{{ $service->id }}">
        <span class="n">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
        <div class="t"><h3>{{ $service->title }}</h3><p>{{ $service->description }}</p></div>
        <span class="arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17 17 7M7 7h10v10"/></svg></span>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ============ INSURANCE ============ -->
<section class="insurance" id="insurance">

  {{-- decorative background elements --}}
  <div class="ins-bg-ring ins-bg-ring-1" aria-hidden="true"></div>
  <div class="ins-bg-ring ins-bg-ring-2" aria-hidden="true"></div>
  <div class="ins-bg-dots" aria-hidden="true"></div>

  <div class="wrap">
    <div class="sec-head center reveal">
      <span class="eyebrow">{{ sett('insurance_section.eyebrow') }}</span>
      <h2>{{ sett('insurance_section.heading_main') }} <span class="tealword">{{ sett('insurance_section.heading_highlight') }}</span></h2>
      <p>{{ sett('insurance_section.paragraph') }}</p>
    </div>

    {{-- Trust pills --}}
    <div class="ins-trust reveal d1">
      <span class="ins-trust-pill">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        {{ app()->getLocale() === 'ar' ? 'مقبولة في جميع فروعنا' : 'Accepted at all branches' }}
      </span>
      <span class="ins-trust-pill">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        {{ app()->getLocale() === 'ar' ? 'تسوية مباشرة' : 'Direct billing' }}
      </span>
      <span class="ins-trust-pill">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        {{ app()->getLocale() === 'ar' ? 'لا رسوم إضافية' : 'No extra fees' }}
      </span>
    </div>
  </div>

  {{-- Marquee rows — full-width, outside wrap --}}
  @php $items = $insuranceCompanies->values(); $teal_colors = ['#2a807d','#1d5c5a','#3a9e9b','#246b68','#14504e','#2d9490']; @endphp

  {{-- Row 1: left direction --}}
  <div class="ins-marquee-wrap reveal d2">
    <div class="ins-marquee ins-marquee--fwd">
      <div class="ins-track">
        @for($r=0;$r<3;$r++)
          @foreach($items as $ci => $company)
          <div class="ins-card">
            <div class="ins-card-badge" style="--accent:{{ $teal_colors[$ci % count($teal_colors)] }}">
              {{ mb_strtoupper(mb_substr($company->name, 0, 2)) }}
            </div>
            <div class="ins-card-body">
              <strong>{{ $company->name }}</strong>
              @if($company->subtitle)<span>{{ $company->subtitle }}</span>@endif
            </div>
            <div class="ins-card-shine" aria-hidden="true"></div>
          </div>
          @endforeach
        @endfor
      </div>
    </div>
  </div>

  {{-- Row 2: right direction --}}
  <div class="ins-marquee-wrap reveal d3">
    <div class="ins-marquee ins-marquee--rev">
      <div class="ins-track">
        @for($r=0;$r<3;$r++)
          @foreach($items->reverse()->values() as $ci => $company)
          <div class="ins-card">
            <div class="ins-card-badge" style="--accent:{{ $teal_colors[$ci % count($teal_colors)] }}">
              {{ mb_strtoupper(mb_substr($company->name, 0, 2)) }}
            </div>
            <div class="ins-card-body">
              <strong>{{ $company->name }}</strong>
              @if($company->subtitle)<span>{{ $company->subtitle }}</span>@endif
            </div>
            <div class="ins-card-shine" aria-hidden="true"></div>
          </div>
          @endforeach
        @endfor
      </div>
    </div>
  </div>

</section>

<!-- ============ VIDEOS ============ -->
@if($videos->isNotEmpty())
@php $mainVideo = $videos->firstWhere('is_main', true); $smallVideos = $videos->where('is_main', false); @endphp
<section class="videos" id="videos">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">{{ sett('videos_section.eyebrow') }}</span>
      <h2>{{ sett('videos_section.heading_main') }} <span class="tealword">{{ sett('videos_section.heading_highlight') }}</span></h2>
      <p>{{ sett('videos_section.paragraph') }}</p>
    </div>

    <div class="vid-grid reveal d1">
      @if($mainVideo)
      <a class="vid main" href="{{ $mainVideo->video_url ?: '#' }}" target="_blank" rel="noopener">
        <div class="ph" data-label="{{ $mainVideo->title }}">
          @if($mainVideo->thumbnail)<img data-src="{{ $mainVideo->thumbnail_url }}" alt="{{ $mainVideo->title }}">@endif
        </div>
        <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <div class="vid-info">@if($mainVideo->tag)<span class="tag">{{ $mainVideo->tag }}</span>@endif<h3>{{ $mainVideo->title }}</h3></div>
      </a>
      @endif
      <div class="vid-col">
        @foreach($smallVideos as $video)
        <a class="vid small" href="{{ $video->video_url ?: '#' }}" target="_blank" rel="noopener">
          <div class="ph" data-label="{{ $video->title }}">
            @if($video->thumbnail)<img data-src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}">@endif
          </div>
          <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
          <div class="vid-info">@if($video->tag)<span class="tag">{{ $video->tag }}</span>@endif<h3>{{ $video->title }}</h3></div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

<!-- ============ LOCATIONS ============ -->
<section class="locations" id="locations">
  <div class="wrap">
    <div class="sec-head reveal">
      <span class="eyebrow">{{ sett('locations_section.eyebrow') }}</span>
      <h2>{{ sett('locations_section.heading_main') }} <span class="tealword">{{ sett('locations_section.heading_highlight') }}</span></h2>
      <p>{{ sett('locations_section.paragraph') }}</p>
    </div>

    <div class="loc-grid">
      <div class="loc-list reveal">
        @foreach($branches as $branch)
        <div class="loc-card @if($branch->is_main || ($mainBranch && $branch->id === $mainBranch->id)) active @endif" data-map="{{ $branch->map_query }}">
          <div class="lc-top"><h3>{{ $branch->name }}</h3>@if($branch->badge)<span class="lc-badge">{{ $branch->badge }}</span>@endif</div>
          <div class="loc-detail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span>{{ $branch->address }}</span></div>
          <div class="loc-detail"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span dir="ltr">{{ $branch->phone }}</span>&nbsp;|&nbsp;<span>{{ $branch->working_hours }}</span></div>
        </div>
        @endforeach
      </div>

      <div class="loc-map reveal d1">
        <iframe id="mapFrame" src="https://maps.google.com/maps?q={{ urlencode($mainBranch->map_query ?? '') }}&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy" title="{{ sett('identity.site_name') }}"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
@if($testimonials->isNotEmpty())
<section class="testi" id="testi">

  {{-- Layered background decorations --}}
  <div class="testi-orb testi-orb-1" aria-hidden="true"></div>
  <div class="testi-orb testi-orb-2" aria-hidden="true"></div>
  <div class="testi-orb testi-orb-3" aria-hidden="true"></div>
  <div class="testi-grid-lines" aria-hidden="true"></div>

  <div class="wrap testi-wrap">

    {{-- Header --}}
    <div class="testi-header reveal">
      <div class="sec-head center">
        <span class="eyebrow testi-eyebrow">{{ sett('testimonials_section.eyebrow') }}</span>
        <h2>{{ sett('testimonials_section.heading') }}</h2>
      </div>
      {{-- Rating summary badge --}}
      <div class="testi-rating-badge">
        <div class="testi-badge-stars">★★★★★</div>
        <div class="testi-badge-info">
          <strong>{{ $testimonials->avg('rating') >= 1 ? number_format($testimonials->avg('rating'), 1) : '5.0' }}</strong>
          <span>{{ $testimonials->count() }}+ {{ app()->getLocale() === 'ar' ? 'تقييم موثق' : 'verified reviews' }}</span>
        </div>
      </div>
    </div>

    {{-- Slider container --}}
    <div class="testi-stage reveal d1">

      {{-- Arrow: previous --}}
      <button class="testi-arrow testi-arrow-prev" id="testiPrev" aria-label="{{ app()->getLocale() === 'ar' ? 'التالي' : 'Previous' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
      </button>

      {{-- Slides --}}
      <div class="testi-viewport">
        <div class="testi-track" id="testiTrack">
          @foreach($testimonials as $testimonial)
          @php
            $tInitials = collect(explode(' ', $testimonial->patient_name))
              ->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('');
          @endphp
          <div class="testi-slide">
            <div class="testi-card">

              {{-- Decorative quote watermark --}}
              <div class="testi-wm-q" aria-hidden="true">❝</div>

              {{-- Stars --}}
              <div class="testi-stars" aria-label="{{ $testimonial->rating }} stars">
                @for($s = 1; $s <= 5; $s++)
                  <span class="testi-star {{ $s <= $testimonial->rating ? 'testi-star--on' : '' }}" style="--d:{{ $s * 80 }}ms">★</span>
                @endfor
              </div>

              {{-- Quote text --}}
              <blockquote class="testi-quote">{{ $testimonial->quote }}</blockquote>

              {{-- Procedure/doctor pills --}}
              @if($testimonial->doctor || $testimonial->procedure)
              <div class="testi-pills">
                @if($testimonial->doctor)
                <span class="testi-pill">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  {{ $testimonial->doctor->name }}
                </span>
                @endif
                @if($testimonial->procedure)
                <span class="testi-pill testi-pill--alt">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                  {{ $testimonial->procedure }}
                </span>
                @endif
              </div>
              @endif

              {{-- Author --}}
              <div class="testi-author">
                <div class="testi-av-wrap">
                  <div class="av ph" data-label="{{ $tInitials }}">
                    @if($testimonial->avatar)<img data-src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->patient_name }}">@endif
                  </div>
                  <span class="testi-verified-dot" title="{{ app()->getLocale() === 'ar' ? 'مريض موثق' : 'Verified Patient' }}">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                  </span>
                </div>
                <div class="testi-meta">
                  <strong>{{ $testimonial->patient_name }}</strong>
                  <span>{{ $testimonial->role_text }}</span>
                </div>
                <span class="testi-verified-label">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                  {{ app()->getLocale() === 'ar' ? 'مريض موثق' : 'Verified Patient' }}
                </span>
              </div>

            </div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- Arrow: next --}}
      <button class="testi-arrow testi-arrow-next" id="testiNext" aria-label="{{ app()->getLocale() === 'ar' ? 'السابق' : 'Next' }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </div>

    {{-- Progress dots + counter --}}
    <div class="testi-footer reveal d2">
      <div class="testi-nav" id="testiNav"></div>
      <span class="testi-counter" id="testiCounter"></span>
    </div>

  </div>
</section>
@endif

<!-- ============ ARTICLES ============ -->
@if($articles->isNotEmpty())
<section class="articles" id="articles">
  <div class="wrap">
    <div class="art-head reveal">
      <div class="sec-head" style="margin-bottom:0">
        <span class="eyebrow">{{ sett('articles_section.eyebrow') }}</span>
        <h2>{{ sett('articles_section.heading_main') }} <span class="tealword">{{ sett('articles_section.heading_highlight') }}</span></h2>
      </div>
      <a href="{{ route('articles.index') }}" class="btn btn-ghost">{{ __('front.all_articles') }}
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>

    <div class="art-grid">
      @foreach($articles as $article)
      <article class="art reveal @if(!$loop->first) d{{ $loop->iteration - 1 }} @endif">
        <a href="{{ route('articles.show', $article) }}" style="color:inherit;text-decoration:none">
        <div class="art-img">
          <div class="ph" data-label="{{ $article->category }}">
            @if($article->image)<img data-src="{{ $article->image_url }}" alt="{{ $article->title }}">@endif
          </div>
          @if($article->category)<span class="art-cat">{{ $article->category }}</span>@endif
        </div>
        <div class="art-body">
          <div class="art-meta"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>{{ $article->published_at?->translatedFormat('d M Y') }}</span><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $article->read_minutes }} {{ __('front.min_read') }}</span></div>
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->excerpt }}</p>
          <span class="art-read">{{ __('front.read_article') }} <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></span>
        </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ============ FAQ ============ -->
<section class="faq" id="faq">
  <div class="wrap">
    <div class="faq-grid">
      <div class="reveal">
        <div class="sec-head" style="margin-bottom:32px">
          <span class="eyebrow">{{ sett('faq_section.eyebrow') }}</span>
          <h2>{{ sett('faq_section.heading') }}</h2>
        </div>
        <div class="faq-side">
          <h3>{{ sett('faq_section.side_title') }}</h3>
          <p>{{ sett('faq_section.side_text') }}</p>
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><div><b dir="ltr">{{ sett_raw('contact.phone') }}</b><span>{{ sett('contact.hotline_note') }}</span></div></div>
          <div class="contact-line"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><div><b>{{ sett_raw('contact.email') }}</b><span>{{ __('front.call_us') }}</span></div></div>
        </div>
      </div>

      <div class="faq-list reveal d1">
        @foreach($faqs as $faq)
        <div class="faq-item @if($loop->first) open @endif">
          <button class="faq-q">{{ $faq->question }}<span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></span></button>
          <div class="faq-a"><p>{{ $faq->answer }}</p></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ============ BOOKING ============ -->
<section class="booking" id="booking">
  <div class="wrap">
    <div class="book-card reveal">
      <div class="book-side">
        <span class="eyebrow">{{ sett('booking_section.eyebrow') }}</span>
        <h2>{{ sett('booking_section.heading') }}</h2>
        <p>{{ sett('booking_section.paragraph') }}</p>
        <div class="book-feats">
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg></span>
            <div><b>{{ sett('booking_section.feat1_title') }}</b><span>{{ sett('booking_section.feat1_text') }}</span></div>
          </div>
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span>
            <div><b>{{ sett('booking_section.feat2_title') }}</b><span>{{ sett('booking_section.feat2_text') }}</span></div>
          </div>
          <div class="book-feat">
            <span class="bf-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg></span>
            <div><b>{{ sett('booking_section.feat3_title') }}</b><span>{{ sett('booking_section.feat3_text') }}</span></div>
          </div>
        </div>
      </div>

      <div class="book-form">
        <form id="bookForm" action="{{ route('appointments.store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="field"><label>{{ __('front.form_full_name') }} <span class="req">*</span></label><input type="text" name="name" required placeholder="{{ __('front.form_full_name_ph') }}"></div>
            <div class="field"><label>{{ __('front.form_phone') }} <span class="req">*</span></label><input type="tel" name="phone" required placeholder="{{ __('front.form_phone_ph') }}"></div>
          </div>
          <div class="form-row">
            <div class="field"><label>{{ __('front.form_branch') }} <span class="req">*</span></label>
              <select name="branch_id" required>
                <option value="">{{ __('front.form_branch_ph') }}</option>
                @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="field"><label>{{ __('front.form_doctor') }}</label>
              <select name="doctor_id">
                <option value="">{{ __('front.form_doctor_ph') }}</option>
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }} — {{ $doctor->specialization }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="field"><label>{{ __('front.form_date') }} <span class="req">*</span></label><input type="date" name="preferred_date" min="{{ now()->toDateString() }}" required></div>
            <div class="field"><label>{{ __('front.form_time') }} <span class="req">*</span></label>
              <select name="preferred_time_slot" required>
                <option value="">{{ __('front.form_time_ph') }}</option>
                <option>{{ __('front.time_slot_morning') }}</option>
                <option>{{ __('front.time_slot_noon') }}</option>
                <option>{{ __('front.time_slot_afternoon') }}</option>
                <option>{{ __('front.time_slot_evening') }}</option>
              </select>
            </div>
          </div>
          <div class="field full" style="margin-bottom:18px"><label>{{ __('front.form_notes') }}</label><textarea name="notes" placeholder="{{ __('front.form_notes_ph') }}"></textarea></div>
          <button type="submit" class="btn btn-primary btn-lg"><span>{{ __('front.form_submit') }}</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </form>

        <div class="form-success" id="formSuccess">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3>{{ __('front.form_success_title') }}</h3>
          <p>{{ __('front.form_success_text') }}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============ CAREERS ============ -->
@if($careerJobs->isNotEmpty())
<section class="careers" id="careers">
  <div class="wrap">
    <div class="art-head reveal">
      <div class="sec-head" style="margin-bottom:0">
        <span class="eyebrow">{{ sett('careers_section.eyebrow') }}</span>
        <h2>{{ sett('careers_section.heading_main') }} <span class="tealword">{{ sett('careers_section.heading_highlight') }}</span></h2>
      </div>
      <a href="#booking" class="btn btn-ghost">{{ __('front.submit_application') }}</a>
    </div>
    <div class="career-grid">
      @foreach($careerJobs as $job)
      <div class="job reveal @if(!$loop->first) d{{ $loop->iteration - 1 }} @endif">
        @if($job->type)<span class="job-type">{{ $job->type }}</span>@endif
        <h3>{{ $job->title }}</h3>
        <p>{{ $job->description }}</p>
        <div class="job-foot">
          @if($job->location)<span class="loc"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>{{ $job->location }}</span>@endif
          <a href="#booking" class="job-apply">{{ __('front.apply_now') }} <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ============ CTA BAND ============ -->
<section class="cta-band">
  <div class="wrap">
    <div class="cta-inner reveal">
      <div class="cta-pulse" aria-hidden="true"><span></span><span></span><span></span></div>
      <h2>{{ sett('cta_band.heading') }}</h2>
      <p>{{ sett('cta_band.paragraph') }}</p>
      <div class="cta-row">
        <a href="#booking" class="btn btn-primary btn-lg"><span>{{ __('front.book_now') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="tel:{{ sett_raw('contact.phone') }}" class="btn btn-ghost btn-lg" style="color:#fff;border-color:rgba(255,255,255,.3)">{{ __('front.call_us') }}: {{ sett_raw('contact.phone') }}</a>
      </div>
    </div>
  </div>
</section>


@endsection
