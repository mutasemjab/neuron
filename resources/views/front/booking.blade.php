@extends('layouts.front')
@section('title', sett('booking_page.heading') . ' | ' . sett('identity.site_name'))
@section('meta_description', sett('booking_page.subtext'))

@push('styles')
<style>
.book-price-badge {
  display:inline-flex; align-items:center; gap:16px;
  background:#fff; border:1px solid var(--line); border-radius:var(--r-lg);
  padding:16px 30px; box-shadow:var(--shadow-sm);
  text-align:start;
  margin-top:24px;
}
.book-price-badge svg { width:30px;height:30px;color:var(--teal); flex-shrink:0; }
.book-price-badge .bp-label { display:block; color:var(--muted); font-size:.8rem; font-weight:700; margin-bottom:2px; }
.book-price-badge .bp-value { color:var(--teal-deep); font-size:1.5rem; font-weight:900; font-family:var(--f-num); line-height:1.2; }
.book-price-badge .bp-note { display:block; color:var(--muted); font-size:.76rem; margin-top:3px; }

.book-page-form-wrap { padding: 70px 0 100px; }
.book-page-grid {
  display:grid;
  grid-template-columns: 1fr 1fr;
  gap: 32px;
  align-items: start;
}
.book-page-card {
  background:#fff; border-radius:var(--r-lg); box-shadow:var(--shadow-lg);
  padding: 40px;
  height: 100%;
}
.book-page-card-head { margin-bottom:26px; padding-bottom:20px; border-bottom:1px solid var(--line); }
.book-page-card-head .bpc-icon {
  width:44px;height:44px; border-radius:12px;
  background:var(--teal-light); color:var(--teal);
  display:flex;align-items:center;justify-content:center;
  margin-bottom:14px;
}
.book-page-card-head .bpc-icon svg { width:22px;height:22px; }
.book-page-card-head h2 { font-size:1.25rem; color:var(--ink); margin-bottom:6px; }
.book-page-card-head p { color:var(--ink-soft); font-size:.9rem; margin:0; }

@media(max-width:900px){
  .book-page-grid { grid-template-columns:1fr; }
}
@media(max-width:600px){
  .book-page-card { padding:26px 20px; }
}
</style>
@endpush

@section('content')

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow">{{ sett('booking_page.eyebrow') }}</span>
    <h1>{{ sett('booking_page.heading') }}</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">{{ sett('booking_page.subtext') }}</p>
    <div class="crumbs"><a href="{{ route('home') }}">{{ __('front.nav_home') }}</a> / {{ sett('booking_page.heading') }}</div>

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
    <div class="book-page-grid">

      {{-- ── General booking (no doctor selection) ── --}}
      <div class="book-page-card reveal">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4M16 2v4M3 10h18M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/></svg></div>
          <h2>{{ app()->getLocale() === 'ar' ? 'حجز عام' : 'General Booking' }}</h2>
          <p>{{ app()->getLocale() === 'ar' ? 'اترك اختيار الطبيب المناسب لحالتك لفريقنا الطبي.' : 'Let our medical team choose the right doctor for your case.' }}</p>
        </div>

        <form class="book-ajax-form" action="{{ route('appointments.store') }}" method="POST">
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

        <div class="form-success">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3>{{ __('front.form_success_title') }}</h3>
          <p>{{ __('front.form_success_text') }}</p>
        </div>
      </div>

      {{-- ── Booking with a specific doctor ── --}}
      <div class="book-page-card reveal">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
          <h2>{{ __('front.book_with_doctor') }}</h2>
          <p>{{ app()->getLocale() === 'ar' ? 'اختر الطبيب الذي ترغب بمراجعته مباشرة.' : 'Choose the doctor you would like to see directly.' }}</p>
        </div>

        <form class="book-ajax-form" action="{{ route('appointments.store') }}" method="POST">
          @csrf
          <div class="form-row">
            <div class="field"><label>{{ __('front.form_full_name') }} <span class="req">*</span></label><input type="text" name="name" required placeholder="{{ __('front.form_full_name_ph') }}"></div>
            <div class="field"><label>{{ __('front.form_phone') }} <span class="req">*</span></label><input type="tel" name="phone" required placeholder="{{ __('front.form_phone_ph') }}"></div>
          </div>
          <div class="form-row">
            <div class="field full" style="grid-column:1/-1"><label>{{ __('front.form_doctor') }} <span class="req">*</span></label>
              <select name="doctor_id" required>
                <option value="">{{ __('front.form_doctor_ph') }}</option>
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }} — {{ $doctor->specialization }}</option>
                @endforeach
              </select>
            </div>
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

        <div class="form-success">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3>{{ __('front.form_success_title') }}</h3>
          <p>{{ __('front.form_success_text') }}</p>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
