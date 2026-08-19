@extends('layouts.front')
@section('title', sett('booking_page.heading') . ' | ' . sett('identity.site_name'))
@section('meta_description', sett('booking_page.subtext'))

@push('styles')
<style>
/* ── Steps ─────────────────────────────────────────────── */
.book-flow { padding: 70px 0 100px; }
.book-step { display:none; }
.book-step.active { display:block; animation: bookStepIn .5s ease; }
@keyframes bookStepIn {
  from { opacity:0; transform:translateY(14px); }
  to   { opacity:1; transform:translateY(0); }
}

/* ── Choice cards ──────────────────────────────────────── */
.book-choice-grid {
  display:grid;
  grid-template-columns: 1fr 1fr;
  gap: 28px;
  max-width: 920px;
  margin: 0 auto;
}
.book-choice-card {
  position:relative;
  text-align: start;
  background:#fff;
  border: 1.5px solid var(--line);
  border-radius: var(--r-lg);
  padding: 40px 34px;
  cursor: pointer;
  overflow:hidden;
  width:100%;
  display:block;
  font: inherit;
  color: inherit;
  -webkit-appearance:none; appearance:none;
  transition: transform .3s, box-shadow .3s, border-color .3s;
}
.book-choice-card::before {
  content:"";
  position:absolute;
  top:-60px; inset-inline-end:-60px;
  width:180px; height:180px;
  border-radius:50%;
  background: radial-gradient(circle, var(--teal-light) 0%, transparent 70%);
  pointer-events:none;
  transition: transform .4s;
}
.book-choice-card:hover,
.book-choice-card:focus-visible {
  transform: translateY(-6px);
  box-shadow: var(--shadow-lg);
  border-color: var(--teal);
  outline:none;
}
.book-choice-card:hover::before { transform:scale(1.15); }
.book-choice-icon {
  width:64px; height:64px;
  border-radius:16px;
  background: var(--teal-light);
  color: var(--teal);
  display:flex; align-items:center; justify-content:center;
  margin-bottom:22px;
  position:relative;
}
.book-choice-icon svg { width:30px;height:30px; }
.book-choice-card h3 { font-size:1.25rem; color:var(--ink); margin-bottom:10px; position:relative; }
.book-choice-card p { color:var(--ink-soft); font-size:.92rem; line-height:1.7; margin-bottom:22px; position:relative; }
.book-choice-cta {
  display:inline-flex; align-items:center; gap:8px;
  color: var(--teal-deep); font-weight:800; font-size:.9rem;
  position:relative;
}
.book-choice-cta svg { width:16px;height:16px; transition: transform .3s; }
[dir="rtl"] .book-choice-cta svg { transform: scaleX(-1); }
.book-choice-card:hover .book-choice-cta svg { transform: translateX(4px); }
[dir="rtl"] .book-choice-card:hover .book-choice-cta svg { transform: scaleX(-1) translateX(4px); }

/* ── Form step ─────────────────────────────────────────── */
.book-back {
  display:inline-flex; align-items:center; gap:8px;
  background:none; border:none; cursor:pointer;
  color: var(--muted); font-size:.88rem; font-weight:700;
  margin-bottom: 22px; padding:0; font-family:inherit;
  transition: color .3s;
  -webkit-appearance:none; appearance:none;
}
.book-back svg { width:16px;height:16px; }
[dir="rtl"] .book-back svg { transform: scaleX(-1); }
.book-back:hover { color: var(--teal); }

.book-page-card {
  max-width: 720px; margin:0 auto;
  background:#fff; border-radius:var(--r-lg); box-shadow:var(--shadow-lg);
  padding: 44px;
}
.book-page-card-head { margin-bottom:26px; padding-bottom:22px; border-bottom:1px solid var(--line); }
.book-page-card-head .bpc-icon {
  width:48px;height:48px; border-radius:12px;
  background:var(--teal-light); color:var(--teal);
  display:flex;align-items:center;justify-content:center;
  margin-bottom:16px;
}
.book-page-card-head .bpc-icon svg { width:24px;height:24px; }
.book-page-card-head h2 { font-size:1.3rem; color:var(--ink); margin-bottom:6px; }
.book-page-card-head p { color:var(--ink-soft); font-size:.9rem; margin:0; }

/* ── Price badge ───────────────────────────────────────── */
.book-price-badge {
  display:flex; align-items:center; gap:16px;
  background: linear-gradient(135deg, var(--teal-deep), var(--teal-darker));
  color:#fff;
  border-radius: var(--r-md);
  padding:18px 22px;
  margin-bottom: 26px;
}
.book-price-badge svg { width:30px;height:30px; flex-shrink:0; opacity:.9; }
.book-price-badge .bp-label { display:block; color:rgba(255,255,255,.75); font-size:.78rem; font-weight:700; margin-bottom:2px; }
.book-price-badge .bp-value { color:#fff; font-size:1.4rem; font-weight:900; font-family:var(--f-num); line-height:1.2; }
.book-price-badge .bp-note { display:block; color:rgba(255,255,255,.75); font-size:.76rem; margin-top:3px; }

.field-hint { font-size:.78rem; color:var(--muted); margin-top:2px; }

@media(max-width:900px){
  .book-choice-grid { grid-template-columns:1fr; max-width:520px; }
}
@media(max-width:600px){
  .book-page-card { padding:26px 20px; }
  .book-choice-card { padding:30px 24px; }
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
  </div>
</div>

<div class="book-flow">
  <div class="wrap">

    {{-- ══ STEP 0: choose location ══ --}}
    <div class="book-step active" data-step="choice">
      <div class="book-choice-grid">

        <button type="button" class="book-choice-card reveal" data-choose="domestic">
          <div class="book-choice-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h3>{{ app()->getLocale() === 'ar' ? 'داخل الأردن' : 'Inside Jordan' }}</h3>
          <p>{{ app()->getLocale() === 'ar' ? 'احجز موعدك في أحد فروعنا داخل المملكة بخطوات بسيطة وسريعة.' : 'Book your appointment at one of our branches inside the Kingdom in a few quick steps.' }}</p>
          <span class="book-choice-cta">
            {{ app()->getLocale() === 'ar' ? 'احجز الآن' : 'Book Now' }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </button>

        <button type="button" class="book-choice-card reveal" data-choose="international">
          <div class="book-choice-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>
          </div>
          <h3>{{ app()->getLocale() === 'ar' ? 'خارج الأردن' : 'Outside Jordan' }}</h3>
          <p>{{ app()->getLocale() === 'ar' ? 'احجز استشارتك عن بُعد وأرفق تقاريرك الطبية ليطّلع عليها فريقنا مسبقاً.' : 'Book your consultation remotely and attach your medical reports for our team to review in advance.' }}</p>
          <span class="book-choice-cta">
            {{ app()->getLocale() === 'ar' ? 'احجز الآن' : 'Book Now' }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </button>

      </div>
    </div>

    {{-- ══ STEP 1: domestic form ══ --}}
    <div class="book-step" data-step="domestic">
      <button type="button" class="book-back" data-back>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        {{ app()->getLocale() === 'ar' ? 'تغيير الخيار' : 'Change Option' }}
      </button>

      <div class="book-page-card">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <h2>{{ app()->getLocale() === 'ar' ? 'حجز موعد داخل الأردن' : 'Book an Appointment Inside Jordan' }}</h2>
          <p>{{ app()->getLocale() === 'ar' ? 'عبّي بياناتك وفريق المواعيد بيتواصل معك لتأكيد الحجز.' : 'Fill in your details and our appointments team will contact you to confirm the booking.' }}</p>
        </div>

        <form class="book-ajax-form" action="{{ route('appointments.store') }}" method="POST">
          @csrf
          <input type="hidden" name="booking_type" value="domestic">
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
    </div>

    {{-- ══ STEP 2: international form ══ --}}
    <div class="book-step" data-step="international">
      <button type="button" class="book-back" data-back>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        {{ app()->getLocale() === 'ar' ? 'تغيير الخيار' : 'Change Option' }}
      </button>

      <div class="book-page-card">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg></div>
          <h2>{{ app()->getLocale() === 'ar' ? 'حجز موعد من خارج الأردن' : 'Book an Appointment From Outside Jordan' }}</h2>
          <p>{{ app()->getLocale() === 'ar' ? 'عبّي بياناتك وأرفق تقاريرك الطبية وفريقنا بيتواصل معك لتأكيد الحجز.' : 'Fill in your details, attach your medical reports, and our team will contact you to confirm the booking.' }}</p>
        </div>

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

        <form class="book-ajax-form" action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="booking_type" value="international">
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
          <div class="field full" style="margin-bottom:18px">
            <label>{{ app()->getLocale() === 'ar' ? 'إرفاق الملفات المرضية' : 'Attach Medical Files' }}</label>
            <input type="file" name="attachment" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
            <span class="field-hint">{{ app()->getLocale() === 'ar' ? 'PDF أو صورة أو Word — بحد أقصى 10MB (اختياري)' : 'PDF, image, or Word file — max 10MB (optional)' }}</span>
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

@push('scripts')
<script>
(function () {
  const steps = document.querySelectorAll('.book-step');
  const flow  = document.querySelector('.book-flow');

  function showStep(name) {
    steps.forEach(s => s.classList.toggle('active', s.dataset.step === name));
    flow.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  document.querySelectorAll('[data-choose]').forEach(btn => {
    btn.addEventListener('click', () => showStep(btn.dataset.choose));
  });

  document.querySelectorAll('[data-back]').forEach(btn => {
    btn.addEventListener('click', () => showStep('choice'));
  });
})();
</script>
@endpush
