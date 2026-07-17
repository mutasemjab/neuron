@extends('layouts.front')
@section('title', sett('articles_section.heading_main') . ' ' . sett('articles_section.heading_highlight') . ' — ' . sett('identity.site_name'))
@section('meta_description', sett('seo.default_description'))

@section('content')

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow">{{ sett('articles_section.eyebrow') }}</span>
    <h1>{{ sett('articles_section.heading_main') }} <span class="tealword">{{ sett('articles_section.heading_highlight') }}</span></h1>
    <div class="crumbs"><a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> / {{ __('front.nav_articles') }}</div>
  </div>
</div>

<section class="page-section">
  <div class="wrap">
    <div class="art-grid">
      @foreach($articles as $article)
      <a href="{{ route('articles.show', $article) }}" class="art reveal" style="text-decoration:none;color:inherit">
        <div class="art-img">
          <div class="ph" data-label="{{ $article->category }}">
            @if($article->image)
              <img data-src="{{ $article->image_url }}" alt="{{ $article->title }}">
            @endif
          </div>
          @if($article->category)<span class="art-cat">{{ $article->category }}</span>@endif
        </div>
        <div class="art-body">
          <div class="art-meta">
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>{{ $article->published_at?->translatedFormat('d M Y') }}</span>
            <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $article->read_minutes }} {{ __('front.min_read') }}</span>
          </div>
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->excerpt }}</p>
          <span class="art-read">{{ __('front.read_article') }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
          </span>
        </div>
      </a>
      @endforeach
    </div>

    @if($articles->hasPages())
    <div class="pager">
      @if($articles->onFirstPage())
        <span class="btn btn-ghost" style="opacity:.4">{{ __('front.prev') }}</span>
      @else
        <a href="{{ $articles->previousPageUrl() }}" class="btn btn-ghost">{{ __('front.prev') }}</a>
      @endif
      @if($articles->hasMorePages())
        <a href="{{ $articles->nextPageUrl() }}" class="btn btn-primary">{{ __('front.next') }}</a>
      @else
        <span class="btn btn-primary" style="opacity:.4">{{ __('front.next') }}</span>
      @endif
    </div>
    @endif
  </div>
</section>

@endsection
