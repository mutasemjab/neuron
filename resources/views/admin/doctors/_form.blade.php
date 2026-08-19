@php $d = $doctor ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الطبيب</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $d->name_ar ?? '') }}" required>
                @error('name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" dir="ltr" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $d->name_en ?? '') }}" required>
                @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">التخصص (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="specialization_ar" class="form-control @error('specialization_ar') is-invalid @enderror" value="{{ old('specialization_ar', $d->specialization_ar ?? '') }}" required placeholder="مثال: جراحة العمود الفقري">
                @error('specialization_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Specialization (English) <span class="text-danger">*</span></label>
                <input type="text" name="specialization_en" dir="ltr" class="form-control @error('specialization_en') is-invalid @enderror" value="{{ old('specialization_en', $d->specialization_en ?? '') }}" required>
                @error('specialization_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">المسمى الوظيفي (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar', $d->title_ar ?? '') }}" required placeholder="مثال: استشاري جراحة العمود الفقري">
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Job Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $d->title_en ?? '') }}" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">نبذة (عربي)</label>
                <textarea name="bio_ar" rows="3" class="form-control">{{ old('bio_ar', $d->bio_ar ?? '') }}</textarea>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Bio (English)</label>
                <textarea name="bio_en" dir="ltr" rows="3" class="form-control">{{ old('bio_en', $d->bio_en ?? '') }}</textarea>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الشهادات والخبرات (عربي)</label>
                <textarea name="certifications_ar" rows="3" class="form-control" placeholder="سطر لكل شهادة">{{ old('certifications_ar', $d->certifications_ar ?? '') }}</textarea>
                <small class="text-muted">اكتب كل شهادة في سطر منفصل</small>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Certifications (English)</label>
                <textarea name="certifications_en" dir="ltr" rows="3" class="form-control" placeholder="One per line">{{ old('certifications_en', $d->certifications_en ?? '') }}</textarea>
                <small class="text-muted">One certification per line</small>
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوسوم / التخصصات الدقيقة (عربي)</label>
                <input type="text" name="tags_ar" class="form-control" value="{{ old('tags_ar', $d->tags_ar ?? '') }}" placeholder="مفصولة بفواصل: الديسك، المنظار">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Tags (English)</label>
                <input type="text" name="tags_en" dir="ltr" class="form-control" value="{{ old('tags_en', $d->tags_en ?? '') }}" placeholder="Comma separated">
            </div>

            <div class="col-12">
                <label class="form-label">صورة الطبيب</label>
                @if($d && $d->image)
                    <div class="mb-2"><img src="{{ $d->image_url }}" style="height:80px;width:80px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0"></div>
                @endif
                <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $d->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $d->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- ── Publications ─────────────────────────────────────────────────── --}}
<div class="panel-card mt-3">
    <div class="panel-card-header d-flex align-items-center justify-content-between">
        <h2 class="panel-card-title mb-0">الأبحاث والمنشورات العلمية</h2>
        <button type="button" class="btn-primary-sm" id="addPubBtn">
            <i class="bi bi-plus-lg"></i> إضافة بحث
        </button>
    </div>
    <div class="panel-card-body">

        <div id="pubList">
            @php
                $pubs = old('publications', $d?->publications?->toArray() ?? []);
            @endphp

            @forelse($pubs as $i => $pub)
            <div class="pub-row border rounded p-3 mb-3 position-relative">
                <button type="button" class="btn-danger-sm pub-remove position-absolute" style="top:10px;inset-inline-end:10px" title="حذف">
                    <i class="bi bi-trash"></i>
                </button>
                <div class="row g-2">
                    <div class="col-12 col-md-6">
                        <label class="form-label">عنوان البحث (عربي) <span class="text-danger">*</span></label>
                        <input type="text" name="publications[{{ $i }}][title_ar]" class="form-control" value="{{ $pub['title_ar'] ?? '' }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Research Title (English)</label>
                        <input type="text" name="publications[{{ $i }}][title_en]" dir="ltr" class="form-control" value="{{ $pub['title_en'] ?? '' }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label">سنة النشر</label>
                        <input type="number" name="publications[{{ $i }}][year]" class="form-control" value="{{ $pub['year'] ?? '' }}" min="1900" max="2100" placeholder="{{ date('Y') }}">
                    </div>
                    <div class="col-12 col-md-9">
                        <label class="form-label">رابط البحث (URL)</label>
                        <input type="url" name="publications[{{ $i }}][url]" dir="ltr" class="form-control" value="{{ $pub['url'] ?? '' }}" placeholder="https://...">
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted text-center py-3" id="pubEmpty">لا توجد أبحاث مضافة بعد.</p>
            @endforelse
        </div>

    </div>
</div>

<div class="mt-3">
    <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
</div>

{{-- Template row (hidden) --}}
<template id="pubTemplate">
    <div class="pub-row border rounded p-3 mb-3 position-relative">
        <button type="button" class="btn-danger-sm pub-remove position-absolute" style="top:10px;inset-inline-end:10px" title="حذف">
            <i class="bi bi-trash"></i>
        </button>
        <div class="row g-2">
            <div class="col-12 col-md-6">
                <label class="form-label">عنوان البحث (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="publications[__IDX__][title_ar]" class="form-control" required>
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Research Title (English)</label>
                <input type="text" name="publications[__IDX__][title_en]" dir="ltr" class="form-control">
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label">سنة النشر</label>
                <input type="number" name="publications[__IDX__][year]" class="form-control" min="1900" max="2100" placeholder="{{ date('Y') }}">
            </div>
            <div class="col-12 col-md-9">
                <label class="form-label">رابط البحث (URL)</label>
                <input type="url" name="publications[__IDX__][url]" dir="ltr" class="form-control" placeholder="https://...">
            </div>
        </div>
    </div>
</template>

@push('scripts')
<script>
(function () {
    const list    = document.getElementById('pubList');
    const empty   = document.getElementById('pubEmpty');
    const addBtn  = document.getElementById('addPubBtn');
    const tmpl    = document.getElementById('pubTemplate');
    let idx       = list.querySelectorAll('.pub-row').length;

    function refreshEmpty() {
        if (empty) empty.style.display = list.querySelectorAll('.pub-row').length ? 'none' : '';
    }

    refreshEmpty();

    addBtn.addEventListener('click', function () {
        const html = tmpl.innerHTML.replaceAll('__IDX__', idx++);
        const div  = document.createElement('div');
        div.innerHTML = html;
        const row = div.firstElementChild;
        list.appendChild(row);
        row.querySelector('input').focus();
        refreshEmpty();
        bindRemove(row);
    });

    function bindRemove(row) {
        row.querySelector('.pub-remove').addEventListener('click', function () {
            row.remove();
            refreshEmpty();
        });
    }

    list.querySelectorAll('.pub-row').forEach(bindRemove);
})();
</script>
@endpush
