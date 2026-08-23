@extends('layouts.front')
@section('title', ($article->meta_title ?: $article->title) . ' — ' . sett('identity.site_name'))
@section('meta_description', $article->meta_description ?: $article->excerpt)

@push('styles')
<style>
/* Article page — scoped to this page only via the .ap- prefix. */

.ap-page { padding: 150px 0 100px; }

.ap-crumbs { color: var(--muted); font-size: .85rem; margin-bottom: 18px; }
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
  margin-bottom: 16px;
}

.ap-title {
  font-size: clamp(1.8rem, 3.6vw, 2.5rem);
  color: var(--ink);
  line-height: 1.35;
  margin-bottom: 16px;
}

.ap-lead { color: var(--ink-soft); font-size: 1.08rem; line-height: 1.8; margin-bottom: 20px; }

.ap-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--muted);
  font-size: .85rem;
  margin-bottom: 32px;
}
.ap-meta-item { display: inline-flex; align-items: center; gap: 6px; }
.ap-meta-item svg { width: 15px; height: 15px; color: var(--teal); }
.ap-meta-dot { width: 4px; height: 4px; border-radius: 50%; background: var(--line-2); }

.ap-cover { border-radius: var(--r-lg); overflow: hidden; margin-bottom: 32px; }
.ap-cover img { width: 100%; height: auto; display: block; }

.ap-content { font-size: 1.02rem; line-height: 2; color: var(--ink); }
.ap-content p { margin-bottom: 22px; }
.ap-content p:last-child { margin-bottom: 0; }

.ap-cta { margin-top: 36px; padding-top: 32px; border-top: 1px solid var(--line); }

/* ── Related articles ──────────────────────────────────── */
.ap-related { margin-top: 60px; padding-top: 50px; border-top: 1px solid var(--line); }
.ap-related-title { font-size: 1.4rem; color: var(--ink); margin-bottom: 28px; }

.ap-related-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }

.ap-related-card {
  display: block;
  text-decoration: none;
  color: inherit;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  overflow: hidden;
  transition: transform .4s var(--ease), box-shadow .4s var(--ease), border-color .4s var(--ease);
}
.ap-related-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); border-color: transparent; }
.ap-related-img { height: 180px; position: relative; overflow: hidden; }
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
.ap-related-body { padding: 20px; }
.ap-related-body h3 { font-size: 1.05rem; line-height: 1.4; margin-bottom: 8px; transition: color .3s; }
.ap-related-card:hover .ap-related-body h3 { color: var(--teal); }
.ap-related-body p { color: var(--muted); font-size: .87rem; line-height: 1.6; }

@media(max-width:900px) {
  .ap-related-grid { grid-template-columns: repeat(2, 1fr); }
}
@media(max-width:600px) {
  .ap-page { padding: 120px 0 70px; }
  .ap-related-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')

<div class="ap-page">
<div class="wrap">

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

  @if($article->image)
  <div class="ap-cover">
    <img data-src="{{ $article->image_url }}" alt="{{ $article->title }}">
  </div>
  @endif

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

  @if($relatedArticles->isNotEmpty())
  <div class="ap-related">
    <h2 class="ap-related-title">{{ __('front.related_articles') }}</h2>
    <div class="ap-related-grid">
      @foreach($relatedArticles as $related)
      <a href="{{ route('articles.show', $related) }}" class="ap-related-card">
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
