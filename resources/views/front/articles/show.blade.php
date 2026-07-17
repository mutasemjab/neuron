@extends('layouts.front')
@section('title', ($article->meta_title ?: $article->title) . ' — ' . sett('identity.site_name'))
@section('meta_description', $article->meta_description ?: $article->excerpt)

@section('content')

<div class="page-head">
  <div class="wrap">
    @if($article->category)<span class="eyebrow">{{ $article->category }}</span>@endif
    <div class="crumbs"><a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> / <a href="{{ route('articles.index') }}">{{ __('front.nav_articles') }}</a></div>
  </div>
</div>

<section class="page-section">
  <div class="wrap article-single">
    <h1>{{ $article->title }}</h1>
    <div class="art-meta">
      <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>{{ $article->published_at?->translatedFormat('d M Y') }}</span>
      <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $article->read_minutes }} {{ __('front.min_read') }}</span>
    </div>
    <p class="lead">{{ $article->excerpt }}</p>

    @if($article->image)
    <div class="art-cover ph">
      <img data-src="{{ $article->image_url }}" alt="{{ $article->title }}">
    </div>
    @endif

    <div class="article-content">
      @foreach(explode("\n", $article->body) as $paragraph)
        @continue(trim($paragraph) === '')
        <p>{{ $paragraph }}</p>
      @endforeach
    </div>

    <div style="margin-top:40px;text-align:center">
      <a href="#booking-cta" class="btn btn-primary btn-lg" onclick="location.href='{{ route('home') }}#booking'"><span>{{ __('front.book_now') }}</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </div>

  @if($relatedArticles->isNotEmpty())
  <div class="wrap article-related">
    <div class="sec-head center reveal">
      <h2>{{ __('front.related_articles') }}</h2>
    </div>
    <div class="art-grid">
      @foreach($relatedArticles as $related)
      <a href="{{ route('articles.show', $related) }}" class="art reveal" style="text-decoration:none;color:inherit">
        <div class="art-img">
          <div class="ph" data-label="{{ $related->category }}">
            @if($related->image)
              <img data-src="{{ $related->image_url }}" alt="{{ $related->title }}">
            @endif
          </div>
          @if($related->category)<span class="art-cat">{{ $related->category }}</span>@endif
        </div>
        <div class="art-body">
          <h3>{{ $related->title }}</h3>
          <p>{{ $related->excerpt }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endif
</section>

@endsection
