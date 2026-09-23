@extends('layouts.front')
@section('title', sett('faq_section.heading') . ' — ' . sett('identity.site_name'))
@section('meta_description', sett('seo.default_description'))

@section('content')

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow">{{ sett('faq_section.eyebrow') }}</span>
    <h1>{{ sett('faq_section.heading') }}</h1>
    <div class="crumbs">
      <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> / {{ __('front.nav_faq') }}
    </div>
  </div>
</div>

<section class="page-section">
  <div class="wrap">
    <div class="faq-page-grid">
      <div class="faq-list">
        @foreach($faqs as $faq)
        <div class="faq-item reveal @if($loop->first) open @endif" style="--d:{{ $loop->index * 40 }}ms">
          <button class="faq-q">
            {{ $faq->question }}
            <span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg></span>
          </button>
          <div class="faq-a"><p>{{ $faq->answer }}</p></div>
        </div>
        @endforeach
      </div>

      <div class="faq-side reveal d1">
        <h3>{{ sett('faq_section.side_title') }}</h3>
        <p>{{ sett('faq_section.side_text') }}</p>
        <div class="contact-line">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          <div><b dir="ltr">{{ sett_raw('contact.phone') }}</b></div>
        </div>
        <div class="contact-line">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg>
          <div><b>{{ sett_raw('contact.email') }}</b></div>
        </div>
        <button type="button" class="contact-line" id="faqChatBtn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          <div><b>{{ app()->getLocale() === 'ar' ? 'تحدث معنا مباشرة' : 'Chat With Us' }}</b></div>
        </button>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
(function () {
  const btn = document.getElementById('faqChatBtn');
  const toggle = document.getElementById('chatToggle');
  if (btn && toggle) btn.addEventListener('click', () => toggle.click());
})();
</script>
@endpush

@endsection
