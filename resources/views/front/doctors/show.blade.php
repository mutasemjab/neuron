@extends('layouts.front')
@section('title', $doctor->name . ' — ' . $doctor->specialization . ' | ' . sett('identity.site_name'))
@section('meta_description', $doctor->bio ? Str::limit(strip_tags($doctor->bio), 160) : $doctor->title)

@push('styles')
<style>
/* ── Doctor Profile Page ───────────────────────────────── */
.doc-hero {
  padding: 160px 0 0;
  background: linear-gradient(180deg,var(--paper-2) 0%,var(--paper) 100%);
  position: relative;
  overflow: hidden;
}
.doc-hero::before {
  content:"";
  position:absolute;
  top:-120px;inset-inline-end:-180px;
  width:520px;height:520px;
  border-radius:50%;
  background:radial-gradient(circle,var(--teal-light) 0%,transparent 70%);
  pointer-events:none;
}
.doc-hero-inner {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 60px;
  align-items: flex-end;
}
.doc-hero-text { padding-bottom: 52px; }
.doc-hero-text .eyebrow { margin-bottom: 14px; }
.doc-hero-text h1 {
  font-size: clamp(2rem,4vw,3.2rem);
  color: var(--ink);
  margin-bottom: 10px;
  line-height: 1.15;
}
.doc-hero-subtitle {
  color: var(--ink-soft);
  font-size: 1.05rem;
  margin-bottom: 28px;
}
.doc-hero-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 36px;
}
.doc-tag {
  background: var(--teal-light);
  color: var(--teal-deep);
  border-radius: 30px;
  padding: 5px 16px;
  font-size: .78rem;
  font-weight: 700;
  letter-spacing: .04em;
}
.doc-hero-img {
  width: 300px;
  flex-shrink: 0;
  align-self: flex-end;
}
.doc-hero-img-wrap {
  width: 300px;
  height: 360px;
  border-radius: var(--r-lg) var(--r-lg) 0 0;
  overflow: hidden;
  box-shadow: var(--shadow-md);
  background: var(--paper-3);
  position: relative;
}
.doc-hero-img-wrap img {
  width:100%; height:100%; object-fit:cover;
}
.doc-hero-img-placeholder {
  width:100%;height:100%;
  display:flex;align-items:center;justify-content:center;
  color:var(--line-2);
}
.doc-hero-img-placeholder svg { width:96px;height:96px; }

/* ── Body layout ─────────────────────────────────────── */
.doc-body-wrap {
  padding: 56px 0 80px;
}
.doc-layout {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 36px;
  align-items: start;
}
.doc-main { display:flex; flex-direction:column; gap:28px; }
.doc-aside { display:flex; flex-direction:column; gap:24px; position:sticky; top:100px; }

/* ── Cards ───────────────────────────────────────────── */
.doc-card {
  background: var(--paper);
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  padding: 32px;
  box-shadow: var(--shadow-sm);
}
.doc-card-title {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 1.05rem;
  font-weight: 800;
  color: var(--ink);
  margin-bottom: 22px;
  padding-bottom: 16px;
  border-bottom: 2px solid var(--teal-light);
}
.doc-card-title svg {
  width: 22px; height: 22px;
  color: var(--teal);
  flex-shrink: 0;
}
.doc-card-icon-wrap {
  width: 40px; height: 40px;
  background: var(--teal-light);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
}

/* ── Bio ─────────────────────────────────────────────── */
.doc-bio p {
  line-height: 1.9;
  color: var(--ink-soft);
  font-size: 1.01rem;
  margin-bottom: 14px;
}
.doc-bio p:last-child { margin-bottom: 0; }

/* ── Certs ───────────────────────────────────────────── */
.doc-certs { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:13px; }
.doc-certs li {
  display:flex; align-items:flex-start; gap:12px;
  color:var(--ink-soft);
  font-size:.97rem;
  line-height:1.65;
}
.doc-cert-check {
  flex-shrink:0;
  width:22px;height:22px;
  background:var(--teal-light);
  border-radius:6px;
  display:flex;align-items:center;justify-content:center;
  margin-top:1px;
}
.doc-cert-check svg { width:13px;height:13px;color:var(--teal); }

/* ── Publications ────────────────────────────────────── */
.doc-pub-item {
  display:flex;
  gap:18px;
  padding:18px 0;
  border-bottom:1px solid var(--line);
}
.doc-pub-item:first-child { padding-top:0; }
.doc-pub-item:last-child { border-bottom:none; padding-bottom:0; }
.doc-pub-year-badge {
  flex-shrink:0;
  min-width:58px;
  background:var(--teal);
  color:#fff;
  border-radius:10px;
  padding:6px 10px;
  font-size:.78rem;
  font-weight:800;
  text-align:center;
  align-self:flex-start;
  font-family:var(--f-num);
  letter-spacing:.04em;
}
.doc-pub-year-badge.no-year {
  background:var(--paper-3);
  color:var(--muted);
}
.doc-pub-content { flex:1; min-width:0; }
.doc-pub-title-text {
  font-size:.97rem;
  font-weight:700;
  color:var(--ink);
  line-height:1.55;
  margin-bottom:4px;
}
.doc-pub-title-text a {
  color:inherit;
  display:inline-flex;
  align-items:flex-start;
  gap:6px;
  transition:color .3s;
}
.doc-pub-title-text a:hover { color:var(--teal); }
.doc-pub-title-text a svg { flex-shrink:0; margin-top:3px; }
.doc-pub-sub {
  font-size:.84rem;
  color:var(--muted);
  font-style:italic;
}

/* ── Aside cards ─────────────────────────────────────── */
.doc-aside-spec {
  background:linear-gradient(135deg,var(--teal-darker) 0%,var(--teal-deep) 100%);
  color:#fff;
  border:none;
}
.doc-aside-spec .doc-card-title { color:#fff; border-bottom-color:rgba(255,255,255,.15); }
.doc-aside-spec .doc-card-title svg { color:rgba(255,255,255,.7); }
.doc-aside-tags { display:flex; flex-wrap:wrap; gap:8px; }
.doc-aside-tag {
  background:rgba(255,255,255,.15);
  color:#fff;
  border-radius:20px;
  padding:5px 14px;
  font-size:.8rem;
  font-weight:600;
}
.doc-book-card {
  background:var(--teal);
  border:none;
  text-align:center;
}
.doc-book-card .btn {
  width:100%;
  justify-content:center;
  background:#fff;
  color:var(--teal);
  font-weight:800;
  box-shadow:0 8px 24px rgba(0,0,0,.12);
}
.doc-book-card .btn:hover { background:var(--paper-2); }
.doc-book-card p {
  color:rgba(255,255,255,.8);
  font-size:.85rem;
  margin-bottom:14px;
}

/* ── Responsive ───────────────────────────────────────── */
@media(max-width:900px){
  .doc-hero-inner { grid-template-columns:1fr; gap:30px; }
  .doc-hero-img { display:none; }
  .doc-layout { grid-template-columns:1fr; }
  .doc-aside { position:static; }
  .doc-hero-text { padding-bottom:40px; }
}
@media(max-width:600px){
  .doc-hero { padding-top:130px; }
  .doc-card { padding:22px 18px; }
}
</style>
@endpush

@section('content')

{{-- ══ HERO ══ --}}
<div class="doc-hero">
  <div class="wrap">
    <div class="doc-hero-inner">

      <div class="doc-hero-text reveal">
        <div class="crumbs" style="margin-bottom:18px;color:var(--muted);font-size:.85rem">
          <a href="{{ route('home') }}" style="color:var(--teal)">{{ __('front.nav_home') }}</a>
          <span style="margin:0 6px">/</span>
          <span>{{ $doctor->name }}</span>
        </div>
        <span class="eyebrow">{{ $doctor->specialization }}</span>
        <h1>{{ $doctor->name }}</h1>
        <p class="doc-hero-subtitle">{{ $doctor->title }}</p>

        @if($doctor->tags_list)
        <div class="doc-hero-tags">
          @foreach($doctor->tags_list as $tag)
            <span class="doc-tag">{{ $tag }}</span>
          @endforeach
        </div>
        @endif

        <a href="{{ route('home') }}#booking" class="btn btn-primary">
          <span>{{ __('front.book_with_doctor') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
        </a>
      </div>

      <div class="doc-hero-img">
        <div class="doc-hero-img-wrap">
          @if($doctor->image)
            <img src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}">
          @else
            <div class="doc-hero-img-placeholder">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>

{{-- ══ BODY ══ --}}
<div class="doc-body-wrap">
  <div class="wrap">
    <div class="doc-layout">

      {{-- ── Main column ── --}}
      <div class="doc-main">

        @if($doctor->bio)
        <div class="doc-card reveal">
          <div class="doc-card-title">
            <div class="doc-card-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            {{ app()->getLocale() === 'ar' ? 'نبذة تعريفية' : 'Biography' }}
          </div>
          <div class="doc-bio">
            @foreach(explode("\n", $doctor->bio) as $para)
              @continue(trim($para) === '')
              <p>{{ $para }}</p>
            @endforeach
          </div>
        </div>
        @endif

        @if($doctor->certifications_list)
        <div class="doc-card reveal">
          <div class="doc-card-title">
            <div class="doc-card-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            {{ app()->getLocale() === 'ar' ? 'الشهادات والخبرات' : 'Certifications & Experience' }}
          </div>
          <ul class="doc-certs">
            @foreach($doctor->certifications_list as $cert)
            <li>
              <div class="doc-cert-check">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              {{ $cert }}
            </li>
            @endforeach
          </ul>
        </div>
        @endif

        @if($doctor->publications->isNotEmpty())
        <div class="doc-card reveal">
          <div class="doc-card-title">
            <div class="doc-card-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            {{ app()->getLocale() === 'ar' ? 'الأبحاث والمنشورات العلمية' : 'Research & Publications' }}
          </div>
          <div>
            @foreach($doctor->publications as $pub)
            <div class="doc-pub-item">
              <div class="doc-pub-year-badge {{ $pub->year ? '' : 'no-year' }}">
                {{ $pub->year ?? '—' }}
              </div>
              <div class="doc-pub-content">
                <div class="doc-pub-title-text">
                  @if($pub->url)
                    <a href="{{ $pub->url }}" target="_blank" rel="noopener noreferrer">
                      {{ app()->getLocale() === 'en' && $pub->title_en ? $pub->title_en : $pub->title_ar }}
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:13px;height:13px"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14 21 3"/></svg>
                    </a>
                  @else
                    {{ app()->getLocale() === 'en' && $pub->title_en ? $pub->title_en : $pub->title_ar }}
                  @endif
                </div>
                @if(app()->getLocale() === 'ar' && $pub->title_en)
                  <div class="doc-pub-sub" dir="ltr">{{ $pub->title_en }}</div>
                @elseif(app()->getLocale() === 'en' && $pub->title_ar && $pub->title_en)
                  <div class="doc-pub-sub">{{ $pub->title_ar }}</div>
                @endif
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif

      </div>{{-- end .doc-main --}}

      {{-- ── Aside column ── --}}
      <div class="doc-aside">

        @if($doctor->tags_list)
        <div class="doc-card doc-aside-spec reveal">
          <div class="doc-card-title">
            <div class="doc-card-icon-wrap" style="background:rgba(255,255,255,.15)">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:#fff"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            {{ app()->getLocale() === 'ar' ? 'مجالات التخصص' : 'Specialties' }}
          </div>
          <div class="doc-aside-tags">
            @foreach($doctor->tags_list as $tag)
              <span class="doc-aside-tag">{{ $tag }}</span>
            @endforeach
          </div>
        </div>
        @endif

        <div class="doc-card doc-book-card reveal">
          <p>{{ app()->getLocale() === 'ar' ? 'احجز موعدك مع الدكتور الآن' : 'Book your appointment now' }}</p>
          <a href="{{ route('home') }}#booking" class="btn">
            <span>{{ __('front.book_with_doctor') }}</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg>
          </a>
        </div>

        @if($doctor->publications->isNotEmpty())
        <div class="doc-card reveal" style="background:var(--paper-2)">
          <div class="doc-card-title">
            <div class="doc-card-icon-wrap">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            {{ app()->getLocale() === 'ar' ? 'عدد الأبحاث' : 'Publications' }}
          </div>
          <div style="text-align:center;padding:10px 0">
            <div style="font-family:var(--f-num);font-size:3rem;font-weight:900;color:var(--teal);line-height:1">
              {{ $doctor->publications->count() }}
            </div>
            <div style="color:var(--muted);font-size:.88rem;margin-top:6px">
              {{ app()->getLocale() === 'ar' ? 'بحث ومنشور علمي' : 'Research Papers' }}
            </div>
          </div>
        </div>
        @endif

      </div>{{-- end .doc-aside --}}

    </div>
  </div>
</div>

@endsection
