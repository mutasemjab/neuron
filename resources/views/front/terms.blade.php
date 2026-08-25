@extends('layouts.front')
@section('title', sett('legal.terms_title') . ' — ' . sett('identity.site_name'))
@section('meta_description', sett('legal.terms_title'))

@push('styles')
<style>
.pp-page { padding: 150px 0 100px; }
.pp-wrap { max-width: 800px; margin: 0 auto; }
.pp-crumbs { color: var(--muted); font-size: .85rem; margin-bottom: 18px; }
.pp-crumbs a { color: var(--teal); text-decoration: none; }
.pp-crumbs span { margin: 0 6px; }
.pp-title { font-size: clamp(1.8rem, 3.6vw, 2.4rem); color: var(--ink); margin-bottom: 8px; }
.pp-updated { color: var(--muted); font-size: .85rem; margin-bottom: 32px; }
.pp-content h2 { font-size: 1.2rem; color: var(--ink); margin: 32px 0 12px; }
.pp-content h2:first-child { margin-top: 0; }
.pp-content p { color: var(--ink-soft); font-size: 1rem; line-height: 1.9; margin-bottom: 10px; }
@media(max-width:600px) { .pp-page { padding: 120px 0 70px; } }
</style>
@endpush

@section('content')
<div class="pp-page">
  <div class="wrap">
    <div class="pp-wrap">

      <div class="pp-crumbs">
        <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a>
        <span>/</span>
        <span>{{ sett('legal.terms_title') }}</span>
      </div>

      <h1 class="pp-title">{{ sett('legal.terms_title') }}</h1>
      <p class="pp-updated">{{ app()->getLocale() === 'ar' ? 'آخر تحديث' : 'Last updated' }}: {{ now()->translatedFormat('d M Y') }}</p>
      <div class="pp-content">
        @include('front._legal_content', ['content' => sett('legal.terms_content')])
      </div>

    </div>
  </div>
</div>
@endsection
