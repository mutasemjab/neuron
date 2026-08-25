<?php $__env->startSection('title', sett('booking_page.heading') . ' | ' . sett('identity.site_name')); ?>
<?php $__env->startSection('meta_description', sett('booking_page.subtext')); ?>

<?php $isAr = app()->getLocale() === 'ar'; ?>

<?php $__env->startPush('styles'); ?>
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

.field-hint { font-size:.78rem; color:var(--muted); margin-top:2px; display:block; }
.field-hint a { color: var(--teal); font-weight:700; }

/* ── Phone with country-code select ───────────────────── */
.phone-group { display:flex; gap:8px; }
.phone-group select { flex: 0 0 128px; }
.phone-group input { flex:1; min-width:0; }

/* ── Pill radio group (payment method / visited before) ─ */
.pill-radio-group { display:flex; flex-wrap:wrap; gap:10px; }
.pill-radio { position:relative; }
.pill-radio input { position:absolute; opacity:0; width:0; height:0; }
.pill-radio label {
  display:inline-flex; align-items:center; gap:8px;
  padding:11px 22px;
  border:1.5px solid var(--line-2);
  border-radius:999px;
  font-size:.9rem; font-weight:600; color:var(--ink-soft);
  cursor:pointer;
  transition: all .25s;
}
.pill-radio input:checked + label {
  border-color: var(--teal);
  background: var(--teal-light);
  color: var(--teal-deep);
}
.pill-radio label:hover { border-color: var(--teal); }

/* ── Chip checkbox group (days / periods) ───────────────── */
.chip-checkbox-group { display:flex; flex-wrap:wrap; gap:10px; }
.chip-checkbox { position:relative; }
.chip-checkbox input { position:absolute; opacity:0; width:0; height:0; }
.chip-checkbox label {
  display:inline-flex; align-items:center; gap:8px;
  padding:10px 18px;
  border:1.5px solid var(--line-2);
  border-radius:10px;
  font-size:.87rem; font-weight:600; color:var(--ink-soft);
  cursor:pointer;
  transition: all .25s;
}
.chip-checkbox label::before {
  content:"";
  width:16px; height:16px;
  border-radius:5px;
  border:1.5px solid var(--line-2);
  flex-shrink:0;
  transition: all .2s;
}
.chip-checkbox input:checked + label {
  border-color: var(--teal);
  background: var(--teal-light);
  color: var(--teal-deep);
}
.chip-checkbox input:checked + label::before {
  background: var(--teal);
  border-color: var(--teal);
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
  background-size: 11px; background-repeat:no-repeat; background-position:center;
}

/* ── Privacy consent ─────────────────────────────────────── */
.consent-check { display:flex; align-items:flex-start; gap:10px; }
.consent-check input { width:18px; height:18px; margin-top:2px; flex-shrink:0; cursor:pointer; }
.consent-check label { font-size:.88rem; color:var(--ink-soft); line-height:1.6; cursor:pointer; }
.consent-check a { color: var(--teal); font-weight:700; }

/* ── Multi-file upload ───────────────────────────────────── */
.file-list { display:flex; flex-direction:column; gap:6px; margin-top:10px; }
.file-list-item {
  display:flex; align-items:center; justify-content:space-between;
  background: var(--paper-2); border-radius:8px; padding:8px 12px;
  font-size:.82rem; color:var(--ink-soft);
}
.file-list-item button {
  background:none; border:none; color:#dc2626; cursor:pointer; font-size:.85rem;
  padding:0; display:flex; align-items:center;
}

/* ── Custom calendar ─────────────────────────────────────── */
.cal-wrap { position:relative; }
.cal-trigger {
  width:100%; display:flex; align-items:center; gap:10px;
  padding:14px 16px;
  border:1.5px solid var(--line-2); border-radius:12px;
  background: var(--paper-2); color:var(--ink);
  font-family:inherit; font-size:.95rem; text-align:start;
  cursor:pointer; -webkit-appearance:none; appearance:none;
  transition: all .3s;
}
.cal-trigger.has-value { color: var(--ink); font-weight:600; }
.cal-trigger:not(.has-value) { color: #9ca3af; }
.cal-trigger svg { width:19px;height:19px; color:var(--teal); flex-shrink:0; }
.cal-trigger:focus { outline:none; border-color:var(--teal); background:#fff; box-shadow:0 0 0 4px rgba(42,128,125,.08); }

.cal-pop {
  display:none;
  position:absolute; z-index:20; top:calc(100% + 8px); inset-inline-start:0;
  width:320px; max-width:90vw;
  background:#fff; border-radius:16px; box-shadow:var(--shadow-lg); border:1px solid var(--line);
  padding:18px;
}
.cal-pop.show { display:block; animation: bookStepIn .25s ease; }

.cal-pop-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; }
.cal-pop-month { font-weight:800; color:var(--ink); font-size:.98rem; }
.cal-nav {
  width:32px; height:32px; border-radius:8px;
  background: var(--paper-2); border:none; cursor:pointer;
  display:flex; align-items:center; justify-content:center;
  color: var(--teal); transition: background .2s;
}
.cal-nav:hover { background: var(--teal-light); }
.cal-nav:disabled { opacity:.3; cursor:not-allowed; background:var(--paper-2); }
.cal-nav svg { width:16px;height:16px; }

.cal-weekdays, .cal-days-grid {
  display:grid; grid-template-columns:repeat(7,1fr); gap:4px;
}
.cal-weekdays span { text-align:center; font-size:.72rem; font-weight:700; color:var(--muted); padding:4px 0; }

.cal-day {
  aspect-ratio:1; display:flex; align-items:center; justify-content:center;
  border-radius:8px; border:none; background:none;
  font-size:.85rem; font-family:inherit; color:var(--ink);
  cursor:pointer; transition: all .2s;
}
.cal-day:hover:not(.cal-day--disabled):not(.cal-day--empty) { background: var(--teal-light); color:var(--teal-deep); }
.cal-day--empty { visibility:hidden; cursor:default; }
.cal-day--disabled { color:#c9d2d0; text-decoration:line-through; cursor:not-allowed; }
.cal-day--selected { background:var(--teal) !important; color:#fff !important; font-weight:800; }

.cal-legend { display:flex; gap:14px; margin-top:14px; padding-top:12px; border-top:1px solid var(--line); font-size:.74rem; color:var(--muted); }
.cal-legend span { display:inline-flex; align-items:center; gap:6px; }
.cal-legend i { width:10px; height:10px; border-radius:3px; display:inline-block; }
.cal-legend i.dot-disabled { background:#e5e9e8; }
.cal-legend i.dot-selected { background:var(--teal); }

@media(max-width:900px){
  .book-choice-grid { grid-template-columns:1fr; max-width:520px; }
}
@media(max-width:600px){
  .book-page-card { padding:26px 20px; }
  .book-choice-card { padding:30px 24px; }
  .phone-group { flex-direction:column; }
  .phone-group select { flex-basis:auto; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="page-head">
  <div class="wrap">
    <span class="eyebrow"><?php echo e(sett('booking_page.eyebrow')); ?></span>
    <h1><?php echo e(sett('booking_page.heading')); ?></h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0"><?php echo e(sett('booking_page.subtext')); ?></p>
    <div class="crumbs"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('front.nav_home')); ?></a> / <?php echo e(sett('booking_page.heading')); ?></div>
  </div>
</div>

<div class="book-flow">
  <div class="wrap">

    
    <div class="book-step active" data-step="choice">
      <div class="book-choice-grid">

        <button type="button" class="book-choice-card reveal" data-choose="domestic">
          <div class="book-choice-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <h3><?php echo e($isAr ? 'داخل الأردن' : 'Inside Jordan'); ?></h3>
          <p><?php echo e($isAr ? 'احجز موعدك في أحد فروعنا داخل المملكة بخطوات بسيطة وسريعة.' : 'Book your appointment at one of our branches inside the Kingdom in a few quick steps.'); ?></p>
          <span class="book-choice-cta">
            <?php echo e($isAr ? 'احجز الآن' : 'Book Now'); ?>

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </button>

        <button type="button" class="book-choice-card reveal" data-choose="international">
          <div class="book-choice-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>
          </div>
          <h3><?php echo e($isAr ? 'خارج الأردن' : 'Outside Jordan'); ?></h3>
          <p><?php echo e($isAr ? 'احجز استشارتك الأونلاين وأرفق تقاريرك الطبية ليطّلع عليها فريقنا مسبقاً.' : 'Book an online consultation and attach your medical reports for our team to review in advance.'); ?></p>
          <span class="book-choice-cta">
            <?php echo e($isAr ? 'احجز الآن' : 'Book Now'); ?>

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </span>
        </button>

      </div>
    </div>

    
    <div class="book-step" data-step="domestic">
      <button type="button" class="book-back" data-back>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        <?php echo e($isAr ? 'تغيير الخيار' : 'Change Option'); ?>

      </button>

      <div class="book-page-card">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
          <h2><?php echo e($isAr ? 'حجز موعد داخل الأردن' : 'Book an Appointment Inside Jordan'); ?></h2>
          <p><?php echo e($isAr ? 'أدخل بياناتك، وسيتواصل معك فريقنا لتأكيد الموعد واستكمال التفاصيل.' : 'Enter your details, and our team will contact you to confirm the appointment and complete the details.'); ?></p>
        </div>

        <form class="book-ajax-form" action="<?php echo e(route('appointments.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>

          <div class="form-row">
            <div class="field"><label><?php echo e($isAr ? 'الاسم الكامل' : 'Full Name'); ?> <span class="req">*</span></label><input type="text" name="name" required></div>
            <div class="field">
              <label><?php echo e($isAr ? 'رقم الهاتف' : 'Phone Number'); ?> <span class="req">*</span></label>
              <div class="phone-group">
                <select name="phone_country_code" required>
                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($country['dial']); ?>" <?php if($country['iso']==='JO'): echo 'selected'; endif; ?>><?php echo e($country['dial']); ?> <?php echo e($isAr ? $country['name_ar'] : $country['name_en']); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="tel" name="phone" dir="ltr" required placeholder="7XXXXXXXX">
              </div>
              <span class="field-hint"><?php echo e($isAr ? 'الرقم الأردني يبدأ بـ 077 / 078 / 079 ويتكوّن من 10 أرقام. الأرقام غير الأردنية تُقبل حسب مفتاح الدولة.' : 'Jordanian numbers start with 077/078/079 and are 10 digits. Other numbers are accepted based on the selected country code.'); ?></span>
            </div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'البريد الإلكتروني' : 'Email'); ?></label>
            <input type="email" name="email" dir="ltr">
            <span class="field-hint"><?php echo e($isAr ? 'اختياري' : 'Optional'); ?></span>
          </div>

          <div class="form-row">
            <div class="field"><label><?php echo e($isAr ? 'الفرع' : 'Branch'); ?> <span class="req">*</span></label>
              <select name="branch_id" required>
                <option value=""><?php echo e($isAr ? 'اختر الفرع' : 'Select branch'); ?></option>
                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="field">
              <label><?php echo e($isAr ? 'التاريخ المفضل' : 'Preferred Date'); ?> <span class="req">*</span></label>
              <div class="cal-wrap" id="calWrap">
                <button type="button" class="cal-trigger" id="calTrigger">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                  <span id="calTriggerLabel"><?php echo e($isAr ? 'اختر التاريخ' : 'Choose a date'); ?></span>
                </button>
                <input type="hidden" name="preferred_date" id="calValue" required>
                <div class="cal-pop" id="calPop">
                  <div class="cal-pop-head">
                    <button type="button" class="cal-nav" id="calPrevBtn" aria-label="prev">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <span class="cal-pop-month" id="calMonthLabel"></span>
                    <button type="button" class="cal-nav" id="calNextBtn" aria-label="next">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                  </div>
                  <div class="cal-weekdays" id="calWeekdays"></div>
                  <div class="cal-days-grid" id="calDaysGrid"></div>
                  <div class="cal-legend">
                    <span><i class="dot-disabled"></i><?php echo e($isAr ? 'غير متاح' : 'Unavailable'); ?></span>
                    <span><i class="dot-selected"></i><?php echo e($isAr ? 'المختار' : 'Selected'); ?></span>
                  </div>
                </div>
              </div>
              <span class="field-hint"><?php echo e($isAr ? 'الحجز متاح من السبت للخميس. الجمعة والعطل الرسمية مغلقة.' : 'Booking available Saturday–Thursday. Fridays and public holidays are closed.'); ?></span>
            </div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'الوقت المفضل' : 'Preferred Time'); ?> <span class="req">*</span></label>
            <select name="preferred_time_slot" required>
              <option value=""><?php echo e($isAr ? 'اختر الوقت' : 'Select time'); ?></option>
              <option value="<?php echo e($isAr ? 'صباحًا (9 ص – 12 م)' : 'Morning (9am – 12pm)'); ?>"><?php echo e($isAr ? 'صباحًا (9 ص – 12 م)' : 'Morning (9am – 12pm)'); ?></option>
              <option value="<?php echo e($isAr ? 'ظهرًا (12 م – 2 م)' : 'Noon (12pm – 2pm)'); ?>"><?php echo e($isAr ? 'ظهرًا (12 م – 2 م)' : 'Noon (12pm – 2pm)'); ?></option>
              <option value="<?php echo e($isAr ? 'بعد الظهر (2 م – 4 م)' : 'Afternoon (2pm – 4pm)'); ?>"><?php echo e($isAr ? 'بعد الظهر (2 م – 4 م)' : 'Afternoon (2pm – 4pm)'); ?></option>
            </select>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'طريقة الدفع' : 'Payment Method'); ?> <span class="req">*</span></label>
            <div class="pill-radio-group">
              <div class="pill-radio">
                <input type="radio" name="payment_method" value="insurance" id="pay_insurance" required>
                <label for="pay_insurance"><?php echo e($isAr ? 'تأمين' : 'Insurance'); ?></label>
              </div>
              <div class="pill-radio">
                <input type="radio" name="payment_method" value="cash" id="pay_cash" required>
                <label for="pay_cash"><?php echo e($isAr ? 'نقدي' : 'Cash'); ?></label>
              </div>
            </div>
            <span class="field-hint"><a href="<?php echo e(route('home')); ?>#insurance"><?php echo e($isAr ? 'تعرّف على شركات التأمين المعتمدة لدينا' : 'View our approved insurance companies'); ?></a></span>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'هل سبق لك زيارة عيادات نيورون؟' : 'Have you visited Neuron Clinics before?'); ?> <span class="req">*</span></label>
            <div class="pill-radio-group">
              <div class="pill-radio">
                <input type="radio" name="visited_before" value="1" id="visited_yes" required>
                <label for="visited_yes"><?php echo e($isAr ? 'نعم' : 'Yes'); ?></label>
              </div>
              <div class="pill-radio">
                <input type="radio" name="visited_before" value="0" id="visited_no" required>
                <label for="visited_no"><?php echo e($isAr ? 'لا' : 'No'); ?></label>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-lg"><span><?php echo e($isAr ? 'إرسال طلب الحجز' : 'Send Booking Request'); ?></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
          <p class="field-hint" style="margin-top:12px;text-align:center"><?php echo e($isAr ? 'إرسال الطلب لا يعني تأكيد الموعد. سيتواصل معك فريقنا لتأكيد الموعد واستكمال التفاصيل.' : 'Submitting this request does not confirm the appointment. Our team will contact you to confirm and complete the details.'); ?></p>
        </form>

        <div class="form-success">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3><?php echo e($isAr ? 'تم استلام طلبك بنجاح ✓' : 'Your Request Has Been Received ✓'); ?></h3>
          <p><?php echo e($isAr ? 'شكرًا لتواصلك مع عيادات نيورون. سيتواصل معك فريقنا لتأكيد الموعد واستكمال التفاصيل.' : 'Thank you for contacting Neuron Clinics. Our team will contact you to confirm the appointment and complete the details.'); ?></p>
        </div>
      </div>
    </div>

    
    <div class="book-step" data-step="international">
      <button type="button" class="book-back" data-back>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
        <?php echo e($isAr ? 'تغيير الخيار' : 'Change Option'); ?>

      </button>

      <div class="book-page-card">
        <div class="book-page-card-head">
          <div class="bpc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg></div>
          <h2><?php echo e($isAr ? 'استشارة أونلاين للمرضى من خارج الأردن' : 'Online Consultation for Patients Outside Jordan'); ?></h2>
          <p><?php echo e($isAr ? 'أدخل بياناتك وأرفق التقارير والصور الطبية المتوفرة، وسيتواصل معك فريق عيادات نيورون عبر البريد الإلكتروني لاستكمال التفاصيل وتنسيق موعد الاستشارة الأونلاين.' : 'Submit your information and any available medical reports and imaging. The Neuron Clinics team will contact you by email to complete the necessary details and arrange your online consultation.'); ?></p>
        </div>

        <form class="book-ajax-form" action="<?php echo e(route('consultations.store')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <div class="form-row">
            <div class="field"><label><?php echo e($isAr ? 'الاسم الكامل' : 'Full Name'); ?> <span class="req">*</span></label><input type="text" name="name" required></div>
            <div class="field"><label><?php echo e($isAr ? 'البريد الإلكتروني' : 'Email Address'); ?> <span class="req">*</span></label><input type="email" name="email" dir="ltr" required></div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'رقم الهاتف / واتساب' : 'Phone / WhatsApp Number'); ?> <span class="req">*</span></label>
            <div class="phone-group">
              <select name="phone_country_code" required>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country['dial']); ?>" <?php if($country['iso']==='JO'): echo 'selected'; endif; ?>><?php echo e($country['dial']); ?> <?php echo e($isAr ? $country['name_ar'] : $country['name_en']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <input type="tel" name="phone" dir="ltr" required>
            </div>
          </div>

          <div class="form-row">
            <div class="field">
              <label><?php echo e($isAr ? 'بلد الإقامة' : 'Country of Residence'); ?> <span class="req">*</span></label>
              <select name="country_of_residence" required>
                <option value=""><?php echo e($isAr ? 'اختر الدولة' : 'Select country'); ?></option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country['name_en']); ?>" <?php if($country['iso']==='JO'): echo 'selected'; endif; ?>><?php echo e($isAr ? $country['name_ar'] : $country['name_en']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="field">
              <label><?php echo e($isAr ? 'تاريخ الميلاد' : 'Date of Birth'); ?> <span class="req">*</span></label>
              <input type="date" name="date_of_birth" max="<?php echo e(now()->subDay()->toDateString()); ?>" required>
            </div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'الأيام المناسبة للاستشارة' : 'Preferred Consultation Days'); ?> <span class="req">*</span></label>
            <div class="chip-checkbox-group">
              <?php $days = ['sunday'=>['ar'=>'الأحد','en'=>'Sunday'],'monday'=>['ar'=>'الاثنين','en'=>'Monday'],'tuesday'=>['ar'=>'الثلاثاء','en'=>'Tuesday'],'thursday'=>['ar'=>'الخميس','en'=>'Thursday']]; ?>
              <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="chip-checkbox">
                <input type="checkbox" name="preferred_days[]" value="<?php echo e($key); ?>" id="day_<?php echo e($key); ?>">
                <label for="day_<?php echo e($key); ?>"><?php echo e($isAr ? $label['ar'] : $label['en']); ?></label>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'الفترة المناسبة للاستشارة' : 'Preferred Consultation Time'); ?> <span class="req">*</span></label>
            <div class="chip-checkbox-group">
              <?php $periods = ['morning'=>['ar'=>'صباحًا','en'=>'Morning'],'afternoon'=>['ar'=>'ظهرًا','en'=>'Afternoon']]; ?>
              <?php $__currentLoopData = $periods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="chip-checkbox">
                <input type="checkbox" name="preferred_periods[]" value="<?php echo e($key); ?>" id="period_<?php echo e($key); ?>">
                <label for="period_<?php echo e($key); ?>"><?php echo e($isAr ? $label['ar'] : $label['en']); ?></label>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <span class="field-hint"><?php echo e($isAr ? 'يرجى اختيار الفترة الأنسب لك حسب التوقيت المحلي في بلد إقامتك. سيتم تنسيق الموعد النهائي وتأكيده عبر البريد الإلكتروني وفق المواعيد المتاحة.' : 'Please select the time period that suits you based on your local time zone. The final consultation date and time will be arranged and confirmed by email based on availability.'); ?></span>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'وصف الحالة / الاستفسار الطبي' : 'Medical Condition / Inquiry'); ?> <span class="req">*</span></label>
            <textarea name="condition_description" required placeholder="<?php echo e($isAr ? 'يرجى وصف الحالة والأعراض وأي معلومات طبية ذات صلة.' : 'Please describe your condition, symptoms, and any relevant medical information.'); ?>"></textarea>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <label><?php echo e($isAr ? 'التقارير والصور الطبية' : 'Medical Reports & Imaging'); ?></label>
            <input type="file" name="attachments[]" id="consultFiles" accept=".pdf,.jpg,.jpeg,.png" multiple>
            <span class="field-hint"><?php echo e($isAr ? 'يمكنك إرفاق التقارير الطبية، نتائج الفحوصات وصور الأشعة المتوفرة لمساعدة الطبيب في مراجعة حالتك. الصيغ المدعومة: PDF – JPG – JPEG – PNG، حتى 5 ملفات وبحد أقصى 10MB لكل ملف.' : 'You may upload available medical reports, test results, and imaging to assist the physician in reviewing your case. Supported formats: PDF – JPG – JPEG – PNG, up to 5 files, 10MB max per file.'); ?></span>
            <div class="file-list" id="consultFileList"></div>
          </div>

          <div class="field full" style="margin-bottom:18px">
            <div class="consent-check">
              <input type="checkbox" name="privacy_consent" value="1" id="privacyConsent" required>
              <label for="privacyConsent"><?php echo e($isAr ? 'أوافق على' : 'I agree to the'); ?> <a href="<?php echo e(route('privacy.policy')); ?>" target="_blank"><?php echo e($isAr ? 'سياسة الخصوصية' : 'Privacy Policy'); ?></a> <?php echo e($isAr ? 'ومعالجة بياناتي الطبية لغرض تقديم خدمة الاستشارة.' : 'and the processing of my medical information for the purpose of providing the consultation service.'); ?> <span class="req">*</span></label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-lg"><span><?php echo e($isAr ? 'إرسال طلب الاستشارة' : 'Submit Consultation Request'); ?></span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </form>

        <div class="form-success">
          <div class="check"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6 9 17l-5-5"/></svg></div>
          <h3><?php echo e($isAr ? 'تم استلام طلب الاستشارة بنجاح' : 'Your Consultation Request Has Been Received'); ?></h3>
          <p><?php echo e($isAr ? 'شكرًا لتواصلك مع عيادات نيورون. سيتواصل معك فريقنا عبر البريد الإلكتروني لاستكمال التفاصيل وتزويدك بالمواعيد المتاحة للاستشارة.' : 'Thank you for contacting Neuron Clinics. Our team will contact you by email to complete the necessary details and provide you with the available consultation times.'); ?></p>
        </div>
      </div>
    </div>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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

/* ============ CUSTOM CALENDAR (preferred_date) ============ */
(function () {
  const trigger    = document.getElementById('calTrigger');
  const triggerLbl = document.getElementById('calTriggerLabel');
  const pop        = document.getElementById('calPop');
  const valueInput = document.getElementById('calValue');
  const monthLabel = document.getElementById('calMonthLabel');
  const weekdaysEl = document.getElementById('calWeekdays');
  const daysGrid   = document.getElementById('calDaysGrid');
  const prevBtn    = document.getElementById('calPrevBtn');
  const nextBtn    = document.getElementById('calNextBtn');
  if (!trigger || !pop) return;

  const isAr = <?php echo json_encode($isAr, 15, 512) ?>;
  const closedSet = new Set(<?php echo json_encode($closedDates, 15, 512) ?>);
  const weekdayLabels = isAr ? ['س','ح','ن','ث','ر','خ','ج'] : ['Sat','Sun','Mon','Tue','Wed','Thu','Fri'];

  const today = new Date();
  today.setHours(0, 0, 0, 0);

  let viewDate = new Date(today.getFullYear(), today.getMonth(), 1);
  let selected = null;

  function ymd(date) {
    return date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
  }

  function isDisabled(date) {
    if (date < today) return true;
    if (date.getDay() === 5) return true; // Friday
    if (closedSet.has(ymd(date))) return true;
    return false;
  }

  weekdayLabels.forEach(w => {
    const span = document.createElement('span');
    span.textContent = w;
    weekdaysEl.appendChild(span);
  });

  function render() {
    daysGrid.innerHTML = '';
    monthLabel.textContent = viewDate.toLocaleDateString(isAr ? 'ar-JO' : 'en-US', { month: 'long', year: 'numeric' });

    const year = viewDate.getFullYear();
    const month = viewDate.getMonth();
    const firstOfMonth = new Date(year, month, 1);
    const startOffset = (firstOfMonth.getDay() + 1) % 7; // Saturday-first grid
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    for (let i = 0; i < startOffset; i++) {
      const empty = document.createElement('span');
      empty.className = 'cal-day cal-day--empty';
      daysGrid.appendChild(empty);
    }

    for (let d = 1; d <= daysInMonth; d++) {
      const date = new Date(year, month, d);
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'cal-day';
      btn.textContent = d;

      if (isDisabled(date)) {
        btn.classList.add('cal-day--disabled');
        btn.disabled = true;
      } else {
        btn.addEventListener('click', () => selectDate(date));
      }
      if (selected && ymd(date) === selected) {
        btn.classList.add('cal-day--selected');
      }
      daysGrid.appendChild(btn);
    }

    prevBtn.disabled = (year === today.getFullYear() && month === today.getMonth());
  }

  function selectDate(date) {
    selected = ymd(date);
    valueInput.value = selected;
    triggerLbl.textContent = date.toLocaleDateString(isAr ? 'ar-JO' : 'en-US', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
    trigger.classList.add('has-value');
    pop.classList.remove('show');
    render();
  }

  prevBtn.addEventListener('click', () => {
    viewDate = new Date(viewDate.getFullYear(), viewDate.getMonth() - 1, 1);
    render();
  });
  nextBtn.addEventListener('click', () => {
    viewDate = new Date(viewDate.getFullYear(), viewDate.getMonth() + 1, 1);
    render();
  });

  trigger.addEventListener('click', (e) => {
    e.stopPropagation();
    pop.classList.toggle('show');
  });
  document.addEventListener('click', (e) => {
    if (!pop.contains(e.target) && e.target !== trigger) pop.classList.remove('show');
  });

  render();
})();

/* ============ MULTI FILE UPLOAD LIST (consultation attachments) ============ */
(function () {
  const input = document.getElementById('consultFiles');
  const list  = document.getElementById('consultFileList');
  if (!input || !list) return;

  input.addEventListener('change', () => {
    list.innerHTML = '';
    Array.from(input.files).forEach(file => {
      const row = document.createElement('div');
      row.className = 'file-list-item';
      const sizeKb = Math.round(file.size / 1024);
      row.innerHTML = '<span>' + file.name + ' (' + sizeKb + 'KB)</span>';
      list.appendChild(row);
    });
  });
})();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nuron\resources\views\front\booking.blade.php ENDPATH**/ ?>