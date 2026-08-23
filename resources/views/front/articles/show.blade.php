@extends('layouts.front')
@section('title', ($article->meta_title ?: $article->title) . ' — ' . sett('identity.site_name'))
@section('meta_description', $article->meta_description ?: $article->excerpt)

@push('styles')
<style>
/* ══════════════════════════════════════════════════════════
   Article page — every rule below is scoped to this page only
   via the .ap- prefix. Nothing here targets, or is targeted
   by, a class defined anywhere else in the codebase.
   ══════════════════════════════════════════════════════════ */

.ap-hero {
  padding: 160px 0 70px;
  background: linear-gradient(180deg, #f4faf9 0%, var(--paper) 100%);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.ap-hero::before {
  content: "";
  position: absolute;
  top: -140px;
  inset-inline-end: -160px;
  width: 480px;
  height: 480px;
  border-radius: 50%;
  background: radial-gradient(circle, var(--teal-light) 0%, transparent 70%);
  pointer-events: none;
}
.ap-hero-inner { position: relative; max-width: 820px; margin: 0 auto; }

.ap-crumbs { color: var(--muted); font-size: .85rem; margin-bottom: 20px; }
.ap-crumbs a { color: var(--teal); text-decoration: none; }
.ap-crumbs span { margin: 0 6px; }

.ap-tag {
  display: inline-block;
  background: var(--teal-light);
  color: var(--teal-deep);
  font-size: .78rem;
  font-weight: 700;
  letter-spacing: .04em;
  padding: 6px 16px;
  border-radius: 30px;
  margin-bottom: 18px;
}

.ap-title {
  font-size: clamp(1.9rem, 4vw, 2.7rem);
  color: var(--ink);
  line-height: 1.35;
  margin-bottom: 18px;
}

.ap-lead {
  color: var(--ink-soft);
  font-size: 1.08rem;
  line-height: 1.8;
  max-width: 640px;
  margin: 0 auto 24px;
}

.ap-meta {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  color: var(--muted);
  font-size: .85rem;
}
.ap-meta-item { display: inline-flex; align-items: center; gap: 6px; }
.ap-meta-item svg { width: 15px; height: 15px; color: var(--teal); }
.ap-meta-dot { width: 4px; height: 4px; border-radius: 50%; background: var(--line-2); }

/* ── Cover image: elevated card overlapping the hero ───── */
.ap-cover {
  max-width: 920px;
  margin: -50px auto 0;
  position: relative;
  z-index: 2;
  border-radius: var(--r-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  height: 420px;
}
.ap-cover img { width: 100%; height: 100%; object-fit: cover; display: block; }

/* ── Body: light section grounds the reading card ──────── */
.ap-body { background: var(--paper-2); padding: 70px 0 100px; }

.ap-card {
  display: block;
  max-width: 780px;
  margin: 0 auto;
  background: #fff;
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-sm);
  padding: 52px 56px;
}

.ap-content { font-size: 1.02rem; line-height: 2; color: var(--ink); }
.ap-content p { margin-bottom: 22px; }
.ap-content p:last-child { margin-bottom: 0; }

.ap-cta {
  margin-top: 40px;
  padding-top: 36px;
  border-top: 1px solid var(--line);
  text-align: center;
}

/* ── Related articles ──────────────────────────────────── */
.ap-related { max-width: 1100px; margin: 70px auto 0; }
.ap-related-title { text-align: center; font-size: 1.6rem; color: var(--ink); margin-bottom: 36px; }

.ap-related-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.ap-related-card {
  display: block;
  text-decoration: none;
  color: inherit;
  background: #fff;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  overflow: hidden;
  transition: transform .4s var(--ease), box-shadow .4s var(--ease), border-color .4s var(--ease);
}
.ap-related-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-md);
  border-color: transparent;
}
.ap-related-img { height: 200px; position: relative; overflow: hidden; }
.ap-related-img .ph { position: absolute; inset: 0; }
.ap-related-cat {
  position: absolute;
  top: 14px;
  inset-inline-start: 14px;
  z-index: 3;
  background: rgba(255,255,255,.94);
  color: var(--teal-deep);
  font-size: .72rem;
  font-weight: 600;
  padding: 5px 12px;
  border-radius: 100px;
}
.ap-related-body { padding: 22px; }
.ap-related-body h3 { font-size: 1.1rem; line-height: 1.4; margin-bottom: 8px; transition: color .3s; }
.ap-related-card:hover .ap-related-body h3 { color: var(--teal); }
.ap-related-body p { color: var(--muted); font-size: .88rem; line-height: 1.6; }

@media(max-width:900px) {
  .ap-cover { height: 280px; margin-top: -36px; }
  .ap-card { padding: 36px 26px; }
  .ap-related-grid { grid-template-columns: 1fr; }
}
@media(max-width:600px) {
  .ap-hero { padding: 130px 0 60px; }
  .ap-cover { height: 200px; margin-top: -26px; border-radius: 16px; }
  .ap-card { padding: 28px 20px; }
}
</style>
@endpush

@section('content')

<div class="ap-hero">
  <div class="wrap">
    <div class="ap-hero-inner">
      <div class="ap-crumbs">
        <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a>
        <span>/</span>
        <a href="{{ route('articles.index') }}">{{ __('front.nav_articles') }}</a>
      </div>

      @if($article->category)<span class="ap-tag">{{ $article->category }}</span>@endif

      <h1 class="ap-title">{{ $article->title }}</h1>

      @if($article->excerpt)<p class="ap-lead">{{ $article->excerpt }}</p>@endif

      <div class="ap-meta">
        <span class="ap-meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          {{ $article->published_at?->translatedFormat('d M Y') }}
        </span>
        <span class="ap-meta-dot"></span>
        <span class="ap-meta-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          {{ $article->read_minutes }} {{ __('front.min_read') }}
        </span>
      </div>
    </div>
  </div>
</div>

@if($article->image)
<div class="wrap">
  <div class="ap-cover reveal">
    <img data-src="{{ $article->image_url }}" alt="{{ $article->title }}">
  </div>
</div>
@endif

<div class="ap-body">
  <div class="wrap">

    <article class="ap-card reveal">
      <div class="ap-content">
        @foreach(explode("\n", $article->body) as $paragraph)
          @continue(trim($paragraph) === '')
          <p>{{ $paragraph }}</p>
        @endforeach
      </div>

      <div class="ap-cta">
        <a href="{{ route('booking.page') }}" class="btn btn-primary btn-lg"><span>{{ __('front.book_now') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>
    </article>

    @if($relatedArticles->isNotEmpty())
    <div class="ap-related">
      <h2 class="ap-related-title">{{ __('front.related_articles') }}</h2>
      <div class="ap-related-grid">
        @foreach($relatedArticles as $related)
        <a href="{{ route('articles.show', $related) }}" class="ap-related-card reveal">
          <div class="ap-related-img">
            <div class="ph" data-label="{{ $related->category }}">
              @if($related->image)
                <img data-src="{{ $related->image_url }}" alt="{{ $related->title }}">
              @endif
            </div>
            @if($related->category)<span class="ap-related-cat">{{ $related->category }}</span>@endif
          </div>
          <div class="ap-related-body">
            <h3>{{ $related->title }}</h3>
            <p>{{ $related->excerpt }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif

  </div>
</div>

@endsection
