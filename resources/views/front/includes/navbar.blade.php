@php
    $navServices = \App\Models\Service::active()->get();
    $waNumber = sett_raw('contact.whatsapp_number');
@endphp

<!-- ============ HEADER ============ -->
<header id="header">
  <div class="topbar">
    <div class="wrap">
      <div class="topbar-l">
        <a href="tel:{{ sett_raw('contact.phone') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span>{{ sett('contact.hotline_note') }}: {{ sett_raw('contact.phone') }}</span></a>
        <a href="mailto:{{ sett_raw('contact.email') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><span>{{ sett_raw('contact.email') }}</span></a>
      </div>
      <div class="topbar-r">
        <a href="{{ route('home') }}#locations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span>{{ sett_raw('contact.branches_count') }} {{ __('front.topbar_branches') }}</span></a>
        <span style="opacity:.4">|</span>
        <span>{{ __('front.topbar_hours') }}: {{ sett('contact.working_hours') }}</span>
        <span style="opacity:.4">|</span>
        <a href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL(app()->getLocale() === 'ar' ? 'en' : 'ar') }}" rel="alternate">{{ __('front.lang_switch') }}</a>
      </div>
    </div>
  </div>

  <nav class="nav">
    <div class="wrap">
      <a href="{{ route('home') }}" class="logo" aria-label="{{ sett('identity.site_name') }}">
        <span class="logo-mark">
          <svg viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="23" fill="#2a807d"/>
            <path d="M24 8c-3 0-5 2-5 5 0 1.5.6 2.8 1.6 3.7-.9 1-1.6 2.3-1.6 3.8 0 1.5.6 2.8 1.6 3.8-.9 1-1.6 2.3-1.6 3.8 0 1.5.7 2.8 1.6 3.8-1 .9-1.6 2.2-1.6 3.7 0 3 2 5 5 5" stroke="#fff" stroke-width="2.2" stroke-linecap="round" fill="none"/>
            <circle cx="30" cy="13" r="2.6" fill="#7fd8d3"/>
            <circle cx="32" cy="24" r="2.6" fill="#fff"/>
            <circle cx="30" cy="35" r="2.6" fill="#7fd8d3"/>
            <path d="M24 13h4M24 24h6M24 35h4" stroke="#7fd8d3" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="logo-txt"><b>{{ sett('identity.site_name') }}</b><small>{{ sett('identity.brand_tag') }}</small></span>
      </a>

      <div class="nav-links">
        <a href="{{ route('home') }}#home">{{ __('front.nav_home') }}</a>
        <a href="{{ route('home') }}#about">{{ __('front.nav_about') }}</a>
        <div class="has-drop">
          <a href="{{ route('home') }}#services">{{ __('front.nav_services') }}</a>
          <div class="drop">
            @foreach($navServices as $navService)
            <a href="{{ route('home') }}#services">{{ $navService->title }}</a>
            @endforeach
          </div>
        </div>
        <a href="{{ route('home') }}#team">{{ __('front.nav_team') }}</a>
        <a href="{{ route('home') }}#locations">{{ __('front.nav_locations') }}</a>
        <a href="{{ route('articles.index') }}">{{ __('front.nav_articles') }}</a>
        <a href="{{ route('home') }}#faq">{{ __('front.nav_faq') }}</a>
      </div>

      <div class="nav-cta">
        <a href="{{ route('home') }}#booking" class="btn btn-primary"><span>{{ __('front.book_now') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </a>
        <button class="burger" id="burger" aria-label="{{ __('front.nav_menu') }}"><span></span><span></span><span></span></button>
      </div>
    </div>
  </nav>
</header>

<!-- mobile menu -->
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('home') }}#home">{{ __('front.nav_home') }}</a>
  <a href="{{ route('home') }}#about">{{ __('front.nav_about') }}</a>
  <a href="{{ route('home') }}#services">{{ __('front.nav_services') }}</a>
  <a href="{{ route('home') }}#team">{{ __('front.nav_team') }}</a>
  <a href="{{ route('home') }}#locations">{{ __('front.nav_locations') }}</a>
  <a href="{{ route('home') }}#videos">{{ __('front.nav_videos') }}</a>
  <a href="{{ route('articles.index') }}">{{ __('front.nav_articles') }}</a>
  <a href="{{ route('home') }}#faq">{{ __('front.nav_faq') }}</a>
  <a href="{{ route('home') }}#careers">{{ __('front.nav_careers') }}</a>
  <a href="{{ route('home') }}#booking" class="btn btn-primary"><span>{{ __('front.book_now') }}</span></a>
</div>
