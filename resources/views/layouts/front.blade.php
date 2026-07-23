<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    // @section('title', $value) shorthand HTML-escapes $value on store, so decode
    // it back to plain text here — every {{ }} usage below escapes it exactly once.
    $seoTitle       = trim(html_entity_decode($__env->yieldContent('title')) ?: sett('seo.default_title'));
    $seoDescription = trim(html_entity_decode($__env->yieldContent('meta_description')) ?: sett('seo.default_description'));
    $seoKeywords    = sett('seo.default_keywords');
    $seoImage       = sett_raw('seo.og_image') ? uploaded_image(sett_raw('seo.og_image'), 'site') : asset('favicon.ico');
    $geo = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::class;
@endphp

<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="keywords" content="{{ $seoKeywords }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">

{{-- hreflang alternates for every supported locale --}}
@foreach($geo::getSupportedLocales() as $localeCode => $properties)
<link rel="alternate" hreflang="{{ $localeCode }}" href="{{ $geo::getLocalizedURL($localeCode, null, [], true) }}" />
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $geo::getLocalizedURL($geo::getDefaultLocale(), null, [], true) }}" />

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ sett('identity.site_name') }} {{ sett('identity.brand_tag') }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:locale" content="{{ app()->getLocale() === 'ar' ? 'ar_JO' : 'en_US' }}">

{{-- Twitter --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

{{-- Structured data: MedicalClinic --}}
<script type="application/ld+json">
{!! json_encode([
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
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500;600;700;800;900&family=Cairo:wght@400;500;600;700&family=Sora:wght@400;500;600&display=swap" rel="stylesheet">
<link href="{{ asset('assets_front/css/style.css') }}" rel="stylesheet">
@stack('styles')
</head>
<body class="{{ app()->getLocale() === 'en' ? 'lang-en' : 'lang-ar' }}">

<!-- ======= NAV ======= -->
@include('front.includes.navbar')

<!-- ======= CONTENT ======= -->
@yield('content')

<!-- ======= FOOTER ======= -->
@include('front.includes.footer')


<!-- ======= FLOATING ACTION BUTTONS ======= -->
<div class="fab-stack">
  {{-- Call button --}}
  <a href="tel:{{ sett_raw('contact.phone') }}" class="fab fab-call" aria-label="{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Call Us' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
    <span class="fab-tooltip">{{ app()->getLocale() === 'ar' ? 'اتصل بنا' : 'Call Us' }}</span>
  </a>
  {{-- Chat button --}}
  <button class="fab fab-chat" id="chatToggle" aria-label="{{ app()->getLocale() === 'ar' ? 'تحدث معنا' : 'Chat with us' }}">
    <svg class="fab-chat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
    <svg class="fab-chat-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    <span class="fab-badge" id="chatBadge"></span>
    <span class="fab-tooltip">{{ app()->getLocale() === 'ar' ? 'تحدث معنا' : 'Chat with us' }}</span>
  </button>
</div>

<button class="totop" id="toTop" aria-label="{{ __('front.scroll_to_top') }}"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg></button>

<!-- ======= CHAT WIDGET ======= -->
<div class="chat-widget" id="chatWidget" role="dialog" aria-label="{{ app()->getLocale() === 'ar' ? 'المساعد الذكي' : 'AI Assistant' }}">
  <div class="chat-header">
    <div class="chat-avatar">
      <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
    </div>
    <div class="chat-header-info">
      <strong>{{ app()->getLocale() === 'ar' ? 'سارة' : 'Sara' }}</strong>
      <span><span class="chat-online-dot"></span>{{ app()->getLocale() === 'ar' ? 'متاحة الآن' : 'Available now' }}</span>
    </div>
    <button class="chat-header-close" id="chatClose" aria-label="Close">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>
  </div>

  <div class="chat-messages" id="chatMessages">
    <div class="chat-msg chat-msg--bot">
      <div class="chat-bubble">
        {{ app()->getLocale() === 'ar'
          ? 'أهلاً! أنا سارة من فريق ' . sett('identity.site_name') . '. كيف أقدر أساعدك اليوم؟'
          : 'Hello! I\'m Sara from the ' . sett('identity.site_name') . ' team. How can I help you today?' }}
      </div>
    </div>
  </div>

  <div class="chat-footer">
    <div class="chat-input-wrap">
      <textarea class="chat-input" id="chatInput" rows="1"
        placeholder="{{ app()->getLocale() === 'ar' ? 'اكتب رسالتك...' : 'Type your message...' }}"
        maxlength="1000"></textarea>
      <button class="chat-send" id="chatSend" aria-label="{{ app()->getLocale() === 'ar' ? 'إرسال' : 'Send' }}">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/></svg>
      </button>
    </div>
    <div class="chat-footer-actions">
      <button class="chat-clear" id="chatClear">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.33"/></svg>
        {{ app()->getLocale() === 'ar' ? 'محادثة جديدة' : 'New chat' }}
      </button>
    </div>
  </div>
</div>

@php
  $chatMsgUrl  = route('chatbot.message');
  $chatClrUrl  = route('chatbot.clear');
  $chatGreeting = app()->getLocale() === 'ar'
    ? 'أهلاً! أنا سارة من فريق ' . sett('identity.site_name') . '. كيف أقدر أساعدك اليوم؟'
    : 'Hello! I\'m Sara from the ' . sett('identity.site_name') . ' team. How can I help you today?';
@endphp
<script>
window.ChatbotConfig = {
  messageUrl: @json($chatMsgUrl),
  clearUrl:   @json($chatClrUrl),
  csrf:       @json(csrf_token()),
  locale:     @json(app()->getLocale()),
  greeting:   @json($chatGreeting),
};
</script>

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
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>{{ __('front.modal_bio') }}</h4>
        <p id="mBio"></p>
      </div>
      <div class="modal-section">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>{{ __('front.modal_certs') }}</h4>
        <ul id="mCerts"></ul>
      </div>
      <div class="modal-section">
        <h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>{{ __('front.modal_specialties') }}</h4>
        <div class="modal-tags" id="mTags"></div>
      </div>
      <a href="#booking" class="btn btn-primary" data-close style="width:100%;margin-top:10px"><span>{{ __('front.book_with_doctor') }}</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
      </a>
    </div>
  </div>
</div>

<script src="{{ asset('assets_front/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
