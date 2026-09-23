@extends('layouts.front')
@section('title', sett('videos_section.heading_main') . ' ' . sett('videos_section.heading_highlight') . ' — ' . sett('identity.site_name'))
@section('meta_description', sett('seo.default_description'))

@section('content')

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow">{{ sett('videos_section.eyebrow') }}</span>
    <h1>{{ sett('videos_section.heading_main') }} <span class="tealword">{{ sett('videos_section.heading_highlight') }}</span></h1>
    <div class="crumbs">
      <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> / {{ __('front.nav_videos') }}
    </div>
  </div>
</div>

<section class="page-section">
  <div class="wrap">
    <div class="vid-grid--all">
      @foreach($videos as $video)
      <button type="button" class="vid reveal" style="--d:{{ $loop->index * 60 }}ms"
        data-video-url="{{ $video->embed_url }}"
        data-fallback-url="{{ $video->video_url }}">
        <div class="ph" data-label="{{ $video->title }}">
          @if($video->thumbnail)<img data-src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}">@endif
        </div>
        <span class="vid-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>
        <div class="vid-info">
          @if($video->tag)<span class="tag">{{ $video->tag }}</span>@endif
          <h3>{{ $video->title }}</h3>
        </div>
      </button>
      @endforeach
    </div>
  </div>
</section>

@endsection
