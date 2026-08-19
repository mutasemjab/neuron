@extends('layouts.front')
@section('title', $doctor->name . ' — ' . $doctor->specialization . ' | ' . sett('identity.site_name'))
@section('meta_description', $doctor->bio ? Str::limit(strip_tags($doctor->bio), 160) : $doctor->title)

@section('content')

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow">{{ $doctor->specialization }}</span>
    <div class="crumbs">
      <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> /
      <span>{{ $doctor->name }}</span>
    </div>
  </div>
</div>

<section class="page-section">
  <div class="wrap">

    {{-- ── Profile header ── --}}
    <div class="doc-profile-header reveal">
      <div class="doc-profile-img">
        @if($doctor->image)
          <img src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}">
        @else
          <div class="doc-profile-placeholder">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
          </div>
        @endif
      </div>
      <div class="doc-profile-info">
        <span class="eyebrow">{{ $doctor->specialization }}</span>
        <h1>{{ $doctor->name }}</h1>
        <p class="doc-profile-title">{{ $doctor->title }}</p>

        @if($doctor->tags_list)
        <div class="doc-profile-tags">
          @foreach($doctor->tags_list as $tag)
            <span class="doc-tag">{{ $tag }}</span>
          @endforeach
        </div>
        @endif

        <a href="{{ route('home') }}#booking" class="btn btn-primary" style="margin-top:20px">
          <span>{{ __('front.book_with_doctor') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </a>
      </div>
    </div>

    {{-- ── Body sections ── --}}
    <div class="doc-profile-body">

      @if($doctor->bio)
      <div class="doc-profile-section reveal">
        <h2 class="doc-section-title">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
          {{ app()->getLocale() === 'ar' ? 'نبذة تعريفية' : 'Biography' }}
        </h2>
        <div class="doc-bio-text">
          @foreach(explode("\n", $doctor->bio) as $para)
            @continue(trim($para) === '')
            <p>{{ $para }}</p>
          @endforeach
        </div>
      </div>
      @endif

      @if($doctor->certifications_list)
      <div class="doc-profile-section reveal">
        <h2 class="doc-section-title">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
          {{ app()->getLocale() === 'ar' ? 'الشهادات والخبرات' : 'Certifications & Experience' }}
        </h2>
        <ul class="doc-cert-list">
          @foreach($doctor->certifications_list as $cert)
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              {{ $cert }}
            </li>
          @endforeach
        </ul>
      </div>
      @endif

      @if($doctor->publications->isNotEmpty())
      <div class="doc-profile-section reveal">
        <h2 class="doc-section-title">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          {{ app()->getLocale() === 'ar' ? 'الأبحاث والمنشورات العلمية' : 'Research & Publications' }}
        </h2>
        <div class="doc-pub-list">
          @foreach($doctor->publications as $pub)
          <div class="doc-pub-item">
            <div class="doc-pub-info">
              @if($pub->year)
                <span class="doc-pub-year">{{ $pub->year }}</span>
              @endif
              <p class="doc-pub-title">
                @if($pub->url)
                  <a href="{{ $pub->url }}" target="_blank" rel="noopener noreferrer">
                    {{ app()->getLocale() === 'en' && $pub->title_en ? $pub->title_en : $pub->title_ar }}
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;vertical-align:middle;margin-inline-start:4px"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14 21 3"/></svg>
                  </a>
                @else
                  {{ app()->getLocale() === 'en' && $pub->title_en ? $pub->title_en : $pub->title_ar }}
                @endif
              </p>
              @if(app()->getLocale() === 'ar' && $pub->title_en)
                <p class="doc-pub-subtitle" dir="ltr">{{ $pub->title_en }}</p>
              @elseif(app()->getLocale() === 'en' && $pub->title_ar && $pub->title_en)
                <p class="doc-pub-subtitle">{{ $pub->title_ar }}</p>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

    </div>

    {{-- ── Bottom CTA ── --}}
    <div style="text-align:center;margin-top:48px" class="reveal">
      <a href="{{ route('home') }}#booking" class="btn btn-primary btn-lg">
        <span>{{ __('front.book_now') }}</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>

  </div>
</section>

@endsection

@push('styles')
<style>
/* ── Doctor profile page ─────────────────────────────── */
.doc-profile-header {
  display: flex;
  gap: 40px;
  align-items: flex-start;
  margin-bottom: 48px;
}
.doc-profile-img {
  flex-shrink: 0;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  overflow: hidden;
  border: 4px solid var(--clr-primary, #0d6efd);
  box-shadow: 0 8px 32px rgba(0,0,0,.12);
}
.doc-profile-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.doc-profile-placeholder {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #eef2f7;
  color: #aab;
}
.doc-profile-placeholder svg { width: 80px; height: 80px; }
.doc-profile-info h1 { margin: 6px 0 4px; font-size: 2rem; }
.doc-profile-title { color: #6b7280; font-size: 1.05rem; margin: 0 0 14px; }
.doc-profile-tags { display: flex; flex-wrap: wrap; gap: 8px; }
.doc-tag {
  background: var(--clr-primary-light, #e8f0fe);
  color: var(--clr-primary, #0d6efd);
  border-radius: 20px;
  padding: 4px 14px;
  font-size: .82rem;
  font-weight: 600;
}

.doc-profile-body { display: flex; flex-direction: column; gap: 36px; }

.doc-profile-section {
  background: #fff;
  border: 1px solid #e5e9f0;
  border-radius: 16px;
  padding: 28px 32px;
}
.doc-section-title {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 1.2rem;
  font-weight: 700;
  margin: 0 0 20px;
  color: var(--clr-heading, #1a2340);
}
.doc-section-title svg { width: 22px; height: 22px; color: var(--clr-primary, #0d6efd); flex-shrink: 0; }

.doc-bio-text p { line-height: 1.85; color: #374151; margin-bottom: 12px; }
.doc-bio-text p:last-child { margin-bottom: 0; }

.doc-cert-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
.doc-cert-list li { display: flex; align-items: flex-start; gap: 10px; color: #374151; line-height: 1.6; }
.doc-cert-list li svg { width: 18px; height: 18px; color: #10b981; flex-shrink: 0; margin-top: 3px; }

.doc-pub-list { display: flex; flex-direction: column; gap: 0; }
.doc-pub-item {
  display: flex;
  align-items: flex-start;
  gap: 16px;
  padding: 16px 0;
  border-bottom: 1px solid #f0f2f5;
}
.doc-pub-item:last-child { border-bottom: none; padding-bottom: 0; }
.doc-pub-year {
  flex-shrink: 0;
  background: var(--clr-primary, #0d6efd);
  color: #fff;
  border-radius: 8px;
  padding: 4px 12px;
  font-size: .8rem;
  font-weight: 700;
  align-self: flex-start;
  margin-top: 2px;
  min-width: 54px;
  text-align: center;
}
.doc-pub-info { flex: 1; }
.doc-pub-title { margin: 0 0 4px; font-size: 1rem; font-weight: 600; color: #1a2340; line-height: 1.5; }
.doc-pub-title a { color: inherit; text-decoration: none; }
.doc-pub-title a:hover { color: var(--clr-primary, #0d6efd); }
.doc-pub-subtitle { margin: 0; font-size: .85rem; color: #6b7280; }

@media (max-width: 640px) {
  .doc-profile-header { flex-direction: column; align-items: center; text-align: center; }
  .doc-profile-tags { justify-content: center; }
  .doc-profile-img { width: 150px; height: 150px; }
  .doc-profile-section { padding: 20px 16px; }
}
</style>
@endpush
