@extends('layouts.front')
@section('title', sett('booking_page.heading') . ' | ' . sett('identity.site_name'))
@section('meta_description', sett('booking_page.subtext'))

@push('styles')
<style>
.book-page-hero {
  padding: 160px 0 50px;
  background: linear-gradient(180deg,var(--paper-2) 0%,var(--paper) 100%);
  text-align: center;
}
.book-page-hero .crumbs { margin-bottom:18px;color:var(--muted);font-size:.85rem; }
.book-page-hero .crumbs a { color:var(--teal); }
.book-page-hero h1 { font-size:clamp(2rem,4vw,3rem); color:var(--ink); margin-bottom:14px; line-height:1.2; }
.book-page-hero > .wrap > p { color:var(--ink-soft); font-size:1.05rem; max-width:640px; margin:0 auto 28px; }

.book-price-badge {
  display:inline-flex; align-items:center; gap:16px;
  background:#fff; border:1px solid var(--line); border-radius:var(--r-lg);
  padding:16px 30px; box-shadow:var(--shadow-sm);
  text-align:start;
}
.book-price-badge svg { width:30px;height:30px;color:var(--teal); flex-shrink:0; }
.book-price-badge .bp-label { display:block; color:var(--muted); font-size:.8rem; font-weight:700; margin-bottom:2px; }
.book-price-badge .bp-value { color:var(--teal-deep); font-size:1.5rem; font-weight:900; font-family:var(--f-num); line-height:1.2; }
.book-price-badge .bp-note { display:block; color:var(--muted); font-size:.76rem; margin-top:3px; }

.book-page-form-wrap { padding: 10px 0 100px; }
.book-page-card {
  max-width: 760px; margin:0 auto;
  background:#fff; border-radius:var(--r-lg); box-shadow:var(--shadow-lg);
  padding: 48px;
}

@media(max-width:600px){
  .book-page-hero { padding-top:130px; }
  .book-page-card { padding:28px 20px; }
}
</style>
@endpush

@section('content')

<div class="book-page-hero">
  <div class="wrap">
    <div class="crumbs">
      <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a>
      <span style="margin:0 6px">/</span>
      <span>{{ sett('booking_page.heading') }}</span>
    </div>
    <span class="eyebrow">{{ sett('booking_page.eyebrow') }}</span>
    <h1>{{ sett('booking_page.heading') }}</h1>
    <p>{{ sett('booking_page.subtext') }}</p>

    @if(sett('booking_page.price'))
    <div class="book-price-badge">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v12M15 9.5c0-1.4-1.3-2.5-3-2.5s-3 1.1-3 2.5 1.3 2 3 2 3 .6 3 2-1.3 2.5-3 2.5-3-1.1-3-2.5"/></svg>
      <div>
        <span class="bp-label">{{ app()->getLocale() === 'ar' ? 'سعر الحجز' : 'Booking Price' }}</span>
        <span class="bp-value">{{ sett('booking_page.price') }}</span>
        @if(sett('booking_page.price_note'))<span class="bp-note">{{ sett('booking_page.price_note') }}</span>@endif
      </div>
    </div>
    @endif
  </div>
</div>

<div class="book-page-form-wrap">
  <div class="wrap">
    <div class="book-page-card reveal">
      <form id="bookForm" action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="field"><label>{{ __('front.form_full_name') }} <span class="req">*</span></label><input type="text" name="name" required placeholder="{{ __('front.form_full_name_ph') }}"></div>
          <div class="field"><label>{{ __('front.form_phone') }} <span class="req">*</span></label><input type="tel" name="phone" required placeholder="{{ __('front.form_phone_ph') }}"></div>
        </div>
        <div class="form-row">
          <div class="field"><label>{{ __('front.form_branch') }} <span class="req">*</span></label>
            <select name="branch_id" required>
              <option value="">{{ __('front.form_branch_ph') }}</option>
              @foreach($branches as $branch)
              <option value="{{ $branch->id }}">{{ $branch->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="field"><label>{{ __('front.form_date') }} <span class="req">*</span></label><input type="date" name="preferred_date" min="{{ now()->toDateString() }}" required></div>
        </div>
        <div class="form-row">
          <div class="field full" style="grid-column:1/-1">
            <label>{{ __('front.form_time') }} <span class="req">*</span></label>
            <select name="preferred_time_slot" required>
              <option value="">{{ __('front.form_time_ph') }}</option>
              <option>{{ __('front.time_slot_morning') }}</option>
              <option>{{ __('front.time_slot_noon') }}</option>
              <option>{{ __('front.time_slot_afternoon') }}</option>
              <option>{{ __('front.time_slot_evening') }}</option>
            </select>
          </div>
        </div>
        <div class="field full" style="margin-bottom:18px"><label>{{ __('front.form_notes') }}</label><textarea name="notes" placeholder="{{ __('front.form_notes_ph') }}"></textarea></div>
        <button type="submit" class="btn btn-primary btn-lg"><span>{{ __('front.form_submit') }}</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>
      </form>

      <div class="form-success" id="formSuccess">
        <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
        <h3>{{ __('front.form_success_title') }}</h3>
        <p>{{ __('front.form_success_text') }}</p>
      </div>
    </div>
  </div>
</div>

@endsection
