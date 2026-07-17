@php $c = $insuranceCompany ?? null; @endphp

<div class="panel-card">
    <div class="panel-card-header"><h2 class="panel-card-title">بيانات شركة التأمين</h2></div>
    <div class="panel-card-body">
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label class="form-label">الاسم (عربي) <span class="text-danger">*</span></label>
                <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" value="{{ old('name_ar', $c->name_ar ?? '') }}" required>
                @error('name_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" dir="ltr" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $c->name_en ?? '') }}" required>
                @error('name_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label">الاسم الفرعي (عربي)</label>
                <input type="text" name="subtitle_ar" class="form-control" value="{{ old('subtitle_ar', $c->subtitle_ar ?? '') }}">
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label">Subtitle (English)</label>
                <input type="text" name="subtitle_en" dir="ltr" class="form-control" value="{{ old('subtitle_en', $c->subtitle_en ?? '') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">ترتيب العرض</label>
                <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $c->order_index ?? 0) }}">
            </div>

            <div class="col-md-4 d-flex align-items-center">
                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $c->is_active ?? true))>
                    <label class="form-check-label" for="is_active">نشط</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> حفظ</button>
            </div>

        </div>
    </div>
</div>
