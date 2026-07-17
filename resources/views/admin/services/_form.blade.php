@php $s = $service ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات الخدمة</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">العنوان (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror"
                       value="{{ old('title_ar', $s->title_ar ?? '') }}" required>
                @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Title (English) <span class="text-danger">*</span></label>
                <input type="text" name="title_en" dir="ltr" class="form-control @error('title_en') is-invalid @enderror"
                       value="{{ old('title_en', $s->title_en ?? '') }}" required>
                @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الوصف (عربي) <span class="text-danger">*</span></label>
                <textarea name="description_ar" rows="3" class="form-control @error('description_ar') is-invalid @enderror" required>{{ old('description_ar', $s->description_ar ?? '') }}</textarea>
                @error('description_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Description (English) <span class="text-danger">*</span></label>
                <textarea name="description_en" dir="ltr" rows="3" class="form-control @error('description_en') is-invalid @enderror" required>{{ old('description_en', $s->description_en ?? '') }}</textarea>
                @error('description_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12">
                <label class="form-label">صورة الخدمة</label>
                @if($s && $s->image)
                    <div class="mb-2"><img src="{{ $s->image_url }}" style="height:80px;width:140px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0"></div>
                @endif
                <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $s->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured"
                           @checked(old('is_featured', $s->is_featured ?? false))>
                    <label class="form-check-label" for="is_featured">تظهر في البطاقات المميزة (أعلى الصفحة)</label>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                           @checked(old('is_active', $s->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
