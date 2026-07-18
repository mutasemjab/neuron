@php
    $footServices = \App\Models\Service::active()->limit(5)->get();
@endphp

<footer>
  <div class="wrap">
    <div class="foot-grid">
      <div class="foot-brand">
        <a href="{{ route('home') }}" class="logo">
          <span class="logo-footer"><img src="{{ asset('assets_front/images/logo.png') }}" alt="{{ sett('identity.site_name') }}"></span>
        </a>
        <p>{{ sett('footer.about_text') }}</p>
        <div class="foot-social">
          @if(sett_raw('social.facebook_url'))<a href="{{ sett_raw('social.facebook_url') }}" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>@endif
          @if(sett_raw('social.instagram_url'))<a href="{{ sett_raw('social.instagram_url') }}" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg></a>@endif
          @if(sett_raw('social.youtube_url'))<a href="{{ sett_raw('social.youtube_url') }}" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-4-.5-5.8a3 3 0 0 0-2.1-2.1C18.6 3.5 12 3.5 12 3.5s-6.6 0-8.4.6A3 3 0 0 0 1.5 6.2C1 8 1 12 1 12s0 4 .5 5.8a3 3 0 0 0 2.1 2.1c1.8.6 8.4.6 8.4.6s6.6 0 8.4-.6a3 3 0 0 0 2.1-2.1C23 16 23 12 23 12zM10 15.5v-7l6 3.5z"/></svg></a>@endif
          @if($waNumber = sett_raw('contact.whatsapp_number'))<a href="https://wa.me/{{ $waNumber }}" target="_blank" rel="noopener" aria-label="WhatsApp">
             <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.669.15-.198.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.571-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.148.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg></a>@endif
        </div>
      </div>

      <div class="foot-col">
        <h4>{{ __('front.footer_quick_links') }}</h4>
        <ul>
          <li><a href="{{ route('home') }}#about">{{ __('front.nav_about') }}</a></li>
          <li><a href="{{ route('home') }}#services">{{ __('front.nav_services') }}</a></li>
          <li><a href="{{ route('home') }}#team">{{ __('front.nav_team') }}</a></li>
          <li><a href="{{ route('articles.index') }}">{{ __('front.nav_articles') }}</a></li>
          <li><a href="{{ route('home') }}#careers">{{ __('front.nav_careers') }}</a></li>
        </ul>
      </div>

      <div class="foot-col">
        <h4>{{ __('front.footer_our_services') }}</h4>
        <ul>
          @foreach($footServices as $footService)
          <li><a href="{{ route('home') }}#services">{{ $footService->title }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="foot-col">
        <h4>{{ __('front.footer_contact_us') }}</h4>
        <ul class="foot-contact">
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><span>{{ sett('contact.address_short') }}</span></li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span dir="ltr">{{ sett_raw('contact.phone') }}</span></li>
          <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 5L2 7"/></svg><span>{{ sett_raw('contact.email') }}</span></li>
        </ul>
      </div>
    </div>

    <div class="foot-bottom">
      <span>© {{ now()->year }} {{ sett('footer.copyright_brand') }}. {{ sett('footer.rights_text') }}.</span>
      <div style="display:flex;gap:22px"><a href="#">{{ __('front.footer_privacy') }}</a><a href="#">{{ __('front.footer_terms') }}</a></div>
    </div>
  </div>
</footer>
