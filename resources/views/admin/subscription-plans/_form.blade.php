@php $p = $subscriptionPlan ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات باقة الاشتراك</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">عنوان الباقة (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $p->title_ar ?? '') }}" required placeholder="مثال: الباقة الذهبية">
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Plan Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $p->title_en ?? '') }}" required placeholder="e.g. Gold Plan">
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">وصف مختصر (عربي)</label>
                <input type="text" name="subtitle_ar" class="form-control" value="{{ old('subtitle_ar', $p->subtitle_ar ?? '') }}" placeholder="جملة قصيرة تحت العنوان">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Short Description (English)</label>
                <input type="text" name="subtitle_en" dir="ltr" class="form-control" value="{{ old('subtitle_en', $p->subtitle_en ?? '') }}">
            </div>

            <div class="col-12 col-md-4">
                <label class="form-label">السعر <span class="text-danger">*</span></label>
                <input type="number" step="0.01" min="0" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $p->price ?? '') }}" required>
                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">وصف السعر (عربي)</label>
                <input type="text" name="price_suffix_ar" class="form-control" value="{{ old('price_suffix_ar', $p->price_suffix_ar ?? '') }}" placeholder="مثال: دينار / شهرياً">
            </div>
            <div class="col-12 col-md-4">
                <label class="form-label">Price Suffix (English)</label>
                <input type="text" name="price_suffix_en" dir="ltr" class="form-control" value="{{ old('price_suffix_en', $p->price_suffix_en ?? '') }}" placeholder="e.g. JOD / month">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">المزايا (عربي)</label>
                <textarea name="features_ar" rows="5" class="form-control" placeholder="سطر لكل ميزة">{{ old('features_ar', $p->features_ar ?? '') }}</textarea>
                <small class="text-muted">اكتب كل ميزة في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Features (English)</label>
                <textarea name="features_en" dir="ltr" rows="5" class="form-control" placeholder="One per line">{{ old('features_en', $p->features_en ?? '') }}</textarea>
                <small class="text-muted">One feature per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">شارة الباقة (عربي)</label>
                <input type="text" name="badge_ar" class="form-control" value="{{ old('badge_ar', $p->badge_ar ?? '') }}" placeholder="مثال: الأكثر طلباً">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Badge (English)</label>
                <input type="text" name="badge_en" dir="ltr" class="form-control" value="{{ old('badge_en', $p->badge_en ?? '') }}" placeholder="e.g. Most Popular">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نص زر الاشتراك (عربي)</label>
                <input type="text" name="button_text_ar" class="form-control" value="{{ old('button_text_ar', $p->button_text_ar ?? '') }}" placeholder="مثال: اشترك الآن">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Button Text (English)</label>
                <input type="text" name="button_text_en" dir="ltr" class="form-control" value="{{ old('button_text_en', $p->button_text_en ?? '') }}" placeholder="e.g. Subscribe Now">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $p->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" @checked(old('is_featured', $p->is_featured ?? false))>
                    <label class="form-check-label" for="is_featured">باقة مميزة (تُبرز في الواجهة)</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $p->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
