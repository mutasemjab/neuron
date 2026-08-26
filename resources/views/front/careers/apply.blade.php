@extends('layouts.front')
@section('title', $careerJob->title . ' — ' . sett('identity.site_name'))
@section('meta_description', $careerJob->description)

@push('styles')
<style>
/* Job application page — scoped to this page only via the .jap- prefix. */

.jap-page { padding: 150px 0 100px; }
.jap-wrap { max-width: 720px; margin: 0 auto; }

.jap-crumbs { color: var(--muted); font-size: .85rem; margin-bottom: 20px; }
.jap-crumbs a { color: var(--teal); text-decoration: none; }
.jap-crumbs span { margin: 0 6px; }

.jap-job-card {
  background: linear-gradient(135deg, var(--teal-deep), var(--teal-darker));
  color: #fff;
  border-radius: var(--r-lg);
  padding: 36px 40px;
  margin-bottom: 32px;
}
.jap-job-type {
  font-family: var(--f-num);
  font-size: .72rem;
  letter-spacing: .1em;
  color: #7fd8d3;
  text-transform: uppercase;
  font-weight: 600;
}
.jap-job-card h1 { font-size: 1.7rem; color: #fff; margin: 8px 0 12px; }
.jap-job-card p { color: rgba(255,255,255,.8); font-size: .95rem; line-height: 1.8; margin-bottom: 14px; }
.jap-job-loc { display: inline-flex; align-items: center; gap: 6px; color: rgba(255,255,255,.75); font-size: .85rem; }
.jap-job-loc svg { width: 15px; height: 15px; }

.jap-form-card {
  background: #fff;
  border: 1px solid var(--line);
  border-radius: var(--r-lg);
  box-shadow: var(--shadow-sm);
  padding: 40px;
}

.field-hint { font-size: .78rem; color: var(--muted); margin-top: 2px; display: block; }

@media(max-width:600px) {
  .jap-page { padding: 120px 0 70px; }
  .jap-job-card { padding: 26px 22px; }
  .jap-form-card { padding: 24px 20px; }
}
</style>
@endpush

@section('content')

<div class="jap-page">
  <div class="wrap">
    <div class="jap-wrap">

      <div class="jap-crumbs">
        <a href="{{ route('home') }}">{{ __('front.nav_home') }}</a>
        <span>/</span>
        <a href="{{ route('home') }}#careers">{{ __('front.nav_careers') }}</a>
      </div>

      <div class="jap-job-card">
        @if($careerJob->type)<span class="jap-job-type">{{ $careerJob->type }}</span>@endif
        <h1>{{ $careerJob->title }}</h1>
        <p>{{ $careerJob->description }}</p>
        @if($careerJob->location)
        <span class="jap-job-loc">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          {{ $careerJob->location }}
        </span>
        @endif
      </div>

      <div class="jap-form-card">
        <form class="book-ajax-form" action="{{ route('careers.apply.store', $careerJob) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="field"><label>{{ __('front.form_full_name') }} <span class="req">*</span></label><input type="text" name="name" required placeholder="{{ __('front.form_full_name_ph') }}"></div>
            <div class="field"><label>{{ __('front.form_phone') }} <span class="req">*</span></label><input type="tel" name="phone" required placeholder="{{ __('front.form_phone_ph') }}"></div>
          </div>
          <div class="field full" style="margin-bottom:18px">
            <label>{{ app()->getLocale() === 'ar' ? 'البريد الإلكتروني' : 'Email' }} <span class="req">*</span></label>
            <input type="email" name="email" dir="ltr" required placeholder="name@example.com">
          </div>
          <div class="field full" style="margin-bottom:18px">
            <label>{{ app()->getLocale() === 'ar' ? 'الفرع' : 'Branch' }} <span class="req">*</span></label>
            <select name="branch_id" required>
              <option value="">{{ app()->getLocale() === 'ar' ? 'اختر الفرع' : 'Select branch' }}</option>
              @foreach($branches as $branch)
              <option value="{{ $branch->id }}">{{ $branch->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="field full" style="margin-bottom:18px">
            <label>{{ app()->getLocale() === 'ar' ? 'السيرة الذاتية (CV)' : 'Resume (CV)' }}</label>
            <input type="file" name="cv" accept=".pdf,.doc,.docx">
            <span class="field-hint">{{ app()->getLocale() === 'ar' ? 'PDF أو Word — بحد أقصى 10MB (اختياري)' : 'PDF or Word — max 10MB (optional)' }}</span>
          </div>
          <div class="field full" style="margin-bottom:18px">
            <label>{{ app()->getLocale() === 'ar' ? 'رسالة تعريفية' : 'Cover Message' }}</label>
            <textarea name="message" placeholder="{{ app()->getLocale() === 'ar' ? 'اكتب نبذة عن خبرتك...' : 'Tell us about your experience...' }}"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-lg"><span>{{ app()->getLocale() === 'ar' ? 'إرسال الطلب' : 'Submit Application' }}</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </form>

        <div class="form-success">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3>{{ app()->getLocale() === 'ar' ? 'تم استلام طلبك بنجاح' : 'Your Application Has Been Received' }}</h3>
          <p>{{ app()->getLocale() === 'ar' ? 'سيراجع فريق التوظيف طلبك وسيتواصل معك في حال وجود تطابق مع المتطلبات.' : 'Our recruitment team will review your application and reach out if there is a match.' }}</p>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
